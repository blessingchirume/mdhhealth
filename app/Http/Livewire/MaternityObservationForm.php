<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MaternityObservationForm extends Component
{
    public $observations = [];
    public $complaints =[];
    public $observation ='';
    public $complaint='';

    public function render()
    {
        return view('livewire.maternity-observation-form');
    }

    public function addObservation()
    {
        $this->validate([
            'observation' => 'required',
        ]);

        $this->observations[] = [
            'observation' => $this->observation
        ];

        // Reset form fields
        $this->reset(['observation']);
    }

    public function removeObservation($index)
    {
        unset($this->observations[$index]);
    }
}
