<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Logic\SapService;
use App\Models\ChargeSheet;
use App\Models\Designation;
use App\Models\Episode;
use App\Models\Item;
use App\Models\patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    protected $sapService;

    public function __construct()
    {
        $this->sapService = new SapService();
        $this->middleware('menu');
    }

    public function index()
    {
        $designations = Designation::all();
        $collection = Payment::all();
        $patients = patient::all();
        $attendees = User::all()->except(1);
        return view('layouts.payments.index', compact('collection', 'designations', 'patients', 'attendees'));
    }

    public function create()
    {
        return view('layouts.payments.create');
    }

    public function store(StorePaymentRequest $request)
    {
        // $data = [
        //     "DocDate" => "2024-01-18",
        //     "DocDueDate" => "2024-01-18",
        //     "DocType" => "dDocument_Service",
        //     "CardCode" => "CRA001",
        //     "NumAtCard" => "Test",
        //     "DocTotal" => 370000,
        //     "DocRate" => 1.0,
        //     "ContactPersonCode" => 0,
        //     "DocObjectType" => "oInvoices",
        //     "DocumentLines" => [
        //         [
        //             "ItemDescription" => "Test item",
        //             "Total" => 370000,
        //             "Price" => 0,
        //             "AccountCode" => 310003,
        //             "VatGroup" => "O01",
        //             "LineTotal" => 370000,
        //             "RowTotalSC" => 0,
        //             "TaxCode" => "I1",
        //             "DiscountPercent" => 0
        //         ]
        //     ]
        // ];
        // $this->sapService->createSapInvoice($data);
        dd($request);
        $data = $request->validate([
            'patient_type' => 'required',
            // 'narration' => 'required',
            'ward' => 'required',
        ]);
        $data["attendee"] = Auth::user()->name. " " . Auth::user()->surname;
        $data["episode_entry"] = (int)Episode::where('patient_id', $request->patient_id)->max('episode_entry') + 1;
        $data["episode_code"] = $request->patient_id . "/" . $data["episode_entry"];

        $data["patient_id"] = patient::where('patient_id', $request->patient_id)->first()->id;
        $data["date"] = date('Y-m-d');

        try {
            $episode = Episode::create($data);

            // ChargeSheet::create([
            //     "episode_id" => $episode->id,
            //     "checkin" => date('Y-m-d'),
            // ]);

            Payment::create([
                'episode_id' => $episode->id,
                'narration' => $request->narration,
                'amount' => $request->amount,
                'balance' => 0,
                'date' => date('Y-m-d')
            ]);
            return redirect()->back()->with('success', 'payment created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }


    }

    public function show(Payment $payment)
    {
        //
    }

    public function edit(Payment $payment)
    {
        //
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    public function destroy(Payment $payment)
    {
        //
    }

    function makeAccountReceivableInvoice(Request $request)
    {
        // dd($request);
        $documentLines = [];
        $docTotal = 0.0;
        // if ($request->treatmentPlan) {
        //     # code...
        // }
        foreach ($request->treatmentPlan as $value) {
            $item = Item::find($value["medication"]);
            // $docTotal += number_format(((double)$value["price"] * (double)$value["quantity"]), 2);
            $price = (float)$value["price"];
            $quatinty = (float)$value["quantity"];
            $docTotal += ($price * $quatinty);
            // dd($docTotal);
            array_push($documentLines, [
                "ItemCode" => "LPGAS01",
                "ItemDescription" => $value["medication"],
                // "Quantity" => $request->quantity,
                "Quantity" => (float)$value["quantity"],
                // "Price" => 1,
                "Price" => (float)$value["price"],
                // "Currency" => 'USD',
                "Currency" => $request->currency,
                "DiscountPercent" => 0.0,
                "WarehouseCode" => "WATERFLS",
                // "Whse" => "MSASA",
                "VatGroup" => "O1",
                "LineTotal" => number_format((float)$value["price"] * (float)$value["quantity"], 2),
                "AcountCode" => "_SYS00000000114",
                // "LineTotal" => (int)$value["Price"] * (float)$value["Quantity"],
                // "RowTotalFC" => 0.0,
                // "RowTotalSC" => 64.0,
                "UnitPrice" => (float)$value["price"],
                // "UnitPrice" => (float)$value["Price"],
                "TaxCode" => "O1"
            ]);
        }
        $data = [
            "PostingDate" => date('Y-m-d'),
            "DocDate" => date('Y-m-d'),
            "DocDueDate" => date('Y-m-d'),
            // "Whse" => "MSASA",
            // "WarehouseCode" => "MSASA",
            "CardCode" => "WF000002",
            "DocTotal" => $docTotal,
            "DocCurrency" => $request->currency,
            "DocRate" => 1.0,
            "JournalMemo" => "A/R Invoices - " . $request->narration,
            // "ControlAccount" => "_SYS00000000042",
            "DocumentLines" => $documentLines

        ];
        // dd(json_encode($data));
        $response = $this->sapService->createSapInvoice($data);
        // dd($response);
        $docEntry = $response['DocEntry'] ?? null;

        // return $response;

        if ($docEntry == null) {
            return response(['error' => 'something went wrong', 'success' => null], 500);
        }

        $payment = $this->makeAccountReceivablePayment($request->episode_id, "WF000002", $request->currency, $docTotal, $docEntry);
        // return $payment;
        if ($payment->status() == 201) {
            return back()->with('success', 'Payment successfully synced with SAP');
        } else {
            return back()->with('error', 'Your request could not be completed');
        }
    }

    function makeAccountReceivablePayment($episodeId, $cardCode, $currency, $total, $docEntry)
    {
        $data = [
            "DocType" => "rCustomer",
            // "DocDate" => date('Y-m-d'),
            "CardCode" => $cardCode,
            "CashAccount" => "_SYS00000000702",
            "DocCurrency" => "USD",
            "CashSum" => $total,
            // "LocalCurrency" => "tYES",
            "Remarks" => "POS[S=>1][T=>3][TX=>1048][INV=>IN01001002][P=>FOR]",
            "JournalRemarks" => "POS Transaction - Payment [INV=>IN01001002]-FOR",
            // "ApplyVAT" => "tYES",
            // "DueDate" => date('Y-m-d'),
            // "ControlAccount" => "_SYS00000000042",
            // "AuthorizationStatus" => "pasWithout",
            "PaymentInvoices" => [
                [
                    "DocEntry" => $docEntry,
                    "SumApplied" => $total,
                    "PaidSum" => $total
                ]
            ]
        ];

        // return $data;
        $this->savePaymentToLocalDB($episodeId, $data);
        return $this->sapService->createSapIncomingPayment($data);
    }

    function savePaymentToLocalDB($episodeId, $data)
    {
        $payment = new Payment();
        try {
            $payment->create([
                "episode_id" => $episodeId,
                "narration" => "BILLING[S=>1][T=>3][TX=>1048][INV=>IN01001002][P=>FOR]",
                'amount' => $data['CashSum'],
                'balance' => 0,
                'date' => date('Y-m-d')
            ]);
            return redirect()->back()->with('success', 'payment created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
