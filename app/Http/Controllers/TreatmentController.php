<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTreatmentRequest;
use App\Http\Requests\UpdateTreatmentRequest;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Episode;
use App\Models\Treatment;
use App\Models\Note;
use App\Models\Icd10Code;
class TreatmentController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Record a new treatment for a patient.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recordTreatment(Request $request)
    {

        $patientId = $request->input('patient_id');
        $treatmentDetails = $request->input('treatment_details');
        $episode = $request->input('episode');


        $episode = Episode::findOrFail($episode);

        // Create a new treatment record
        $treatment = new Treatment();
        $treatment->patient_id = $episode->patient;
        $treatment->episode_id = $episode->id;
        $treatment->save();

        if ($request->has('note')) {
            $note = new Note();
            $note->content = $request->input('note');
            // ...set other note attributes
            $treatment->notes()->save($note);  // Assuming belongsTo relationship
        }

        return redirect()->back()->with('success', 'Treatment recorded successfully!');
    }

    public function show(Episode $episode)
    {

        $patient = $episode->patient;
        $notes = $episode->notes;

        $treatments = [
            [
            'drug'=>'Paracetamol',
            'dose'=>'500mg',
            'date'=>date('Y-m-d')
        ],[
            'drug'=>'Diclo',
            'dose'=>'250mg',
            'date'=>date('Y-m-d')
        ],
    ];

        return view('layouts.patients.visits.treatment', compact('treatments', 'patient', 'notes', 'episode'));
    }

    public function observation(Episode $episode)
    {

        $patient = $episode->patient;
        $notes = $episode->notes;

        $icd10 = new Icd10Code;
        $icd10codes = $episode->icd10code;

        $treatments = [
            [
            'drug'=>'Paracetamol',
            'dose'=>'500mg',
            'date'=>date('Y-m-d')
        ],[
            'drug'=>'Diclo',
            'dose'=>'250mg',
            'date'=>date('Y-m-d')
        ],
    ];

        return view('layouts.patients.visits.consultation', compact('treatments', 'patient', 'notes', 'episode','icd10codes'));
    }

}
