<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use App\Models\Episode;
use App\Models\ChargeSheet;

class AddPatientModal extends Component
{
    public $name;
    public $surname;
    public $dob;
    public $gender;
    public $search;
    public $existingPatients = [];
    public $selectedPatientId;
    public $medicalAidDetails;
    public $paymentGuarantorDetails;
    public $nextOfKinDetails;
    public $currentStage = 1;
    public $paymentOption;

    protected $rules = [
        'name' => 'required',
        'surname' => 'required',
        'dob' => 'required',
        'gender' => 'required',
    ];

    public function render()
    {
        // Only fetch existing patients if the search input is not empty
        if (!empty($this->search)) {
            $this->existingPatients = Patient::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('surname', 'like', '%' . $this->search . '%')
                ->get();
        } else {
            $this->existingPatients = [];
        }

        return view('livewire.add-patient-modal');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->surname = '';
        $this->dob = null;
        $this->gender = '';
        $this->search = '';
        $this->selectedPatientId = null;
        $this->medicalAidDetails = '';
        $this->paymentGuarantorDetails = '';
        $this->nextOfKinDetails = '';
        $this->currentStage = 1;
    }

    public function nextStage()
    {
        $this->validate();

        $this->currentStage++;
    }

    public function previousStage()
    {
        $this->currentStage--;
    }
    public function skipStage()
    {
        // Increment the current stage to move to the next stage
        $this->currentStage++;
    }

    public function switchStage($stage) {
        $this->currentStage = $stage;
    }

    public function selectPatient($patientId)
    {
        // Fetch the details of the selected patient
        $selectedPatient = Patient::find($patientId);

        // Set the form fields with the details of the selected patient
        $this->name = $selectedPatient->name;
        $this->surname = $selectedPatient->surname;
        $this->dob = $selectedPatient->dob;
        $this->gender = $selectedPatient->gender;

        // Clear the search input and existing suggestions
        $this->search = '';
        $this->existingPatients = [];
    }

    public function addPatient()
    {
        // If a patient is selected from the autosuggestion
        if ($this->selectedPatientId) {
            // Add selected patient to OPD queue
            Episode::create([
                'patient_id' => $this->selectedPatientId,
                // Other fields for OPD queue
            ]);
        } else {
            // Create a new patient
            $newPatient = Patient::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'dob' => $this->dob,
                'gender' => $this->gender,
                // Other fields for Patient
            ]);

            // Add new patient to OPD queue
            $data["episode_entry"] = (int)Episode::where('patient_id', $newPatient->id)->max('episode_entry') + 1;
            $data["episode_code"] = $newPatient->patient_id . "/" . $data["episode_entry"];

            $data["patient_id"] = $newPatient->id;
            $data["payment_option_id"] = $this->paymentOption;
            $data["date"] = date('Y-m-d');

            $episode = Episode::create($data);

            ChargeSheet::create([
                "episode_id" => $episode->id,
                "checkin" => date('Y-m-d'),
            ]);
        }

        // Reset the form
        $this->resetForm();

        // Close the modal after adding the patient
        $this->emit('closeModal');
    }
}
