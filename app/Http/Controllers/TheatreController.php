<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\TheatreAdmissions;
use App\Models\Episode;
use Auth;
use Exception;
use App\Models\ChargeSheet;
use App\Models\ChargesheetItem;
use App\Models\Item;
use App\Models\ItemGroup;
use NumberFormatter;

class TheatreController extends Controller
{
    public function index()
    {
        $admissions = Episode::has('theatreAdmissions')->with('theatreAdmissions', 'theatreAdmissions.theatreRoom')->get();

        return view('layouts.theatre.index', compact('admissions'));
    }

    public function sendToTheatreQueue()
    {
        $patients = Patient::with('episodes')->get();
        return view('layouts.theatre.queue', compact('patients'));
    }
    public function sendToTheatre(Request $request)
    {
        $existingSlot = $this->checkAvailableSlots($request->room, $request->doctor, $request->date, $request->time)->first();

        if ($existingSlot) {
            return redirect()->back()->with('error', 'This time slot is already booked.');
            exit;
        }

        // Proceed with booking creation

        try {
            $toTheatre = TheatreAdmissions::create([
                'episode_id' => $request->episode_id,
                'room' => $request->room,
                'doctor' => $request->doctor,
                'date' => $request->date,
                'time_in' => $request->time,
                'time_out' => '',
                'status' => 'Pending',
                'comment' => null,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Theatre Booking created successfully.');
        } catch (Exception $e) {
            logger()->error('An Error occurred while creating a new Theatre Booking: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->with('error', 'An Error occurred while creating a new Theatre Booking. Please Notify Systems Administrator For Assistance.' . $e->getMessage());
        }
    }

    public function checkAvailableSlots($room, $doctor, $date, $time)
    {
        return TheatreAdmissions::where('room', $room)
            ->where('doctor', $doctor)
            ->where('date', $date)
            ->where('time_in', $time)
            ->where('status', '!=', 'Completed');
    }

    public function addBillables(Episode $episode)
    {
        $itemgroups = ItemGroup::all();
        return view('layouts.theatre.billables', compact('episode', 'itemgroups'));
    }

    public function storeBillables(Episode $episode, Request $request)
    {
        try {
            $admission = TheatreAdmissions::where('episode_id', $episode->id)->first();
            if ($admission) {
                $chargeSheet = ChargeSheet::where('episode_id', $episode->id)->get()->first();
                
                /*$item = Item::where('item_code', 'OPR')->get()->first();

                $timeIn = \DateTime::createFromFormat('H:i:s', $admission->time_in);
                $timeOut = \DateTime::createFromFormat('H:i:s', $admission->time_out);

                $operatingRoomDuration = $timeOut->getTimestamp() - $timeIn->getTimestamp();
                $operatingRoomTimeInMinutes = $operatingRoomDuration / 60;

                $billAmount = $operatingRoomTimeInMinutes * $item->price_unit;


                


                $chargeSheetItem = ChargeSheetItem::firstOrCreate(['item_id' => $item->id, 'charge_sheet_id' => $chargeSheet->id]);
                $chargeSheet->chargesheetitems()->save($chargeSheetItem);

*/
                // Validate the incoming request data
                $validatedData = $request->validate([
                    'item.*' => 'required',
                    'quantity.*'=>'required',
                ]);

                // Loop through each submitted entry and store it in the database
                foreach ($validatedData['item'] as $key => $item_id) {
                    if( $validatedData['item'][$key]=='0' || $validatedData['quantity'][$key]=='0'){
                        continue;
                    }
                    // Create a new TheatreBillable instance
                    $billable = ChargeSheetItem::create([
                        'charge_sheet_id'=>$chargeSheet->id,
                        'item_id' => $validatedData['item'][$key],
                        'quantity' => $validatedData['quantity'][$key],
                    ]);
                }
return redirect()->back()->with('success', 'Billables added successfully.');
            }
        } catch (Exception $e) {

            logger()->error('An Error occurred while Calculating Bill : ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'An Error occurred while Culculating Bill. Please Notify Systems Administrator For Assistance.' . $e->getMessage());
        }
    }
    public function sendToTheatreAjax(Request $request)
    {
        $episodes = Episode::where('patient', $request->patient)->get();

        return response()->json(['episodes' => $episodes]);
    }
}
