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
                            <form method="post" action="{{ route('create-treatment-plan', $episode) }}">
                                @csrf
                                <div id="medication_section">
                                    <table id="medication_table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Medication</th>
                                                <th>Dosage</th>
                                                <th>Frequency</th>
                                                <th>Duration (Days)</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <div id="medication_row">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" id="medication_section">
                                                <label for="medication">Medication:</label>
                                                <select class="form-control select2" id="medication">
                                                    @foreach ($prescriptions as $option)
                                                    <option value="{{ $option->description }}">{{ $option->code }} |
                                                            {{ $option->description }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group" id="dosage_section">
                                                <label for="dosage">Dosage:</label>
                                                <input type="text" class="form-control" id="dosage">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group" id="dosage_section">
                                                <label for="frequency">Frequency:</label>
                                                <select class="form-control" id="frequency">
                                                    <option value="1/1">Once a day</option>
                                                    <option value="2/1">Twice a day</option>
                                                    <option value="3/1">Three times a day</option>
                                                    <option value="0/0">As needed</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group" id="dosage_section">
                                                <label for="duration">Duration (Days):</label>
                                                <input type="text" class="form-control" id="duration"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group" id="dosage_section">
                                                <label for="duration">&nbsp;<br/>&nbsp;</label>
                                                <a class="btn btn-success" id="add_medication" href="#">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Create Plan</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
