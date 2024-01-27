<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\TheatreAdmissions;
use App\Models\Episode;
use Auth;
use Exception;

class TheatreController extends Controller
{
    public function index()
    {
        $admissions = Episode::has('theatreAdmissions')->with('theatreAdmissions', 'theatreAdmissions.theatreRoom')->get();

        return view('layouts.theatre.index', compact('admissions'));
    }

    public function sendToTheatreQueue()
{
    $patients = Patient::with('episodes')->get();
    return view('layouts.theatre.queue', compact('patients'));
}
    public function sendToTheatre(Request $request)
    {

        try {
            $toTheatre = TheatreAdmissions::create([
                'episode' => $request->episode_id,
                'room' => $request->room,
                'doctor' => $request->doctor,
                'date' => $request->date,
                'time_in' => $request->time,
                'time_out' => '',
                'status' => 'Pending',
                'comment' => null,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Theatre Booking created successfully.');
        } catch (Exception $e) {
            logger()->error('An Error occurred while creating a new Theatre Booking: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->with('error', 'An Error occurred while creating a new Theatre Booking. Please Notify Systems Administrator For Assistance.'. $e->getMessage());
        }
    }

    public function calculateBill($patientId)
    {
        // Logic for calculating the bill based on the time spent in the operating room
    }

    public function sendToTheatreAjax(Request $request)
{
    $episodes = Episode::where('patient', $request->patient)->get();

    return response()->json(['episodes' => $episodes]);
}
}
