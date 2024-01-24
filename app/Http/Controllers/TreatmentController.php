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
use App\Models\Item;
use App\Models\TreatmentPlan;
use App\Models\ChargeSheet;
use App\Models\ChargesheetItem;

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
    public function recordTreatment(Request $request, Episode $episode)
    {

        $patientId = $request->input('patient_id');
        $treatmentDetails = $request->input('treatment_details');

        $chargeSheet = ChargeSheet::where('episode_id', $episode->id)->first();
        // Create a new treatment record
        $treatment = new ChargesheetItem();
        $treatment->charge_sheet_id = $chargeSheet->id;
        $treatment->item_id = null;
        $treatment->save();

        if ($request->has('note')) {
            $note = new Note();
            $note->content = $request->input('note');
            // ...set other note attributes
            $treatment->notes()->save($note);  // Assuming belongsTo relationship
        }

        return response()->json(ChargesheetItem::where('charge_sheet_id',$chargeSheet->id)->get(), 200);
    }

    public function show(Episode $episode)
    {

        $patient = $episode->patient;
        $notes = $episode->notes;

        $treatments = TreatmentPlan::where('episode_id', $episode->id)->get();

        return view('layouts.patients.visits.treatment', compact('treatments', 'patient', 'notes', 'episode'));
    }

    public function observation(Episode $episode)
    {

        $patient = $episode->patient;
        $notes = $episode->notes;

        $icd10 = new Icd10Code;
        $icd10codes = $icd10->all();

        $items = Item::all();

        return view('layouts.patients.visits.consultation', compact('items', 'patient', 'notes', 'episode', 'icd10codes'));
    }

public function createTreatmentPlan(Request $request, Episode $episode)
{
    try {
        $treatment = new TreatmentPlan();
        $treatment->episode_id = $episode->id;

        if ($request->treatment_type == 'medication') {
            $selectedMeds = request()->input('medication');
            $dosages = $request->dosage;
            $frequencies = $request->frequency;
            $durations = $request->duration;

            foreach ($selectedMeds as $i => $medication) {
                $treatmentPlan = new TreatmentPlan();
                $treatmentPlan->episode_id = $treatment->episode_id;
                $treatmentPlan->medication = $medication;
                $treatmentPlan->dosage = $dosages[$i];
                $treatmentPlan->frequency = $frequencies[$i];
                $treatmentPlan->duration = $durations[$i];
                $treatmentPlan->instructions = $request->instructions;
                $treatmentPlan->save();
            }
        } else {
            $treatment->medication = $request->other_treatment;
            $treatment->instructions = $request->instructions;
            $treatment->save();
        }

        return back()->with('success', 'Treatment Plans added successfully!');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', $th->getMessage());
    }
}
}
