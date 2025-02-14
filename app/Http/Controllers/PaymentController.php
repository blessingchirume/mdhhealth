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
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('menu');
    }

    public function index()
    {
        return view('layouts.payments.index', [
            'collection' => Payment::all(),
            'designations' => Designation::all(),
            'patients' => Patient::all(),
            'attendees' => User::where('id', '!=', 1)->get()
        ]);
    }

    public function create()
    {
        return view('layouts.payments.create');
    }

    public function store(StorePaymentRequest $request)
    {        
        $validated = $request->validate([
            'patient' => 'required|exists:patients,id',
            'treatmentPlan' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $episode = Episode::where('patient_id', $validated['patient'])->firstOrFail();
            $docTotal = collect($validated['treatmentPlan'])->sum(function ($item) {
                return (float) $item['price'] * (float) $item['quantity'];
            });
            
            $payment = Payment::create([
                'episode_id' => $episode->id,
                'narration' => $request->narration,
                'amount' => $docTotal,
                'balance' => $episode->amount_due - $docTotal,
                'date' => now()->toDateString(),
            ]);
            
            $episode->decrement('amount_due', $docTotal);
            
            DB::commit();
            return redirect()->back()->with('success', 'Payment created successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function show(Payment $payment)
    {
        return view('layouts.payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('layouts.payments.edit', compact('payment'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->validated());
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
    function makeAccountReceivableInvoice(Request $request)
    {
        // // dd($request);
        // $documentLines = [];
        // $docTotal = 0.0;
        // // if ($request->treatmentPlan) {
        // //     # code...
        // // }
        // foreach ($request->treatmentPlan as $value) {
        //     $item = Item::find($value["medication"]);
        //     // $docTotal += number_format(((double)$value["price"] * (double)$value["quantity"]), 2);
        //     $price = (float)$value["price"];
        //     $quatinty = (float)$value["quantity"];
        //     $docTotal += ($price * $quatinty);
        //     // dd($docTotal);
        //     array_push($documentLines, [
        //         "ItemCode" => "LPGAS01",
        //         "ItemDescription" => $value["medication"],
        //         // "Quantity" => $request->quantity,
        //         "Quantity" => (float)$value["quantity"],
        //         // "Price" => 1,
        //         "Price" => (float)$value["price"],
        //         // "Currency" => 'USD',
        //         "Currency" => $request->currency,
        //         "DiscountPercent" => 0.0,
        //         "WarehouseCode" => "WATERFLS",
        //         // "Whse" => "MSASA",
        //         "VatGroup" => "O1",
        //         "LineTotal" => number_format((float)$value["price"] * (float)$value["quantity"], 2),
        //         "AcountCode" => "_SYS00000000114",
        //         // "LineTotal" => (int)$value["Price"] * (float)$value["Quantity"],
        //         // "RowTotalFC" => 0.0,
        //         // "RowTotalSC" => 64.0,
        //         "UnitPrice" => (float)$value["price"],
        //         // "UnitPrice" => (float)$value["Price"],
        //         "TaxCode" => "O1"
        //     ]);
        // }
        // $data = [
        //     "PostingDate" => date('Y-m-d'),
        //     "DocDate" => date('Y-m-d'),
        //     "DocDueDate" => date('Y-m-d'),
        //     // "Whse" => "MSASA",
        //     // "WarehouseCode" => "MSASA",
        //     "CardCode" => "WF000002",
        //     "DocTotal" => $docTotal,
        //     "DocCurrency" => $request->currency,
        //     "DocRate" => 1.0,
        //     "JournalMemo" => "A/R Invoices - " . $request->narration,
        //     // "ControlAccount" => "_SYS00000000042",
        //     "DocumentLines" => $documentLines

        // ];
        // // dd(json_encode($data));
        // $response = $this->sapService->createSapInvoice($data);
        // // dd($response);
        // $docEntry = $response['DocEntry'] ?? null;

        // // return $response;

        // if ($docEntry == null) {
        //     return response(['error' => 'something went wrong', 'success' => null], 500);
        // }

        // $payment = $this->makeAccountReceivablePayment($request->episode_id, "WF000002", $request->currency, $docTotal, $docEntry);
        // // return $payment;
        // if ($payment->status() == 201) {
        //     return back()->with('success', 'Payment successfully synced with SAP');
        // } else {
        //     return back()->with('error', 'Your request could not be completed');
        // }
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
        // return $this->sapService->createSapIncomingPayment($data);
    }
}
