@extends('layouts.app')

@section('content_header')
    <h1>Doctors Consultation</h1>
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
                                <div class="col-md-4"><strong>Name:</strong> {{ $patient->name }}</div>
                                <div class="col-md-4"><strong>Surname:</strong> {{ $patient->surname }}</div>
                                <div class="col-md-4"><strong>Date of Birth:</strong> {{ $patient->dob }}</div>
                                <div class="col-md-4"><strong>Gender:</strong> {{ $patient->gender }}</div>
                                <div class="col-md-4"><strong>National ID:</strong> {{ $patient->national_id }}</div>
                                <div class="col-md-4"><strong>Phone Number:</strong> {{ $patient->phone }}</div>
                                <div class="col-md-4"><strong>Address:</strong> {{ $patient->address }}</div>
                            </div>
                        </div>
                    </div>






                    <section class="content">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                                    href="#observation-tab" role="tab" aria-controls="custom-content-below-home"
                                    aria-selected="true">Observation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-home-tab" data-toggle="pill"
                                    href="#icd-10-codes-tab" role="tab" aria-controls="icd-10-codes-tab"
                                    aria-selected="true">ICD10-Codes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-home-tab" data-toggle="pill"
                                    href="#treatment-plan-tab" role="tab" aria-controls="custom-content-below-home"
                                    aria-selected="true">Treatment Plan</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="observation-tab" role="tabpanel"
                                aria-labelledby="observation-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Observations</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('create-patient-notes', $episode) }}">
                                            @csrf
                                            @livewire('observation-form')
                                            <button type="submit" class="btn btn-primary">Save Observation</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="icd-10-codes-tab" role="tabpanel"
                                aria-labelledby="icd-10-codes-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">ICD-10 Codes</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('assign-icd10-codes', $episode) }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="icd10_codes">Select ICD-10 Codes:</label>
                                                <select id="icd10_codes" name="icd10_codes[]" class="form-control select2"
                                                    multiple="multiple" style="width: 100% color:black">
                                                    @foreach ($icd10codes as $option)
                                                        <option value="{{ $option->id }}">{{ $option->code }} |
                                                            {{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Assign Codes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="treatment-plan-tab" role="tabpanel"
                                aria-labelledby="treatment-plan-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Prescription</h5>
                                    </div>
                                    <div class="card-body">
                                        @livewire('treatment-form', ['episode' => $episode])
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

@endsection
