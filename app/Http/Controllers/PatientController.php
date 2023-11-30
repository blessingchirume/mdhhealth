<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Http\Requests\StorepatientRequest;
use App\Http\Requests\UpdatepatientRequest;
use App\Models\Designation;
use App\Models\NextOfKeen;
use App\Models\PatientMedicalAidEntry;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PatientController extends Controller
{

    public function index()
    {
        $collection = Patient::all();
        return view('layouts.patients.index', compact('collection'));
    }

    public function create()
    {
        return view('layouts.patients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'national_id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $medicalAid = $request->validate([
            'package_id' => 'required',
            'member_name' => 'required',
            'policy_number' => 'required',
        ]);

        $nextOfKeen = $request->validate([
            'next_of_keen_name' => 'required',
            'next_of_keen_surname' => 'required',
            'next_of_keen_phone' => 'required',
            'next_of_keen_gender' => 'required',
            'next_of_keen_national_id' => 'required',
            'next_of_keen_address' => 'required'
        ]);
        $data["patient_id"] = 'MDHP' . rand(00000, 99999);

        try {
            Patient::create($data);
            $medicalAid["patient_id"] = Patient::latest()->first()->id;
            PatientMedicalAidEntry::create($medicalAid);
            $nextOfKeen["patient_id"] = $medicalAid["patient_id"];

            NextOfKeen::create($nextOfKeen);

            return redirect()->route('patient.index')->with('success', 'patient record created successfully!');
        } catch (\Throwable $th) {

            return redirect()->route('patient.create')->with('error', $th->getMessage());
        }
    }

    public function show(patient $patient)
    {
        $designations = Designation::all();
        return view('layouts.patients.show', compact('patient', 'designations'));
    }

    public function edit(patient $patient)
    {
        // dd($patient->medicalaid->package->partner);
        return view('layouts.patients.update', compact('patient'));
    }

    public function update(UpdatepatientRequest $request, patient $patient)
    {
        $data = $request->validate([
            'national_id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $medicalAid = $request->validate([
            'package_id' => 'required',
            'member_name' => 'required',
            'policy_number' => 'required',
        ]);

        $nextOfKeen = $request->validate([
            'next_of_keen_name' => 'required',
            'next_of_keen_surname' => 'required',
            'next_of_keen_phone' => 'required',
            'next_of_keen_gender' => 'required',
            'next_of_keen_national_id' => 'required',
            'next_of_keen_address' => 'required'
        ]);

        $data["patient_id"] = 'MDHP' . rand(00000, 99999);

        try {
            $patient->update($data);
            $medicalAid["patient_id"] = Patient::latest()->first()->id;
            $patient->medicalaid->update($medicalAid);
            $nextOfKeen["patient_id"] = $medicalAid["patient_id"];          
            $patient->nextofkeen->update($nextOfKeen);
            return redirect()->route('patient.index')->with('success', 'patient record updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('patient.create')->with('error', $th->getMessage());
        }
    }

    public function destroy(patient $patient)
    {
        //
    }
}
