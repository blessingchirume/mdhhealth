<?php

namespace App\Http\Controllers;

use App\Models\MedicalAid;
use App\Http\Requests\StoreMedicalAidRequest;
use App\Http\Requests\UpdateMedicalAidRequest;

class MedicalAidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = MedicalAid::all();
        return view('layouts.medicalaid.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicalAidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicalAidRequest $request)
    {
        MedicalAid::create(["provider_code" => $request->code, "provider_name" => $request->name]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalAid  $medicalAid
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalAid $medicalAid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalAid  $medicalAid
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalAid $medicalAid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicalAidRequest  $request
     * @param  \App\Models\MedicalAid  $medicalAid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicalAidRequest $request, MedicalAid $medicalAid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalAid  $medicalAid
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalAid $medicalAid)
    {
        //
    }
}
