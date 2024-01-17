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

    public function recordVitals(Request $request, Episode $episode)
    {
        try {
            $vitals = [
                [
                    'episode_id' => $episode->id,
                    'name' => 'BP',
                    'value' => $request->blood_pressure
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'HR',
                    'value' => $request->heart_rate
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'O2S',
                    'value' => $request->oxygen_saturation
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Temperture',
                    'value' => $request->temperature
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'RR',
                    'value' => $request->respiratory_rate
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Weight',
                    'value' => $request->weight
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'BS',
                    'value' => $request->blood_sugar
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'PL',
                    'value' => $request->pain_level
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Height',
                    'value' => $request->height
                ]
            ];

            Vital::insert($vitals);

            return redirect()->back()->with('success', 'patient vitals recorded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function show(Episode $episode)
    {
        $items = Item::all();
        $vitalGroups = VitalGroup::all();
        return view('layouts.patients.visits.vitals', compact('episode', 'items', 'vitalGroups'));
    }
}
