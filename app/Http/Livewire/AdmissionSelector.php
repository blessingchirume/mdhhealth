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
        $this->admitedTo = 1; // Initialize selected ward
    }
    public function render()
    {
        $theatres = TheatreRooms::all();
        $wards = Ward::all();
        $selectedWard = Ward::where('id', $this->admitedTo)->first(); // Fetch ward data based on selection
    //    dd($selectedWard);
        return view('livewire.admission-selector', compact('theatres', 'selectedWard', 'wards'));
    }
}
