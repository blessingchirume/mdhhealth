<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BookAppointment extends Component
{
    public $patient_id;
    public $doctor_id;
    public $time;
    public $date;

    public function saveAppointment()
    {
        // Add logic to save the appointment details to the database
    }

    public function render()
    {
        return view('livewire.book-appointment');
    }
}
