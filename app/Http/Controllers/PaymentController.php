<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\ChargeSheet;
use App\Models\Designation;
use App\Models\Episode;
use App\Models\patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
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
        // dd($request);
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
}
