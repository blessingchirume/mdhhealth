<?php

namespace App\Http\Controllers;

use App\Models\PackageItem;
use App\Http\Requests\StorePackageItemRequest;
use App\Http\Requests\UpdatePackageItemRequest;

class PackageItemController extends Controller
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
     * @param  \App\Http\Requests\StorePackageItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageItem  $packageItem
     * @return \Illuminate\Http\Response
     */
    public function show(PackageItem $packageItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageItem  $packageItem
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageItem $packageItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageItemRequest  $request
     * @param  \App\Models\PackageItem  $packageItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageItemRequest $request, PackageItem $packageItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageItem  $packageItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageItem $packageItem)
    {
        //
    }
}
