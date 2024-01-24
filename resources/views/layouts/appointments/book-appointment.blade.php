@extends('layouts.app')
@livewireStyles
@yield('styles')
@section('content')
<link href='https://fullcalendar.io/releases/core/main.css' rel='stylesheet' />
<script src='https://fullcalendar.io/releases/core/main.js'></script>

<!-- Initialize FullCalendar and fetch appointment data -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            // Configure FullCalendar options here
            // ...

            events: '/appointments/fetch', // Route to fetch appointment data
        });

        calendar.render();

        // Handle appointment booking form submission
        document.getElementById('booking-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            // Make an AJAX request to create a new appointment
            // ...
        });
    });
</script>

<div id='calendar'></div>

<!-- Appointment booking form -->
<form id="booking-form">
    <input type="text" name="patient_name" placeholder="Patient Name">
    <input type="datetime-local" name="start_time">
    <input type="datetime-local" name="end_time">
    <button type="submit">Book Appointment</button>
</form>
@endsection
@livewireScripts
@yield('scripts')
