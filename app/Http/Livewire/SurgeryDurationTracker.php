<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TheatreAdmissions;

class SurgeryDurationTracker extends Component
{
    public $admissionId;
    public $startTime;

    protected $listeners = ['surgeryStarted', 'surgeryEnded'];

    public function mount($admissionId)
    {
        $this->admissionId = $admissionId;
    }

    public function surgeryStarted()
    {
        $this->startTime = now();
    }

    public function surgeryEnded()
    {
        // Perform any necessary logic when the surgery ends
    }

    public function render()
    {
        $theatreAdmission = TheatreAdmissions::with('episode.patient')->findOrFail($this->admissionId);
        $duration = $theatreAdmission->time_in ? now()->diffInMinutes($theatreAdmission->time_in) : 0;

        return view('livewire.surgery-duration-tracker', [
            'theatreAdmission' => $theatreAdmission,
            'duration' => $duration
        ]);
    }
}
