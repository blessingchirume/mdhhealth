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
use App\Models\Observation;
use Illuminate\Support\Facades\Auth;

class VitalsController extends Controller
{

    public function index(){
        $episodes = Episode::with('vitals')->get();
        return view('layouts.patients.visits.index', compact('episodes'));
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
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'BMI',
                    'value' => $request->bmi
                ]
            ];

            Vital::insert($vitals);

            Observation::create([
                'episode_id' => $episode->id,
                'user_id'=> Auth::user()->name,
                'observation' => $request->observation??null,
                'complaints' => $request->complaints??null,
                'origin'=>'Vitals'
            ]);
            return redirect()->back()->with('success', 'patient vitals recorded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function create(Episode $episode)
    {
        $items = Item::all();
        $vitalGroups = VitalGroup::all();
        return view('layouts.patients.visits.vitals', compact('episode', 'items', 'vitalGroups'));
    }

    public function show(Episode $episode){
        $vitals = Vital::where('episode_id', $episode->id)->get();
        return view('layouts.patients.visits.view-vitals', compact('episode', 'vitals'));
    }
}
