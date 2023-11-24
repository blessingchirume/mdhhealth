<?php

namespace App\Http\Controllers;

use App\Models\pump;
use App\Http\Requests\StorepumpRequest;
use App\Http\Requests\UpdatepumpRequest;

class PumpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorepumpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepumpRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function show(pump $pump)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function edit(pump $pump)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepumpRequest  $request
     * @param  \App\Models\pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepumpRequest $request, pump $pump)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function destroy(pump $pump)
    {
        //
    }
}
