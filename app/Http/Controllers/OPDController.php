<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\ChargeSheet;
use App\Models\ChargesheetItem;
use App\Models\Prescription;
use App\Models\PrescriptionItem;

class OPDController extends Controller
{
    public function index()
    {
        $opdQueue = Episode::where('patient_type', '=', 'OutPatient')->get();
        return view('layouts.patients.visits.opd-index', compact('opdQueue'));
    }

    public function bill(Episode $episode)
    {
        $chargesheet = ChargeSheet::where('episode_id', '=', $episode->id)->first();
        $chargesheetItems = ChargesheetItem::where('chargesheet_id', '=', $chargesheet->id)->get();
        return view('layouts.patients.visits.opd-bill', compact('episode', 'chargesheet', 'chargesheetItems'));
    }

}
