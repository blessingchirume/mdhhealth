<?php

namespace App\Http\Controllers;

use App\Models\PatientMedicalAidEntry;
use App\Http\Requests\StorePatientMedicalAidEntryRequest;
use App\Http\Requests\UpdatePatientMedicalAidEntryRequest;

class PatientMedicalAidEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientMedicalAidEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientMedicalAidEntryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientMedicalAidEntry  $patientMedicalAidEntry
     * @return \Illuminate\Http\Response
     */
    public function show(PatientMedicalAidEntry $patientMedicalAidEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientMedicalAidEntry  $patientMedicalAidEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientMedicalAidEntry $patientMedicalAidEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientMedicalAidEntryRequest  $request
     * @param  \App\Models\PatientMedicalAidEntry  $patientMedicalAidEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientMedicalAidEntryRequest $request, PatientMedicalAidEntry $patientMedicalAidEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientMedicalAidEntry  $patientMedicalAidEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientMedicalAidEntry $patientMedicalAidEntry)
    {
        //
    }
}
