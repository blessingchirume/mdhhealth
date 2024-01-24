<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;

class AppointmentsController extends Controller
{

    public function index(){
        $patients = Patient::all();
        return view('layouts.appointments.index', compact('patients'));
    }
    public function getAppointments()
    {
        $appointments = Appointment::all();

        return response()->json($appointments);
    }

    public function patients(){
        $patients = Patient::all();

        return response()->json($patients);
    }
    public function createAppointment(Request $request)
    {
        // Validate and store the form data as a new appointment
        // ...
    }
}
