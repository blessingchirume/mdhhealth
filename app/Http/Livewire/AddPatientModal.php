<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use App\Models\OPDQueue;

class AddPatientModal extends Component
{
    public $name;
    public $surname;
    public $age;
    public $gender;
    public $search;
    public $existingPatients = [];
    public $selectedPatientId;

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
        $this->age = null;
        $this->gender = '';
        $this->search = '';
        $this->selectedPatientId = null;
    }

    public function selectPatient($patientId)
{
    // Fetch the details of the selected patient
    $selectedPatient = Patient::find($patientId);

    // Set the form fields with the details of the selected patient
    $this->name = $selectedPatient->name;
    $this->surname = $selectedPatient->surname;
    $this->age = $selectedPatient->age;
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
            OPDQueue::create([
                'patient_id' => $this->selectedPatientId,
                // Other fields for OPD queue
            ]);
        } else {
            // Create a new patient
            $newPatient = Patient::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'age' => $this->age,
                'gender' => $this->gender,
                // Other fields for Patient
            ]);

            // Add new patient to OPD queue
            OPDQueue::create([
                'patient_id' => $newPatient->id,
                // Other fields for OPD queue
            ]);
        }

        // Reset the form
        $this->resetForm();

        // Close the modal after adding the patient
        $this->emit('closeModal');
    }
}
