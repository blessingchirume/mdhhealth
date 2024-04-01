<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Episode;
use App\Models\DrugsAndSundries;
use Illuminate\Http\Request;

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
        $prescriptions = DrugsAndSundries::all();
        return view('layouts.patients.episodes.prescription', compact('prescriptions','episode'));
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
}
