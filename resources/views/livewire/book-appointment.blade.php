@extends('layouts.appointments.book-appointment')

@section('content')
    <form wire:submit.prevent="saveAppointment">
        <div class="form-group">
            <label for="patient_id">patient ID</label>
            <input type="text" class="form-control" id="patient_id" wire:model="patient_id">
        </div>
        <!-- Other input fields for doctor_id, time, and date -->

        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
@endsection
