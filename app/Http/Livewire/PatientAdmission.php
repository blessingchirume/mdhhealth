<?php

// app/Http/Livewire/PatientAdmission.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\patient;

class PatientAdmission extends Component
{
    public $patient;
    public $patientName;
    public $surname;
    public $age;
    public $dob;
    public $gender;

    protected $listeners = ['patientSelected'];

    public function render()
    {
        return view('livewire.patient-admission');
    }

    public function updatedPatientName($value)
    {
        $this->resetFields();
        $this->searchPatient();
    }

    public function searchPatient()
    {
        $this->resetFields();

        if (!empty($this->patientName)) {
            $this->patient = patient::where('name', 'like', '%' . $this->patientName . '%')->first();
        }
    }

    public function patientSelected()
    {
        if ($this->patient) {
            $this->surname = $this->patient->surname;
            $this->age = $this->patient->age;
            $this->dob = $this->patient->dob;
            $this->gender = $this->patient->gender;
        }
    }

    public function addPatient()
    {
        // Logic to add a new patient to the database
        // You can customize this method based on your specific requirements
    }

    private function resetFields()
    {
        $this->patient = null;
        $this->surname = null;
        $this->age = null;
        $this->dob = null;
        $this->gender = null;
    }
}
