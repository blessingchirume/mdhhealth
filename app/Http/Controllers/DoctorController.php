<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index(){
        $doctors = Doctor::getDoctors();
        return view('layouts.staff.doctors',compact('doctors'));
    }
}
