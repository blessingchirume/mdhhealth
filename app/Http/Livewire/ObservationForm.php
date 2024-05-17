<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ObservationForm extends Component
{
    public $observations = [];
    public $complaints =[];
    public $observation ='';
    public $complaint='';

    public function render()
    {
        return view('livewire.observation-form');
    }

    public function addObservation()
    {
        $this->validate([
            'complaint' => 'required',
            'observation' => 'required',
        ]);

        $this->observations[] = [
            'complaints' => $this->complaint,
            'observation' => $this->observation
        ];

        // Reset form fields
        $this->reset(['complaint', 'observation']);
    }

    public function removeObservation($index)
    {
        unset($this->observations[$index]);
    }
}
