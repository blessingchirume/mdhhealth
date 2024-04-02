<?php

namespace App\Http\Livewire;

use App\Models\Icd10Code;
use App\Models\Episode;
use Livewire\Component;

class ICD10Form extends Component
{
    public $episode;
    public $selectedIcd10Codes = [];

    public function mount(Episode $episode)
    {
        $this->episode = $episode;
    }

    public function render()
    {
        $icd10codes = Icd10Code::all();
        return view('livewire.icd10-form', ['icd10codes' => $icd10codes]);
    }

    public function assignIcd10Codes()
    {
        $this->validate([
            'selectedIcd10Codes' => 'required|array',
            'selectedIcd10Codes.*' => 'exists:icd10_codes,id',
        ]);

        $this->episode->icd10Codes()->sync($this->selectedIcd10Codes);

        // Reset selected codes after submission
        $this->selectedIcd10Codes = [];

        session()->flash('message', 'ICD-10 codes assigned successfully.');
    }
}
