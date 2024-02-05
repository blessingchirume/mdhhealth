<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nurse;

class NurseController extends Controller
{
   public function index(){
       $nurses = Nurse::getNurses();
       return view('layouts.staff.nurses',compact('nurses'));
   }
}
