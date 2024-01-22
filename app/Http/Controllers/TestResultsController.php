<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tests;

class TestResultsController extends Controller
{

    public function index(){
        return view('layouts.lab.add-results');
    }
    //
    public function addResults(Request $request)
    {
        $selectedTests = $request->input('selected_tests');
        $result = $request->input('result');
    
        // Add the result to the selected tests
        foreach ($selectedTests as $testId) {
            $test = Tests::find($testId);
            $test->result = $result;
            $test->save();
        }
    
        // Redirect or return a response
    }
}
