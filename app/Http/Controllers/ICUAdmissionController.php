<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ICUAdmissionController extends Controller
{

    public function index()
    {
        $admissions = ICUAdmission::all();
        return view('layouts.icu.index', compact('admissions'));
    }

    public function create(){
        return view('layouts.icu.create');
    }

    public function store(Request $request){
        
    }
}
