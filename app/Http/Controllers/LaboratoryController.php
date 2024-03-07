<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabBooking;
use App\Models\Episode;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = Episode::with('labTests')->get();
        return view('layouts.laboratory.index', compact('episodes'));
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $bookings = LabBooking::with('tests')->get();

        return view('layouts.laboratory.bookings', compact('bookings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Conclude the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function conclude($id)
    {
        $booking = LabBooking::find($id);
        $booking->status = 'Concluded';
        $booking->save();
        return redirect()->back()->with('success', 'Test has been concluded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
