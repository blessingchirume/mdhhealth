<?php

namespace App\Http\Controllers;

use App\Models\tank;
use App\Http\Requests\StoretankRequest;
use App\Http\Requests\UpdatetankRequest;
use Illuminate\Support\Facades\Auth;

class TankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanks = Auth::user()->branch->tanks;

// dd(Auth::user()->branch->tanks);
        return view('layouts.tanks.index', compact('tanks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretankRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function show(tank $tank)
    {
       return view('layouts.tanks.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function edit(tank $tank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetankRequest  $request
     * @param  \App\Models\tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetankRequest $request, tank $tank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function destroy(tank $tank)
    {
        //
    }
}
