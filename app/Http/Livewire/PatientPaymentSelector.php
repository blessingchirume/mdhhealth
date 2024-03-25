<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Episode;
use App\Models\patient;
use App\Models\TheatreRooms;
use App\Models\TreatmentPlan;
use Livewire\Component;

class PatientPaymentSelector extends Component
{
    public $selectedPatient;
    public $episodes;
    public $selectedEpisode;
    public $selectedTheatre;
    public $treatmentPlan;

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

    public function updatedSelectedEpisode($value)
    {
        if ($value) {
            $this->treatmentPlan = TreatmentPlan::where('episode_id', $value)->get(); // Query episodes matching the selected patient's ID
        } else {
            $this->treatmentPlan = null; // Reset episodes when no patient is selected
        }
    }

    public function sendToTheatre($episodeId)
    {
        // Handle sending the selected episode to the theatre
    }

    public function render()
    {
        $patients = patient::all(); 
        $episodes = Episode::all();
        $theatres = TheatreRooms::all();
        $doctors = Doctor::getDoctors();
        return view('livewire.patient-payment-selector', compact('patients', 'episodes', 'theatres', 'doctors'));
    }
}
