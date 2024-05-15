<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Package;
use App\Models\Partner;
use App\Http\Requests\UpdatePartnerRequest;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index()
    {
        $collection = Partner::all();
        return view('layouts.medicalaid.index', compact('collection'));
    }

    public function create()
    {
    }

    public function store(StorePartnerRequest $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['code' => 'required', 'name' => 'required']);
        $data = ['code' => $request->code, 'name' => $request->name, 'acronym'=>$request->acronym ];
        try {
            Partner::create($data)->save();
            return redirect()->route('medicalaid.index')->with('success', 'Provider added successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('medicalaid.index')->with('error', $th->getMessage());
        }
    }

    protected function associatePackage(Request $request, Partner $partner)
    {
        $package = Package::create([
            'partner_id' => $partner->id,
            'name' => $request->code
        ]);
        try {
            return redirect()->route('medicalaid.show', $partner)->with('success', 'Package created successfully!');
        }catch (\Exception $th){
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Partner $partner)
    {
        return view('layouts.medicalaid.show', compact('partner'));
    }

    public function edit(Partner $partner)
    {
        //
    }

    public function update(Request $request, Partner $partner)
    {
        try {
            $partner->update($request->all());
            return redirect()->route('medicalaid.show', $partner)->with('success', 'Provider details updated successfully');
        }catch (\Exception $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Partner $partner)
    {
        //
    }
}
