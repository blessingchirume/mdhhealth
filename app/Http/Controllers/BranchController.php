<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Http\Requests\StorebranchRequest;
use App\Http\Requests\UpdatebranchRequest;

class BranchController extends Controller
{

    public function index()
    {
        $branches = branch::all();
        return view('layouts.branches.index', compact('branches'));
    }
    public function create()
    {
        //
    }

    public function store(StorebranchRequest $request)
    {
        //
    }

    public function show($id)
    {
        return view('layouts.branches.show');
    }

    public function edit(branch $branch)
    {
        //
    }

    public function update(UpdatebranchRequest $request, branch $branch)
    {
        //
    }

    public function destroy(branch $branch)
    {
        //
    }
}
