<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function index()
    {
        $wards = Ward::all();
        $designations = Designation::all();
        return view('layouts.wards.index', compact('wards', 'designations'));
    }
}
