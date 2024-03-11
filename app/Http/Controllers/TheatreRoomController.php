<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheatreRooms;
use App\Models\Bed;

class TheatreRoomController extends Controller
{
 public function index()
 {
     return view('layouts.theatre.index');
 }

 public function store(Request $request)
 {
     $request->validate([
         'room' => 'required',
         'status' => 'required',
         'comment' => 'nullable',
     ]);
     $theatre = TheatreRooms::create([
         'room' => $request->room,
         'status' => $request->status,
         'comment' => $request->comment,
     ]);
    return redirect()->back()->with('success', 'Theatre Room created successfully');
}
}
