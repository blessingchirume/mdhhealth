<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyRoomAdmimission;
use App\Models\Patient;
use App\Models\Episode;
use Exception;
use Log;
use Auth;

class EmergencyRoomAdmissionsController extends Controller
{
    public function create()
    {
        return view('layouts.patients.emergency_room.admissions');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $medical_history = $request->input('medical_history');

        try {
            $patient = Patient::create([
                'name' => $name,
                'surname' => $surname,
                'patient_id' => 'MDHP' . rand(00000, 99999),
                'national_id' => '',
                'dob' => '',
                'phone' => '',
                'address' => '',
                'gender' => $gender
            ]);

            $episode_entry = (int) Episode::where('patient_id', $patient->id)->max('episode_entry') + 1;

            $episode = Episode::create([
                'patient_id' => $patient->id,
                'patient_type' => 'Emergency',
                'episode_entry' => $episode_entry,
                'episode_code' => $patient->patient_id . "/" . $episode_entry,
                'date' => date('Y-m-d'),
                'attendee' => 'Emergency Room',
                'ward' => 'ER'
            ]);

            $admission = EmergencyRoomAdmimission::create([
                'name' => $name . ' ' . $surname,
                'age' => $age,
                'gender' => $gender,
                'medical_history' => $medical_history,
                'created_by' => Auth::user()->id,
                'episode' => $episode->id
            ]);
            // Additional logic for handling the admission process
            return redirect()->back()->with('success', 'Patient admitted successfully');
        } catch (Exception $e) {
            Log::error("message: {$e->getMessage()}, file: {$e->getFile()}, line: {$e->getLine()}");
            return redirect()->back()->with('error', 'Failed to admit patient');
        }
    }

    public function listPatients()
{
    $patients = EmergencyRoomAdmimission::with('episode.patient')->get();
    return view('layouts.patients.emergency_room.patients_list', compact('patients' ));
}
}