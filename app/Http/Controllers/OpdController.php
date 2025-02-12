<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\ChargeSheet;
use App\Models\ChargesheetItem;
use App\Models\Item;
use App\Models\Icd10Code;
use App\Models\ItemGroup;
use App\Models\Observation;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use App\Models\User;
use PDF;

class OpdController extends Controller
{
    public function index()
    {
        $opdQueue = Episode::where('patient_type', '=', 'OutPatient')->paginate(15);
        $designations = \App\Models\Designation::all();
        $wards = \App\Models\Ward::all();
        return view('layouts.patients.visits.opd-index', compact('opdQueue','wards','designations'));
    }

    public function bill(Episode $episode)
    {
        $totalAmount = $episode->episode_total();
        $chargesheet = ChargeSheet::where('episode_id', '=', $episode->id)->first();
        $chargesheetItems = ChargesheetItem::with('item')->where('charge_sheet_id', '=', $chargesheet->id)->get();dd($chargesheetItems);
        return view('layouts.patients.visits.opd-bill', compact('episode', 'chargesheet', 'chargesheetItems'));
    }

 public function consult(Episode $episode)
 {
    $totalAmount = $episode->episode_total();
    $patient = $episode->patient;
        $notes = $episode->notes;

        $icd10 = new Icd10Code;
        $icd10codes = $icd10->all();

        $items = Item::with('group')->get();

    return view('layouts.patients.visits.opd-consult', compact('items', 'patient', 'notes', 'episode', 'icd10codes'));
}

public function treatment(Episode $episode)
{
    $totalAmount = $episode->episode_total();//dd($totalAmount);

    $prescriptions = Prescription::with(['prescription_items', 'prescription_items.item'])->where('episode_id', '=', $episode->id)->get();
    //dd($prescriptions);
    $patient = $episode->patient;
    $icd10 = new Icd10Code;
    $icd10codes = $icd10->all();
    $items = Item::with('group')->get();
    $sundries = ItemGroup::with('items')->where('name','=','Sundries')->get();//dd($sundries);
    $chargesheetItems = ChargesheetItem::with('item')->where('charge_sheet_id','=',$episode->chargesheet->id)->where('is_consultation_fee','=',0)->get();//dd($chargesheetItems);
    return view('layouts.patients.visits.opd-treatment', compact('chargesheetItems', 'items', 'sundries', 'prescriptions','patient', 'episode', 'icd10codes'));
}

public function print(Episode $episode)
{
    $totalAmount = $episode->episode_total();
    $chargeSheet = ChargeSheet::where('episode_id', $episode->id)->first();
    $chargeSheetItems = ChargesheetItem::where('charge_sheet_id', $chargeSheet->id)->get();
    $observations = Observation::where('episode_id',$episode->id)->first();
    //dd($observations);
    // Render the print view and pass the data
    return view('layouts.patients.episodes.print-episode', compact('episode', 'chargeSheetItems','observations'));

}

public function generateClaimForm(Episode $episode)
{
    $totalAmount = $episode->episode_total();
    $chargeSheet = ChargeSheet::where('episode_id', $episode->id)->first();
    $chargeSheetItems = ChargesheetItem::with('item')->where('charge_sheet_id', $chargeSheet->id)->get();
    $partner = $episode->patient->medicalaid->package->partner??null;
  $member = $episode->patient->medicalaid;
        // Pass the episode's patient name and prescription data to the view
        $data = [
            'chargesheet' => $chargeSheet,
            'patient'=>$episode->patient,
            'partner'=>$partner,
            'member'=>$member,
            'episode'=>$episode,
            'items' => $chargeSheetItems,
            'total_amount' => $totalAmount
        ];

        // Load the view and generate the PDF
        $pdf = PDF::loadView('layouts.patients.episodes.claim-form-pdf', $data);

        $pdf->render();

        // Output the PDF to the browser
        return $pdf->stream($episode->episode_code . '-claim-form.pdf', array('Attachment' => false));

}

}
