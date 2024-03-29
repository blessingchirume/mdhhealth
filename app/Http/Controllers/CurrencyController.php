<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\CurrencyGroup;
use App\Models\Group;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        $groups = Group::all();

        // dd($groups);

        return view('layouts.currency.index', compact('currencies', 'groups'));
    }

    public function update(Request $request, CurrencyGroup $group)
    {
        if ($request->ajax()) {
            $group->find($request->pk)->update(['rate' => $request->value]);
            return response()->json(['success' => true]);
        }
    }
}
