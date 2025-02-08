<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorepatientRequest;
use App\Http\Requests\UpdatepatientRequest;
use App\Models\Designation;
use App\Models\Gurantor;
use App\Models\NextOfKeen;
use App\Models\Package;
use App\Models\PatientMedicalAidEntry;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('menu');
    }

    public function index()
    {
        $collection = Patient::paginate();
        return view('layouts.patients.index', compact('collection'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('layouts.patients.create', compact('packages'));
    }

    public static function calculateAge($dob)
    {
        // Assuming $dob is the patient's date of birth
        $dateOfBirth = Carbon::parse($dob);
        $currentDate = Carbon::now();

        $age = $dateOfBirth->diffInYears($currentDate);

        return $age;
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
            'address' => 'required',
            'email' => 'email'
        ]);

        // dd($data);

        $medicalAid = $request->validate([
            'package_id' => 'required',
            'member_name' => 'required',
            'policy_number' => 'required',
            'suffix_number' => 'required'
        ]);

        // dd($medicalAid);

        $nextOfKeen = $request->validate([
            'next_of_keen_name' => 'required',
            'next_of_keen_surname' => 'required',
            'next_of_keen_phone' => 'required',
            'next_of_keen_gender' => 'required',
            'next_of_keen_national_id' => 'required',
            'next_of_keen_address' => 'required',
        ]);

        $guarantor = [
            'name' => $request->guarantor_name,
            'surname' => $request->guarantor_surname,
            'phone' => $request->guarantor_phone,
            'gender' => $request->guarantor_gender,
            'national_id' => $request->guarantor_national_id,
            'address' => $request->guarantor_address,
            'relationship' => $request->guarantor_relationship,
        ];

        $data["patient_id"] = 'MDHP' . rand(00000, 99999);
        try {
            Patient::create($data);

            $medicalAid["patient_id"] = Patient::latest()->first()->id;
            PatientMedicalAidEntry::create($medicalAid);

            $nextOfKeen["patient_id"] = $medicalAid["patient_id"];
            $nextOfKeen["next_of_keen_relationship"] = "Husband";
            NextOfKeen::create($nextOfKeen);

            $guarantor['patient_id'] = $medicalAid['patient_id'];
            Gurantor::create($guarantor);

            return redirect()->route('patient.index')->with('success', 'patient record created successfully!');
        } catch (\Throwable $th) {

            return redirect()->route('patient.create')->with('error', $th->getMessage());
        }
    }

    public function show(Patient $patient)
    {
        // dd(Config::get('menu'));
        $designations = Designation::all();
        return view('layouts.patients.show', compact('patient', 'designations'));
    }

    public function edit(Patient $patient)
    {
        // dd($patient->medicalaid->package->partner);
        return view('layouts.patients.update', compact('patient'));
    }

    public function update(UpdatepatientRequest $request, Patient $patient)
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

    public function destroy(Patient $patient)
    {
        //
    }
}
