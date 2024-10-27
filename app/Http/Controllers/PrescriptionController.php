<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Episode;
use App\Models\DrugsAndSundries;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use PDF;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $prescriptions = Prescription::all();



    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Episode $episode)
    {
        //$prescriptions = Prescription::with('drugs_sundries')->get();dd($prescriptions);
        $prescriptions = Item::all();
        return view('layouts.patients.episodes.prescription', compact('prescriptions', 'episode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Episode $episode, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     */
    public function destroy(Prescription $prescription)
    {
        //
    }

    public function updateStartDose(Request $request)
    {
        $medicationId = $request->input('medication_id');
        $startDose = $request->input('start_dose');

        // Retrieve the medication from the database
        $medication = Item::find($medicationId);

        if ($medication) {
            // Update the start dose for the medication
            $medication->start_dose = $startDose;
            $medication->save();

            // Return a response indicating success
            return response()->json(['success' => true]);
        }

        // Return a response indicating failure
        return response()->json(['success' => false, 'message' => 'Medication not found'], 404);
    }

    public function generatePDF(Episode $episode)
    {
        // Retrieve all prescriptions for the episode
        $prescriptions = Prescription::with('prescription_items')->where('episode_id', $episode->id)->get();

        // Check if any prescriptions exist for the episode
        if ($prescriptions->isNotEmpty()) {
            $patient = $episode->patient;

            // Initialize an empty array to hold prescription data
            $prescriptionData = [];
            //dd($prescriptions);
            // Iterate over each prescription to format the data
            foreach ($prescriptions as $prescription) {
                foreach ($prescription->prescription_items as $prescribed) {
                    $item = Item::find($prescribed->item_id);
                    $prescriptionData[] = [
                        'medication' => $item->item_description,
                        'dosage' => $prescribed->dosage,
                        'frequency' => $prescribed->frequency,
                        'duration' => $prescribed->duration
                    ];
                }
            }

            // Pass the episode's patient name and prescription data to the view
            $data = [
                'patient_detail' => $patient,
                'prescription_number' => str_pad($prescription->id,7,0,STR_PAD_LEFT),
                'prescribed_by' => User::find($prescription->prescribed_by),
                'prescriptions' => $prescriptionData,
                'prescription_date' => $prescription->created_at->toDateString(),
            ];

            // Load the view and generate the PDF
            $pdf = PDF::loadView('layouts.patients.episodes.prescription-pdf', $data);

            return $pdf->download($episode->episode_code . '-prescription.pdf');
        } else {
            // Handle the case where no prescriptions exist for the episode
            return response()->json(['error' => 'No prescriptions found for the episode'], 404);
        }
    }
}
