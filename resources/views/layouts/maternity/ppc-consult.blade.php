@extends('layouts.app')

@section('content_header')
<h1>ANC Record</h1>
@stop

@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Post Partum Care <span class="float-right"><a href="{{ route('maternity.index') }}" class="btn btn-primary">Back</a></span></h3>
                    </div>
                    <div class="card-body">
                    <legend>Patient Information</legend>
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
                            <a class="nav-link active" id="observation-tab" data-toggle="pill" href="#observation" role="tab" aria-controls="observation" aria-selected="true">Mother</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="icd-10-codes-tab" data-toggle="pill" href="#icd-10-codes" role="tab" aria-controls="icd-10-codes" aria-selected="false">Infant</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-plan-tab" data-toggle="pill" href="#reviews-plan" role="tab" aria-controls="reviews-plan" aria-selected="false">Health Education Topic</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-plan-tab" data-toggle="pill" href="#reviews-plan" role="tab" aria-controls="reviews-plan" aria-selected="false">Schedule Review</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="observation" role="tabpanel" aria-labelledby="observation-tab">
                            <!-- Observation Form -->
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
                                    <br/><br/>
                                    <form action="{{ route('upload.store', $episode) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file">
                                        <button type="submit" class="btn btn-primary">Upload Images</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="icd-10-codes" role="tabpanel" aria-labelledby="icd-10-codes-tab">
                            <!-- ICD-10 Codes Form -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">ICD-10 Codes</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('assign-icd10-codes', $episode) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="icd10_codes">Select ICD-10 Codes:</label>
                                            <select id="icd10_codes" name="icd10_codes[]" class="form-control select2" multiple="multiple" style="width: 100% color:black">
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
                        <div class="tab-pane fade" id="treatment-plan" role="tabpanel" aria-labelledby="treatment-plan-tab">
                            <!-- Treatment Plan Form -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Prescription</h5>
                                </div>
                                <div class="card-body">
                                    @livewire('treatment-form', ['episode' => $episode])
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews-plan" role="tabpanel" aria-labelledby="reviews-plan-tab">
                            <!-- Reviews Form -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Set Next Visit Date</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('set-review-date') }}">
                                        @csrf
                                        <input type="hidden" name="patient" value="{{ $patient->id }}">
                                        <input type="hidden" name="doctor" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="purpose" value="Review Vist">
                                        <div class="form-group">
                                            <label for="start_time">Select Review Date and Time:</label>
                                            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                                        </div>
                                        <input type="hidden" id="end_time" name="end_time">
                                        <button type="submit" class="btn btn-primary">Book For Review</button>
                                    </form>
                                    <!-- Display availability feedback here -->
                                    @if (isset($availability))
                                    @if ($availability)
                                    <div class="alert alert-success mt-3" role="alert">
                                        Slot is available for the selected date and time.
                                    </div>
                                    @else
                                    <div class="alert alert-danger mt-3" role="alert">
                                        Slot is not available for the selected date and time. Please choose another slot.
                                    </div>
                                    @endif
                                    @endif
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('start_time').addEventListener('change', function() {
            var startTime = new Date(this.value);
            var endTime = new Date(startTime.getTime() + 30 * 60000); // Add 30 minutes (30 * 60000 milliseconds)
            document.getElementById('end_time').value = endTime.toISOString().slice(0, 16); // Format as YYYY-MM-DDTHH:MM
        });
    });

</script>
@endsection
