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

    public function show($id){
        $appointment = Appointment::with('doctor', 'patient')->find($id);
        return view('layouts.appointments.show', compact('appointment'));
    }

    public function patients()
    {
        $patients = Patient::all();

        return response()->json($patients);
    }

    public function fetch()
    {
        $appointments = Appointment::all();
        $booked = [];
        foreach ($appointments as $appointment) {
            $booked[] = [
                'title' => $appointment->patient->name . ' ' . $appointment->patient->surname,
                'start' => $appointment->start_time,
                'end' => $appointment->end_time,
                'url' => route('show-appointment-details', $appointment->id),
            ];
        }
        return response()->json($booked);
    }
    public function create(Request $request)
    {
        //dd($request);
        try {
            $existingAppointment = Appointment::where('start_time', $request->start_time)
                ->where('end_time', $request->end_time)
                ->where('doctor_id', $request->doctor)
                ->first();

            if ($existingAppointment) {
                return redirect()->back()->with('error', 'The selected time slot is already booked. Please select another time slot.');
                exit;
            }
            $appointment = Appointment::create([
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'patient_id' => $request->input('patient'),
                'doctor_id' => $request->input('doctor'),
                'created_by' => Auth::user()->id,
                'status' => 'Booked'
            ]);
            logger()->info('Appointment Booking Created Succefully.');
            return redirect()->back()->with('success', 'Appointment Booking created successfully.');
        } catch (Exception $e) {
            logger()->error('An Error occurred while creating a new Appointment Booking: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'An Error occurred while creating a new Appointment Booking. Please Notify Systems Administrator For Assistance.' . $e);
        }
    }
}
