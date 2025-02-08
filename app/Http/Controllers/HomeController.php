<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Episode;
use App\Models\Menu;
use App\Models\Partner;
use App\Models\patient;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('menu');
    }

    public function index()
    {
        $revenue = Episode::all()->sum('base_amount');
        $payment = Payment::all()->sum('amount');
        $acruals = Episode::where('amount_due', '>', '0')->sum('amount_due');

        $analytics = [
            'patients' => patient::all()->count(),
            'partners' => Partner::all()->count(),
            'departments' => Designation::all()->count(),
            'users' => User::all()->count(),
            'revenue' => $revenue,
            'payments' => $payment,
            'acruals' => $acruals
        ];
        return view('dashboard.admin', compact('analytics'));
    }
}
