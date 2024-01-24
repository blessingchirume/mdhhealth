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

    public function show(Ward $ward)
    {
        $wards = Ward::all();
        return view('layouts.wards.show', compact('ward'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type_id' => 'required',
            'name' => 'required'
        ]);
        try {
            $ward = Ward::create($data);

            return back()->with('success', 'successful');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
