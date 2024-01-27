<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheatreAdmissions;
use App\Events\SurgeryStarted;
use App\Events\SurgeryEnded;

class SurgeryController extends Controller
{
    // Trigger Livewire event when surgery starts
    public function startSurgery($admissionId)
    {
        $TheatreAdmissions = TheatreAdmissions::findOrFail($admissionId);
        $TheatreAdmissions->update(['time_in' => now()->format('H:i:s'), 'status' => 'In-surgery']);

        // Trigger Livewire event
        event(new SurgeryStarted());

        return redirect()->back()->with('success', 'Surgery started successfully.');
    }

    // Trigger Livewire event when surgery ends
    public function endSurgery($admissionId)
    {
        $TheatreAdmissions = TheatreAdmissions::findOrFail($admissionId);
        $TheatreAdmissions->update(['time_out' => now()->format('H:i:s'),'status' => 'Completed']);

        // Trigger Livewire event
        event(new SurgeryEnded());

        return redirect()->back()->with('success', 'Surgery ended successfully.');
    }
}
