<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use Auth;
use Exception;

class AppointmentsController extends Controller
{

    public function index()
    {
        $patients = Patient::all();
        return view('layouts.appointments.index', compact('patients'));
    }
    public function getAppointments()
    {
        $appointments = Appointment::all();

        return response()->json($appointments);
    }

    public function patients()
    {
        $patients = Patient::all();

        return response()->json($patients);
    }

    public function fetch()
    {
        $appointments = Appointment::all();

        return response()->json($appointments);
    }
    public function create(Request $request)
    {
        try {
            $appointment = Appointment::create([
                'date' => $request->input('date'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'patient_id' => $request->input('patient'),
                'doctor' => null,
                'created_by' => Auth::user()->id,
                'status' => 'Booked'
            ]);
            logger()->info('Appointment Booking Created Succefully.');
            return redirect()->back()->with('success', 'Appointment Booking created successfully.');
        } catch (Exception $e) {
            logger()->error('An Error occurred while creating a new Appointment Booking: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'An Error occurred while creating a new Appointment Booking. Please Notify Systems Administrator For Assistance.'. $e);
        }
    }
}
