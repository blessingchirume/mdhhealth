<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\ChargeSheet;
use App\Models\ChargesheetItem;
use App\Models\Item;
use App\Models\Icd10Code;
use App\Models\Prescription;
use App\Models\PrescriptionItem;

class OPDController extends Controller
{
    public function index()
    {
        $opdQueue = Episode::where('patient_type', '=', 'OutPatient')->get();
        $designations = \App\Models\Designation::all();
        $wards = \App\Models\Ward::all();
        return view('layouts.patients.visits.opd-index', compact('opdQueue','wards','designations'));
    }

    public function bill(Episode $episode)
    {
        $chargesheet = ChargeSheet::where('episode_id', '=', $episode->id)->first();
        $chargesheetItems = ChargesheetItem::where('charge_sheet_id', '=', $chargesheet->id)->get();
        return view('layouts.patients.visits.opd-bill', compact('episode', 'chargesheet', 'chargesheetItems'));
    }

 public function consult(Episode $episode)
 {
    $patient = $episode->patient;
        $notes = $episode->notes;

        $icd10 = new Icd10Code;
        $icd10codes = $icd10->all();

        $items = Item::with('group')->get();

    return view('layouts.patients.visits.opd-consult', compact('items', 'patient', 'notes', 'episode', 'icd10codes'));
}
}
