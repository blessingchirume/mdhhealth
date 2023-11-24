<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\Models\ChargeSheet;
use App\Models\patient;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, patient $patient)
    {
        
        $data = $request->validate([
            // 'episode_code' => 'required',
            // 'episode_entry' => 'required',
            // 'patient_id' => 'required',
            'patient_type' => 'required',
            // 'date' => 'required',
            'attendee' => 'required',
            'ward' => 'required',
        ]);

        // dd($data);
        $data["episode_entry"] = (int)Episode::where('patient_id', $patient->id)->max('episode_entry') + 1;
        $data["episode_code"] = $patient->patient_id."/".$data["episode_entry"];
       
        $data["patient_id"] = $patient->id;
        $data["date"] = date('Y-m-d');

        Episode::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {       
        $episode->load(['chargesheet']);
        // dd($episode);
        return view('layouts.patients.episodes.show', compact('episode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEpisodeRequest  $request
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        //
    }
}
