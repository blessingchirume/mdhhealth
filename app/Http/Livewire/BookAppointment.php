<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Doctor;

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
        $doctors = Doctor::getDoctors();
        return view('livewire.book-appointment', compact('doctors'));
    }
}
