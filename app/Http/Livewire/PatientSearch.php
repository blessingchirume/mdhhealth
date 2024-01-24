<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class PatientSearch extends Component
{
    public $selectedPatientId;

    public function render()
    {
        $patients = Patient::all();
        return view('livewire.patient-search', ['patients' => $patients]);
    }
}