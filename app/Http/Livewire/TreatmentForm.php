<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use App\Models\Episode;
use Exception;
use Livewire\Component;
use Auth;

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
    public $procedure = '';
    public $episode;
    public $prescriptions = [];

    public function addProcedure()
    {
        $item = Item::find($this->procedure);
        $this->procedures[] = [
            'procedure' => $item->item_description,
            // 'procedure' => $this->procedure,
        ];
        $this->prescriptions[] = [
            'medication' => $this->procedure,
            'dosage' => null,
            'frequency' => null,
            'duration' => 1,
        ];
        $this->reset('procedure');
    }

    public function mount(Episode $episode)
    {
        $this->episode = $episode;
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
        $this->prescriptions[] = [
            'medication' => $this->medication,
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
        $prescription = Prescription::create([
            'episode_id' => $this->episode->id,
            'prescribed_by' => Auth::user()->id,
            'created_at' => now()->toDateString(),
        ]);

        foreach ($this->prescriptions as $prescribed) {
            $mdecation = PrescriptionItem::create([
                'prescription_id' => $prescription->id,
                'item_id' => $prescribed['medication'],
                'dosage' => $prescribed['dosage'],
                'frequency' => $prescribed['frequency'],
                'duration' => $prescribed['duration']
            ]);
        }

        // Reset form fields after submission
        $this->reset([
            'medications',
            'otherTreatment',
            'dosage',
            'duration',
            'frequency',
            'instructions'
        ]);
    }

    public function render()
    {
        return view('livewire.treatment-form');
    }
}
