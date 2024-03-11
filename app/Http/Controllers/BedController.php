<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\TheatreRooms;

class BedController extends Controller
{
    public function store(Ward $ward, Request $request)
    {
        $data = $request->validate([
            'ward_id' => 'required',
            'name' => 'required'
        ]);
        try {
            $bed = Bed::create($data);
            if($ward->name == "Theatre" || $ward->name == "Surgery" || $ward->name == "OR" || $ward->name == "Operating Room") {
             $theatreroom = TheatreRooms::create([
                 'room' => $request->name,
                 'status' => 'Available',
                 'comment' => 'Available',
                 'ward_id' => $request->ward_id
             ]);
            }
            return back()->with('success', 'successful');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
