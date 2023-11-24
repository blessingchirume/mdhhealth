<?php

namespace App\Http\Controllers;

use App\Models\EmployeeGroup;
use App\Http\Requests\StoreEmployeeGroupRequest;
use App\Http\Requests\UpdateEmployeeGroupRequest;

class EmployeeGroupController extends Controller
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
     * @param  \App\Http\Requests\StoreEmployeeGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeGroup  $employeeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeGroup $employeeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeGroup  $employeeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeGroup $employeeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeGroupRequest  $request
     * @param  \App\Models\EmployeeGroup  $employeeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeGroupRequest $request, EmployeeGroup $employeeGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeGroup  $employeeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeGroup $employeeGroup)
    {
        //
    }
}
