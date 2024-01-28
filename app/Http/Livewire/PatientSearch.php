<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use App\Models\Doctor;

class PatientSearch extends Component
{
    public $selectedPatientId;
    public $appointmentDate;
    public $startTime;
    public $endTime;
    public $selectedDoctorId;

    public function render()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('livewire.appointment', compact('patients', 'doctors'));
    }
}
