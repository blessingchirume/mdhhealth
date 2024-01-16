@extends('layouts.app')

@section('content_header')
    <h1>Administer Treatment</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Patient Information</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $patient->name }}</p>
                        <p><strong>Surname:</strong> {{ $patient->surname }}</p>
                        <p><strong>Date of Birth:</strong> {{ $patient->dob }}</p>
                        <p><strong>Gender:</strong> {{ $patient->gender }}</p>
                        <p><strong>National ID:</strong> {{ $patient->national_id }}</p>
                        <p><strong>Phone Number:</strong> {{ $patient->phone }}</p>
                        <p><strong>Address:</strong> {{ $patient->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Administer Treatment</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('administer.treatment', $patient->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="treatment">Treatment</label>
                                <textarea class="form-control" id="treatment" name="treatment" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="notes">Additional Notes</label>
                                <textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Administer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
