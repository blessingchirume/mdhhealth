<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StorebranchRequest;
use App\Http\Requests\UpdatebranchRequest;

class BranchController extends Controller
{

    public function index()
    {
        $branches = Branch::all();
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

    public function edit(Branch $branch)
    {
        //
    }

    public function update(UpdatebranchRequest $request, Branch $branch)
    {
        //
    }

    public function destroy(Branch $branch)
    {
        //
    }
}
