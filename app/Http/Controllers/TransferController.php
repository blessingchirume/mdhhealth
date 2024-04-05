<?php

namespace App\Http\Controllers;

use App\Models\ChargeSheet;
use App\Models\Episode;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        return view('transfers.index');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        try {
            $episode = Episode::find($request->episode_id);
            $episode->update(['patient_type' => 'Transfered OutPatient']);
            $oldChargesheet = ChargeSheet::where('episode_id', '=', $episode->id)->first();
            $oldChargesheet->update(['checkout' => now()]);
            $data["episode_entry"] = (int) Episode::where('patient_id', $episode->patient->id)->max('episode_entry') + 1;
            $data["episode_code"] = $episode->patient->patient_id . "/" . $data["episode_entry"];
            $data["patient_id"] = $episode->patient->id;
            $data["patient_type"] = $request->destination_id;
            $data["payment_option_id"] = $episode->payment_option_id;
            $data['visit_purpose'] = $request->reason;
            $data['ward'] = $request->ward;
            $data['attendee'] = $request->destination_id;
            $data["date"] = date('Y-m-d');

            $newEpisode = Episode::create($data);

            ChargeSheet::create([
                "episode_id" => $newEpisode->id,
                "checkin" => date('Y-m-d'),
            ]);

            return redirect()->back()->with('success', 'Patient Transferred successfully!');

        } catch (\Exception $e) {
            logger()->error('An Error occurred while creating a new Episode: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->with('error', 'An Error occurred while Traansfering Patient: ' . $e->getMessage());
        }

    }

    public function show($id)
    {
        //
    }
}
