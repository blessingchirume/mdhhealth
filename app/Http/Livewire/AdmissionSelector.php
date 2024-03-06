<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TheatreRooms;
use App\Models\Ward;
class AdmissionSelector extends Component
{
    public $admitedTo;

    public $selectedTheatre;

    public $time;
    public $date;

    public function mount()
    {
        $this->admitedTo = null; // Initialize selected ward
    }
    public function render()
    {
        $theatres = TheatreRooms::all();
        $wards = Ward::all();
        return view('livewire.admission-selector', compact('theatres', 'wards'));
    }
}
