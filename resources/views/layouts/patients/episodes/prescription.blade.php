@extends('layouts.app')

@section('content_header')
    <h1>Doctors Observation</h1>
@stop

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Patient Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"><strong>Name:</strong> {{ $episode->patient->name }}</div>
                                <div class="col-md-4"><strong>Surname:</strong> {{ $episode->patient->surname }}</div>
                                <div class="col-md-4"><strong>Date of Birth:</strong> {{ $episode->patient->dob }}</div>
                                <div class="col-md-4"><strong>Gender:</strong> {{ $episode->patient->gender }}</div>
                                <div class="col-md-4"><strong>National ID:</strong> {{ $episode->patient->national_id }}</div>
                                <div class="col-md-4"><strong>Phone Number:</strong> {{ $episode->patient->phone }}</div>
                                <div class="col-md-4"><strong>Address:</strong> {{ $episode->patient->address }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Prescribe Medication</h5>
                        </div>
                        <div class="card-body">
                            @livewire('treatment-form')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
