<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icd10Code;

class Icd10Controller extends Controller
{

    public function index(){
        //
    }

    public function deleteIcd10codes(Request $request){
        $icd10 = Icd10Code::find($request->id);
        $icd10->delete();
        return back()->with('success', 'ICD10 code deleted successfully!');
    }

    public function getIcd10codes(Request $request){
        $icd10 = Icd10Code::where('episode_id', $request->episode_id)->get();
        return response()->json($icd10);
    }

    public function getIcd10code(Request $request){
        $icd10 = Icd10Code::find($request->id);
        return response()->json($icd10);
    }

    public function create(){

    }
}
