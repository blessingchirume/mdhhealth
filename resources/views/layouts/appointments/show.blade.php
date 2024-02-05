@extends('layouts.app')

@section('content')
<div class="m-3">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Appointment Details</h3>
      <a href="{{ route('appointments') }}" class="btn btn-primary float-right">Back</a>
    </div>
    <div class="card-body">

      <p class="card-text">Appointment ID: {{ $appointment->id }}</p>
      <p class="card-text">Appointment Date: {{ \Carbon\Carbon::parse($appointment->start_time)->format('Y-m-d') }}</p>
      <p class="card-text">Start Time: {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i A') }}</p>
      <p class="card-text">End Time: {{ \Carbon\Carbon::parse($appointment->end_time)->format('H:i A') }}</p>
      <p class="card-text">Doctor: {{ $appointment->doctor->name }}</p>
      <p class="card-text">Patient: {{ $appointment->patient->name .' '.$appointment->patient->surname}}</p>
<p class="card-text">Purpose Of Visit: {{$appointment->booking_comment}}</p>
    </div>
  </div>
</div>
@endsection
