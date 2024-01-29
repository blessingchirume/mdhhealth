<?php

namespace App\Http\Controllers;

use App\Models\EmergencyRoomAdmimission;
use Illuminate\Http\Request;
use App\Models\ICUAdmission;
use App\Models\Episode;
use App\Models\Item;
use App\Models\VitalGroup;

class ICUAdmissionController extends Controller
{

    public function index()
    {
        $admissions = ICUAdmission::all();
        return view('layouts.icu.index', compact('admissions'));
    }

    public function create(){
        return view('layouts.patients.icu.create');
    }

    public function show($id){
        $icuadmission = ICUAdmission::find($id);
        $items= Item::all();
        $vitalGroups = VitalGroup::all();
    
        if ($icuadmission) {
            $admission = EmergencyRoomAdmimission::find($icuadmission->admission_id);
            
            if ($admission) {
                $episode = Episode::find($admission->episode);
    
                if ($episode) {
                    // Retrieve patient details related to the episode
                    $patientDetails = $episode->patientDetails; // Assuming there is a relationship to patient details
    
                    return view('layouts.patients.icu.show', compact('icuadmission', 'episode', 'admission', 'patientDetails', 'items', 'vitalGroups'));
                } else {
                    return response()->json(['error' => 'Episode not found.'], 404);
                }
            } else {
               return response()->json(['error'=>'Admission not found for '.$icuadmission->admission_id]);
            }
        } else {
           return response()->json(['error'=> 'ICU Admission not found.']);
        }
    }
    public function store(Request $request){
        // add logic for storing icu patient admissions
        $admission = ICUAdmission::create([
            'admission_id' => $request->input('admission_id'),
            'severity_score' => $request->input('severity_score'),
            'comment' => $request->input('reason_for_admission')
        ]);
    }
}
