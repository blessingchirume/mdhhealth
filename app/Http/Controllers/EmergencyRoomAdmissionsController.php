<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyRoomAdmimission;
use App\Models\TheatreAdmissions;
use App\Models\Patient;
use App\Models\Episode;
use App\Models\ICUAdmission;
use App\Models\MaternityAdmission;
use App\Models\ChargeSheet;
use App\Models\ChargesheetItem;
use App\Models\Item;
use App\Models\Ward;
use Exception;
use Log;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
                'dob' => $age,
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
                'attendee' => 1,
                'ward' => $request->admit_to
            ]);

            $wards = Ward::find($request->admit_to)->first();
            $admission = EmergencyRoomAdmimission::create([
                'name' => $name . ' ' . $surname,
                'age' => $age,
                'gender' => $gender,
                'medical_history' => $medical_history,
                'created_by' => FacadesAuth::user()->id,
                'episode_id' => $episode->id
            ]);

            if ($wards->name == 'Maternity' || $wards->name == 'Maternity Ward') {
                $tomaternity = MaternityAdmission::create([
                    'admission_id' => $admission->id,
                    'gestational_age' => $request->input('gestational_age'),
                    'estimated_delivery_date' => $request->input('estimated_delivery_date'),
                    'prenatal_care_provider' => $request->input('prenatal_care_provider'),
                    'date' => now()
                ]);
            } elseif ($wards->name == 'Theatre' || $wards->name == 'OR' || $wards->name == 'Operating Room' || $wards->name == 'Theatre Ward' || $wards->name == 'Surgery') {
                $toTheatre = TheatreAdmissions::create([
                    'episode_id' => $episode->id,
                    'room' => $request->room,
                    'doctor' => 'null',
                    'date' => $request->date,
                    'time_in' => $request->time,
                    'time_out' => '',
                    'status' => 'Pending',
                    'comment' => null,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } elseif ($wards->name == 'ICU' || $wards->name == 'Intensive Care') {
                $toICU = ICUAdmission::create([
                    'admission_id' => $admission->id,
                    'severity_score' => $request->severity_score,
                    'comment' => $request->reason_for_admission
                ]);


                $charge = ChargeSheet::create([
                    'episode_id' => $episode->id,
                    'checkin' => now()
                ]);

                $items = Item::where('item_code', 'BED')->get();
                if ($items->count()) {
                    $itemId = $items->first()->id;
                    $chargesheetItems = ChargeSheetItem::create([
                        'item_id' => $itemId,
                        'charge_sheet_id'=>$charge->id
                    ]);
                }

               // $this->dispatch(new GenerateRecurringCharges($admission->id));
            }
            // Additional logic for handling the admission process
            return redirect()->back()->with('success', 'Patient admitted successfully');
        } catch (Exception $e) {
            Log::error("message: {$e->getMessage()}, file: {$e->getFile()}, line: {$e->getLine()}");
            return redirect()->back()->with('error', 'Failed to admit patient' . $e->getMessage());
        }
    }

    public function listPatients()
    {
        $patients = EmergencyRoomAdmimission::with('episode.patient')->get();
        return view('layouts.patients.emergency_room.patients_list', compact('patients'));
    }
}
