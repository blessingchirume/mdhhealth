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
use App\Models\ItemGroup;
use App\Models\TreatmentPlan;
use App\Models\ChargeSheet;
use App\Models\ChargesheetItem;
use App\Models\EpisodeItem;

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
     */
    public function recordTreatment(Request $request, Episode $episode)
    {

        $patientId = $request->input('patient_id');
        $treatmentDetails = $request->input('treatment_details');

        $chargeSheet = ChargeSheet::where('episode_id', $episode->id)->first();
        // Create a new treatment record
        $treatment = new ChargesheetItem();
        $treatment->charge_sheet_id = $chargeSheet->id;
        $treatment->item_id = $request->input('treatment');
        $treatment->quantity = $request->input('quantity');
        $treatment->administration_mode = $request->input('administration');
        $treatment->save();

        if ($request->has('note')) {
            $note = new Note();
            $note->content = $request->input('note');
            // ...set other note attributes
            $treatment->notes()->save($note);  // Assuming belongsTo relationship
        }

        return back()->with('success','Drug Administration Recorded Successfully');
       // return response()->json(ChargesheetItem::where('charge_sheet_id', $chargeSheet->id)->get(), 200);
    }

    public function addSundries(Request $request, Episode $episode)
    {

        $patientId = $request->input('patient_id');
        $treatmentDetails = $request->input('treatment_details');

        $chargeSheet = ChargeSheet::where('episode_id', $episode->id)->first();
        // Create a new treatment record
        $treatment = new ChargesheetItem();
        $treatment->charge_sheet_id = $chargeSheet->id;
        $treatment->item_id = $request->input('item');
        $treatment->quantity = $request->input('quantity');
       // $treatment->administration_mode = $request->input('administration');
        $treatment->save();

        if ($request->has('note')) {
            $note = new Note();
            $note->content = $request->input('note');
            // ...set other note attributes
            $treatment->notes()->save($note);  // Assuming belongsTo relationship
        }

        return back()->with('success','Sundries Recorded Successfully');
       // return response()->json(ChargesheetItem::where('charge_sheet_id', $chargeSheet->id)->get(), 200);
    }


    public function show(Episode $episode)
    {

        $patient = $episode->patient;
        $notes = $episode->notes;

        $treatments = TreatmentPlan::where('episode_id', $episode->id)->get();

        return view('layouts.patients.visits.treatment', compact('treatments', 'patient', 'notes', 'episode'));
    }

    public function observation($episode)
    {

        $episode = Episode::findOrFail($episode);
        $patient = $episode->patient;
        $notes = $episode->notes;

        $icd10 = new Icd10Code;
        $icd10codes = $icd10->all();

        $items = Item::with('group')->get();

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
                    $item = Item::where('item_description', $medication)->first();
                    $treatmentPlan = new TreatmentPlan();
                    $treatmentPlan->episode_id = $episode->id;
                    $treatmentPlan->medication = $medication;
                    $treatmentPlan->item_id = 3;
                    $treatmentPlan->dosage = $dosages[$i];
                    $treatmentPlan->frequency = $frequencies[$i];
                    $treatmentPlan->duration = $durations[$i];
                    $treatmentPlan->instructions = $request->instructions[$i];
                    $treatmentPlan->save();
                }
            } else {
                $item = Item::where('item_description', $request->other_treatment)->first();
                $treatment->medication = $request->other_treatment;
                $treatment->item_id = $item->id;
                $treatment->dosage = 1;
                $treatment->frequency = 1;
                $treatment->duration = 1;
                $treatment->instructions = $request->instructions[0];
                $treatment->save();
            }

            return back()->with('success', 'Treatment Plans added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    function convertFrequencyToNumber($frequency)
    {
        $frequency = strtolower($frequency);

        // Define mappings
        $mapping = [
            'once a day' => 1,
            'twice a day' => 2,
            'once every two days' => 0.5,
            'three times a day' => 3,
            'four times a day' => 4,
            'five times a day' => 5,
            'six times a day' => 6,
            'seven times a day' => 7,
            'eight times a day' => 8,
            'nine times a day' => 9,
            'ten times a day' => 10,
            'as needed' => 0,
            'twice every 2 days' => 0.25,
            'once every 3 days' => 0.33,
            'thrice every 2 days' => 0.75,
        ];

        // Check if the description exists in the mapping
        if (array_key_exists($frequency, $mapping)) {
            return $mapping[$frequency];
        } else {
            return null; // Or handle the case where the description is not recognized
        }
    }


}
