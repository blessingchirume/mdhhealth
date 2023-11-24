<?php

namespace App\Http\Controllers;

use App\Models\ItemGroup;
use App\Http\Requests\StoreItemGroupRequest;
use App\Http\Requests\UpdateItemGroupRequest;

class ItemGroupController extends Controller
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
     * @param  \App\Http\Requests\StoreItemGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemGroup  $itemGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ItemGroup $itemGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemGroup  $itemGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemGroup $itemGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemGroupRequest  $request
     * @param  \App\Models\ItemGroup  $itemGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemGroupRequest $request, ItemGroup $itemGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemGroup  $itemGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemGroup $itemGroup)
    {
        //
    }
}
