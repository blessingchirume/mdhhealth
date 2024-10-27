<?php

namespace App\Http\Controllers;

use App\Models\AncRecord;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\ChargeSheet;
use App\Models\ChargesheetItem;
use App\Models\Item;
use App\Models\Icd10Code;
use App\Models\ItemGroup;
use App\Models\MaternityEducation;
use App\Models\Observation;
use App\Models\ObsExamination;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use App\Models\User;
use App\Models\LabTests;
use App\Models\MaternityRemarks;
use PDF;

class MaternityController extends Controller
{
    public function index()
    {
        $maternityQueue = Episode::where('patient_type', '=', 'MaternityPatient')->paginate(15);
        $designations = \App\Models\Designation::all();
        $wards = \App\Models\Ward::all();
        return view('layouts.maternity.index', compact('maternityQueue', 'wards', 'designations'));
    }

    public function bill(Episode $episode)
    {
        $totalAmount = $episode->episode_total();
        $chargesheet = ChargeSheet::where('episode_id', '=', $episode->id)->first();
        $chargesheetItems = ChargesheetItem::with('item')->where('charge_sheet_id', '=', $chargesheet->id)->get();
        dd($chargesheetItems);
        return view('layouts.maternity.bill', compact('episode', 'chargesheet', 'chargesheetItems'));
    }

    public function consult(Episode $episode)
    {
        $totalAmount = $episode->episode_total();
        $patient = $episode->patient;
        $notes = $episode->notes;

        $testResults = LabTests::where('episode_id', $episode->id)
            ->join('tests', 'lab_tests.test', '=', 'tests.id')
            ->join('lab_bookings', 'lab_bookings.id', '=', 'lab_tests.booking')
            ->select('lab_tests.*', 'tests.name')
            ->get();

        $icd10 = new Icd10Code;
        $icd10codes = $icd10->all();

        $items = Item::with('group')->get();
        $view = 'consult';
        if ($episode->visit_purpose == 'Antenatal Care') {
            $view = 'anc-consult';
        } elseif ($episode->visit_purpose == 'Post Partum Care') {
            $view = 'ppc-consult';
        } elseif ($episode->visit_purpose == 'Post Natal Care') {
            $view = 'pnc-consult';
        } else {
        }
        return view('layouts.maternity.' . $view, compact('items', 'patient', 'notes', 'episode', 'testResults', 'icd10codes'));
    }

    public function treatment(Episode $episode)
    {
        $totalAmount = $episode->episode_total(); //dd($totalAmount);

        $prescriptions = Prescription::with(['prescription_items', 'prescription_items.item'])->where('episode_id', '=', $episode->id)->get();
        //dd($prescriptions);
        $patient = $episode->patient;
        $icd10 = new Icd10Code;
        $icd10codes = $icd10->all();
        $items = Item::with('group')->get();
        $sundries = ItemGroup::with('items')->where('name', '=', 'Sundries')->get(); //dd($sundries);
        $chargesheetItems = ChargesheetItem::with('item')->where('charge_sheet_id', '=', $episode->chargesheet->id)->where('is_consultation_fee', '=', 0)->get(); //dd($chargesheetItems);
        return view('layouts.maternity.treatment', compact('chargesheetItems', 'items', 'sundries', 'prescriptions', 'patient', 'episode', 'icd10codes'));
    }

    public function print(Episode $episode)
    {
        $totalAmount = $episode->episode_total();
        $chargeSheet = ChargeSheet::where('episode_id', $episode->id)->first();
        $chargeSheetItems = ChargesheetItem::where('charge_sheet_id', $chargeSheet->id)->get();
        $observations = Observation::where('episode_id', $episode->id)->first();
        //dd($observations);
        // Render the print view and pass the data
        return view('layouts.maternity.print-episode', compact('episode', 'chargeSheetItems', 'observations'));
    }

    public function generateClaimForm(Episode $episode)
    {
        $totalAmount = $episode->episode_total();
        $chargeSheet = ChargeSheet::where('episode_id', $episode->id)->first();
        $chargeSheetItems = ChargesheetItem::with('item')->where('charge_sheet_id', $chargeSheet->id)->get();
        $partner = $episode->patient->medicalaid->package->partner ?? null;
        $member = $episode->patient->medicalaid;
        // Pass the episode's patient name and prescription data to the view
        $data = [
            'chargesheet' => $chargeSheet,
            'patient' => $episode->patient,
            'partner' => $partner,
            'member' => $member,
            'episode' => $episode,
            'items' => $chargeSheetItems,
            'total_amount' => $totalAmount
        ];

        // Load the view and generate the PDF
        $pdf = PDF::loadView('layouts.patients.episodes.claim-form-pdf', $data);

        // Debugging: Dump the generated PDF content to check if it's empty
        // dd($pdf->output());

        // Render the PDF
        $pdf->render();

        // Output the PDF to the browser
        return $pdf->stream($episode->episode_code . '-claim-form.pdf', array('Attachment' => false));
    }

    public function recordGenAssessment(Request $request, Episode $episode)
    {
        try {
            $assessment = [
                [
                    'episode_id' => $episode->id,
                    'name' => 'Gestation Age',
                    'value' => $request->gestation_age
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'BP',
                    'value' => $request->blood_pressure
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Symptoms of TB',
                    'value' => $request->symptoms_of_tb
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'CVS',
                    'value' => $request->cvs
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Perineum',
                    'value' => $request->perineum
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Respiratory System',
                    'value' => $request->respiratory_system
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Weight',
                    'value' => $request->weight
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Pallor',
                    'value' => $request->pallor
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Goitre',
                    'value' => $request->goitre
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Height',
                    'value' => $request->height
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Abdomen',
                    'value' => $request->abdomen
                ]
            ];

            AncRecord::insert($assessment);


            return redirect()->back()->with('success', 'general assessment recorded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function saveTopics(Episode $episode, Request $request)
    {
        //dd($request);
        try {
            foreach ($request->topics as $topic) {
                MaternityEducation::insert([
                    'topic' => $topic,
                    'episode_id' => $episode->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Maternity Education Topics Not Saved. ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Maternity Education Topics Saved Successfully.');
    }

    public function saveObsExam(Episode $episode, Request $request)
    {
        try {
            $examination = [
                [
                    'episode_id' => $episode->id,
                    'name' => 'Height Of Fundus (cm)',
                    'value' => $request->fundus_height
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Lie',
                    'value' => $request->lie
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Presentation',
                    'value' => $request->presentation
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Engaged?',
                    'value' => $request->engaged
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Fetal Heart Rate',
                    'value' => $request->fetal_heart_rate
                ],
                [
                    'episode_id' => $episode->id,
                    'name' => 'Fetal Movements',
                    'value' => $request->fetal_movements
                ]
            ];

            ObsExamination::insert($examination);


            return redirect()->back()->with('success', 'Obstetric Examination(s) recorded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function saveRemarks(Episode $episode, Request $request)
    {
        try {
            foreach ($request->remarks as $remark) {
                MaternityRemarks::insert([
                    'remarks' => $remark,
                    'episode_id' => $episode->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Maternity Remarks Not Saved. ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Maternity Remarks Saved Successfully.');
    }
}
