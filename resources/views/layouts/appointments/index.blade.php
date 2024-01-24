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

            <br/>
           <form id="booking-form" action="{{ route('book-appointment') }}" method="POST">
               @csrf
               <div class="row">
                   <div class="col-md-5 mb-3">
                       <livewire:patient-search />
                   </div>
                   <div class="col-md-3 mb-3">
                       <input type="date" name="date" class="form-control">
                   </div>
                   <div class="col-md-2 mb-3">
                       <input type="time" name="start_time" class="form-control">
                   </div>
                   <div class="col-md-2 mb-3">
                       <input type="time" name="end_time" class="form-control">
                   </div>
               </div>
               <button type="submit" class="btn btn-primary">Book Appointment</button>
               <a href="/appointments" class="btn btn-secondary">Cancel</a>
           </form>
        </div>
    </div>
@endsection
