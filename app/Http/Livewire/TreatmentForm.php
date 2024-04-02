<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class TreatmentForm extends Component
{
    public $treatmentType = 'medication';
    public $medications = [];
    public $otherTreatment = '';
    public $dosage = '';
    public $duration = '';
    public $frequency = '';
    public $medication = '';
    public $instructions = '';
    public $drugs;
    public $otherTreatments;
    public $dosages = ['5mg', '10mg', '15mg'];
    public $frequencies = ['Once a day', 'Twice a day', 'Three times a day', 'As needed'];
    public $procedures = [];
    public $procedure='';

    public function addProcedure()
    {
        $item = Item::find($this->procedure);
        $this->procedures[] = [
          'procedure' =>  $item->item_description,
            // 'procedure' => $this->procedure,
        ];
        $this->reset('procedure');
    }

    public function mount()
    {
        $this->drugs = Item::whereHas('group', function ($query) {
            $query->where('name', 'Drugs');
        })->pluck('item_description', 'id')->toArray();

        $this->otherTreatments = Item::whereHas('group', function ($query) {
            $query->whereIn('name', ['Procedures', 'Services']);
        })->pluck('item_description', 'id')->toArray();
    }

    public function addMedication()
    {
        $this->validate([
            'medications.*.medication' => 'required',
            'medications.*.dosage' => 'required',
            'medications.*.frequency' => 'required',
            'medications.*.duration' => 'required',
        ]);

        $item = Item::find($this->medication);
        $this->medications[] = [
            'medication' => $item->item_description,
            'dosage' => $this->dosage,
            'frequency' => $this->frequency,
            'duration' => $this->duration,
        ];

        // Reset form fields
        $this->reset(['medication', 'dosage', 'frequency', 'duration']);

        // Emit custom event to re-render the component
        $this->emit('medicationAdded');
    }

    public function removeMedication($index)
    {
        unset($this->medications[$index]);
    }

    public function submit()
    {
        // Handle form submission logic here
        dd($this->medications);

        // Reset form fields after submission
        $this->reset([
            'medications', 'otherTreatment', 'dosage', 'duration', 'frequency', 'instructions'
        ]);
    }

    public function render()
    {
        return view('livewire.treatment-form');
    }
}
