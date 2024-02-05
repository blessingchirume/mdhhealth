<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use App\Models\Episode;
use App\Models\TheatreRooms;
use App\Models\Doctor;

class SendToTheatre extends Component
{
    public $selectedPatient;
    public $episodes;
    public $selectedEpisode;
    public $selectedTheatre;

    public $selectedDoctor;
    public $date;
    public $time;

    public function mount()
    {
        $this->selectedPatient = null; // Initialize selected patient
    }

    public function updatedSelectedPatient($value)
    {
        if ($value) {
            $this->episodes = Episode::where('patient_id', $value)->get(); // Query episodes matching the selected patient's ID
        } else {
            $this->episodes = null; // Reset episodes when no patient is selected
        }
    }

    public function sendToTheatre($episodeId)
    {
        // Handle sending the selected episode to the theatre
    }

    public function render()
    {
        $patients = Patient::all(); 
        $episodes = Episode::all();
        $theatres = TheatreRooms::all();
        $doctors = Doctor::getDoctors();

        return view('livewire.send-to-theatre', compact('patients', 'episodes', 'theatres','doctors'));
    }
}
