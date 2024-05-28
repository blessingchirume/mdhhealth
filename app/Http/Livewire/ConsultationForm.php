<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use App\Models\CurrencyGroup;
use App\Models\Doctor;
use App\Models\Episode;
use App\Models\Group;
use App\Models\Item;
use App\Models\patient;
use App\Models\PaymentOption;
use App\Models\Prescription;
use App\Models\TheatreRooms;
use Livewire\Component;

class ConsultationForm extends Component
{


    public $selectedPatient;
    public $episodes;
    public $selectedEpisode;
    public $selectedTheatre;
    public $treatmentPlan;
    public $administeredMedication;
    public $currencies;
    public $paymentOptions;
    public $selectedDoctor;
    public $date;
    public $time;
    public $designation;
    public $billingGroups;
    public $selectedBillingGroup;

    public function render()
    {
        $patients = patient::all();
        $episodes = Episode::all();
        $theatres = TheatreRooms::all();
        $this->currencies = Currency::all();
        $this->paymentOptions = PaymentOption::all();
        $this->billingGroups = Group::all();
        $doctors = Doctor::getDoctors();
        return view('livewire.payments.consultation-form', compact('patients', 'episodes', 'theatres', 'doctors'));
    }

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

    public function updateSelectedBillingGroup($value)
    {
        if ($value) {
            $item = Item::where('category', 'consultation')->first();
        } else {
            // $this->
        }
    }

    public function updatedSelectedEpisode($value)
    {
        // dd($this->selectedEpisode);
        if ($value) {
            $this->treatmentPlan = Prescription::where('episode_id', $value)->first()->prescription_items; // Query episodes matching the selected patient's ID
            $episode = Episode::find($this->selectedEpisode);

            // $this->administeredMedication = $episode->chargesheetItems(); // Query episodes matching the selected patient's ID

            $this->date = $episode->date;
            $this->designation = $episode->designation;
        } else {
            $this->treatmentPlan = null; // Reset episodes when no patient is selected
        }
    }

    public function sendToTheatre($episodeId)
    {
        // Handle sending the selected episode to the theatre
    }

    public function removePrescriptionItem($index)
    {
        unset($this->treatmentPlan[$index]);
        // $this->treatmentPlan = array_values($this->treatmentPlan);
    }
}
