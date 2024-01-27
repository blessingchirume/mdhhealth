@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <!-- Initialize FullCalendar and fetch appointment data -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        initialDate: new Date().toISOString().slice(0, 10),
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        events: '/appointments/fetch', // Route to fetch appointment data
                    });

                    calendar.render();

                });
            </script>
            <div class="row">
                <div class='col-md-8'>
                    <div id='calendar'></div>
                </div>
                <div class="col-md-4 mt-3">
                    <h3>Create Appointment</h3><br>
                    <form id="booking-form" action="{{ route('book-appointment') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="Patient">Select Patient</label>
                                <livewire:patient-search />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="start_time">Start Time</label>
                                <input type="datetime-local" name="start_time" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="end_time">End Time</label>
                                <input type="datetime-local" name="end_time" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Book Appointment</button>
                        <a href="/appointments" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
