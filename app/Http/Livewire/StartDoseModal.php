<?php

namespace App\Http\Livewire;

use App\Models\PrescriptionItem;
use Livewire\Component;

class StartDoseModal extends Component
{
    public $medicationId;
    public $startDose;

    public function mount($medicationId)
    {
        $this->medicationId = $medicationId;
    }

    public function submit()
    {
        $prescription = PrescriptionItem::find($this->medicationId);
        $prescription->update(['start_dose'=>$this->startDose, 'has_start_dose'=>1]);
        //dd($prescription);
        // Close the modal after form submission
        $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.start-dose-modal');
    }
}
