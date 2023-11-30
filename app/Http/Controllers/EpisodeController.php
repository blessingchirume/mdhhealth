<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\Models\ChargeSheet;
use App\Models\EpisodeItem;
use App\Models\Item;
use App\Models\Note;
use App\Models\patient;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class EpisodeController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, patient $patient)
    {

        $data = $request->validate([
            'patient_type' => 'required',
            'attendee' => 'required',
            'ward' => 'required',
        ]);

        $data["episode_entry"] = (int)Episode::where('patient_id', $patient->id)->max('episode_entry') + 1;
        $data["episode_code"] = $patient->patient_id . "/" . $data["episode_entry"];

        $data["patient_id"] = $patient->id;
        $data["date"] = date('Y-m-d');

        $episode = Episode::create($data);

        ChargeSheet::create([
            "episode_id" => $episode->id,
            "checkin" => date('Y-m-d'),
        ]);
        return back();
    }

    public function show(Episode $episode)
    {
        $items = Item::all();
        $episode->load(['chargesheet']);
        return view('layouts.patients.episodes.show', compact('episode', 'items'));
    }

    public function edit(Episode $episode)
    {
        //
    }

    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        //
    }

    public function destroy(Episode $episode)
    {
        //
    }

    public function createNote(Request $request, Episode $episode)
    {
        try {
            $note = Note::create([
                'episode_id' => $episode->id,
                'comment' => $request->comment
            ]);
            return redirect()->back()->with('success', 'comment added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function createItem(Request $request, Episode $episode)
    {
        try {
            $item = EpisodeItem::create([
                'episode_id' => $episode->id,
                'item_id' => $request->item_id,
                'quantity' => $request->quantity
            ]);

            $base_amount = $episode->base_amount;
            $amount_due = $episode->amount_due;
            foreach ($episode->items as $item) {
                $base_amount += (int)($item->pivot->quantity) * (int)($episode->patient->medicalaid->package->itemPrice($item->id, $episode->patient->medicalaid->package->id)->price);
                $amount_due += (int)($item->pivot->quantity) * (int)($episode->patient->medicalaid->package->itemPrice($item->id, $episode->patient->medicalaid->package->id)->price);
            }
            $episode->update(['amount_due' => $amount_due, 'base_amount' => $base_amount]);           
            return redirect()->back()->with('success', 'comment added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
