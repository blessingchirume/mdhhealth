<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Logic\SapService;
use App\Models\ChargeSheet;
use App\Models\Designation;
use App\Models\Episode;
use App\Models\patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    protected $sapService;

    public function __construct()
    {
        $this->sapService = new SapService("/Invoices");
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
        //
    }

    public function store(StorePaymentRequest $request)
    {
        $data = [
            "DocDate" => "2024-01-18",
            "DocDueDate" => "2024-01-18",
            "DocType" => "dDocument_Service",
            "CardCode" => "CRA001",
            "NumAtCard" => "Test",
            "DocTotal" => 370000,
            "DocRate" => 1.0,
            "ContactPersonCode" => 0,
            "DocObjectType" => "oInvoices",
            "DocumentLines" => [
                [
                    "ItemDescription" => "Test item",
                    "Total" => 370000,
                    "Price" => 0,
                    "AccountCode" => 310003,
                    "VatGroup" => "O01",
                    "LineTotal" => 370000,
                    "RowTotalSC" => 0,
                    "TaxCode" => "I1",
                    "DiscountPercent" => 0
                ]
            ]
        ];
        $this->sapService->createSapInvoice($data);
        // dd($request);
        // $data = $request->validate([
        //     'patient_type' => 'required',
        //     // 'narration' => 'required',
        //     'ward' => 'required',
        // ]);
        // $data["attendee"] = Auth::user()->name. " " . Auth::user()->surname;
        // $data["episode_entry"] = (int)Episode::where('patient_id', $request->patient_id)->max('episode_entry') + 1;
        // $data["episode_code"] = $request->patient_id . "/" . $data["episode_entry"];

        // $data["patient_id"] = patient::where('patient_id', $request->patient_id)->first()->id;
        // $data["date"] = date('Y-m-d');

        // try {
        //     $episode = Episode::create($data);

        //     // ChargeSheet::create([
        //     //     "episode_id" => $episode->id,
        //     //     "checkin" => date('Y-m-d'),
        //     // ]);

        //     Payment::create([
        //         'episode_id' => $episode->id,
        //         'narration' => $request->narration,
        //         'amount' => $request->amount,
        //         'balance' => 0,
        //         'date' => date('Y-m-d')
        //     ]);
        //     return redirect()->back()->with('success', 'payment created successfully');
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', $th->getMessage());
        // }


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
}
