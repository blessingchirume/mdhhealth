<?php

namespace App\Http\Controllers;

use App\Models\MedicalAidPackage;
use App\Http\Requests\StoreMedicalAidPackageRequest;
use App\Http\Requests\UpdateMedicalAidPackageRequest;

class MedicalAidPackageController extends Controller
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
     * @param  \App\Http\Requests\StoreMedicalAidPackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicalAidPackageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalAidPackage  $medicalAidPackage
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalAidPackage $medicalAidPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalAidPackage  $medicalAidPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalAidPackage $medicalAidPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicalAidPackageRequest  $request
     * @param  \App\Models\MedicalAidPackage  $medicalAidPackage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicalAidPackageRequest $request, MedicalAidPackage $medicalAidPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalAidPackage  $medicalAidPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalAidPackage $medicalAidPackage)
    {
        //
    }
}
