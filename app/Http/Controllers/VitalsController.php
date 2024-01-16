<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVitalsRequest;
use App\Http\Requests\UpdateVitalsRequest;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Episode;
use App\Models\Item;
use App\Models\Note;
use App\Models\Vital;
use App\Models\VitalGroup;

class VitalsController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Record the patient's vitals.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function recordVital(Request $request)
    {
        $patient = Patient::findOrFail($request->input('id'));
        $patient->blood_pressure = $request->input('blood_pressure');
        $patient->heart_rate = $request->input('heart_rate');
        $patient->temperature = $request->input('temperature');
        $patient->weight = $request->input('weight');
        $patient->save();

        return redirect()->back()->with('success', 'patient vitals recorded successfully!');
    }


    public function show(Episode $episode)
    {
        $items = Item::all();
        $vitalGroups = VitalGroup::all();
        return view('layouts.patients.visits.vitals', compact('episode', 'items', 'vitalGroups'));
    }
}
