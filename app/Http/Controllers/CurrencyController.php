<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Group;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        $groups = Group::all();

        return view('layouts.currency.index', compact('currencies', 'groups'));
    }
}
