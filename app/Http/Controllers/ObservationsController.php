<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Episode;
use App\Models\Observation;
use Illuminate\Support\Facades\Auth;
use App\Models\Icd10CodeAssign;

class ObservationsController extends Controller
{
    //
    public function index()
    {

    }

    public function recordObservations(Request $request, Episode $episode)
    {
        try {

            $observation = new Observation();
            $observation->episode_id = $episode->id;
            $observation->user_id = Auth::user()->name;
            $observation->observation = $request->observation;
            $observation->complaints = $request->compalaints??null;
            $observation->complaints_history = $request->complaints_history??null;
            $observation->notes = $request->notes??null;
            $observation->origin = 'Observations';
            $observation->setCreatedAt(date('Y-m-d H:i'));
            $observation->save();
            return back()->with('success', 'Observations recorded successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function assignIcd10Codes(Request $request, Episode $episode)
    {
        $selectedCodes = request()->input('icd10_codes');

        try {
            if (!empty($selectedCodes)) {
                foreach ($selectedCodes as $codeId) {
                    $icd10 = new Icd10CodeAssign();
                    $icd10->code_id = $codeId;
                    $icd10->episode_id = $episode->id;
                    $icd10->save();
                }
            }

            return back()->with('success', 'ICD10 code(s) assigned successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
