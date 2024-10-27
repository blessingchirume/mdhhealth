<?php

namespace App\Http\Controllers;

use App\Models\ChargeSheet;
use App\Models\ChargesheetItem;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\RadiologyBooking;
use App\Models\ScanCategory;
use App\Models\Item;

class RadiologyController extends Controller
{
    //

    public function index()
    {
        $episodes = Episode::with('radiology')->get();
        return view('layouts.radiology.index', compact('episodes'));
    }

    public function bookings()
    {
        $bookings = RadiologyBooking::with('episode', 'scans')->get();
        return view('layouts.radiology.bookings', compact('bookings'));
    }

    public function create(Episode $episode)
    {
        $categories = ScanCategory::all();
        $age = PatientController::calculateAge($episode->patient->dob);

        return view('layouts.radiology.scan-booking', compact('categories', 'episode', 'age'));
    }

    public function store(Episode $episode, Request $request)
    {
        try {
            $chargesheet = ChargeSheet::where('episode_id', '=', $episode->id)->first();
            $book = RadiologyBooking::create([
                'episode_id' => $episode->id,
                'scan_category_id' => 1,
            ]);
            foreach ($request->tests as $test) {
                $scan = ScanCategory::find($test);
                $item = Item::find($scan->item_id);
                $chargesheet_item = ChargesheetItem::create([
                    'item_id'=>$item->id,
                    'charge_sheet_id'=>$chargesheet->id,
                    'quantity'=>1,
                    'status'=>'Pending'
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed To Add Radiology Booking. ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Radiology Booking Created Successfully. ');
    }

    public function bill(Episode $episode, Request $request)
    {

    }

    public function show()
    {
    }
}
