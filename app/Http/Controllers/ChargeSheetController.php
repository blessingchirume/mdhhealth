<?php

namespace App\Http\Controllers;

use App\Models\ChargeSheet;
use App\Http\Requests\StoreChargeSheetRequest;
use App\Http\Requests\UpdateChargeSheetRequest;

class ChargeSheetController extends Controller
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
     * @param  \App\Http\Requests\StoreChargeSheetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChargeSheetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChargeSheet  $chargeSheet
     * @return \Illuminate\Http\Response
     */
    public function show(ChargeSheet $chargeSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChargeSheet  $chargeSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(ChargeSheet $chargeSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChargeSheetRequest  $request
     * @param  \App\Models\ChargeSheet  $chargeSheet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChargeSheetRequest $request, ChargeSheet $chargeSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChargeSheet  $chargeSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChargeSheet $chargeSheet)
    {
        //
    }
}
