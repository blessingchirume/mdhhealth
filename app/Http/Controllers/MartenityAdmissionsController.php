<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\MaternityAdmission;
use App\Models\EmergencyRoomAdmimission;

class MartenityAdmissionsController extends Controller
{
    public function index()
    {
        $admissions = MaternityAdmission::all();
        return view('layouts.maternity.index', compact('admissions'));
    }

    public function create(){
        return view('layouts.maternity.create');
    }

    public function store(Request $request)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
