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
                        <h3>ANC Record<span class="float-right"><a href="{{ route('maternity.index') }}" class="btn btn-primary">Back</a></span></h3>
                    </div>
                    <div class="card-body">
                        <legend>patient Information</legend>
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
                            <a class="nav-link active" id="observation-tab" data-toggle="pill" href="#observation" role="tab" aria-controls="observation" aria-selected="true">General Assessment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="icd-10-codes-tab" data-toggle="pill" href="#icd-10-codes" role="tab" aria-controls="icd-10-codes" aria-selected="false">Obstetric Examination</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="labtests-plan-tab" data-toggle="pill" href="#lab-tests" role="tab" aria-controls="lab-tests" aria-selected="false">Tests Results</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="treatment-plan-tab" data-toggle="pill" href="#treatment-plan" role="tab" aria-controls="treatment-plan" aria-selected="false">Preventative Treatments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="education-plan-tab" data-toggle="pill" href="#education-plan" role="tab" aria-controls="education-plan" aria-selected="false">Health Education Topic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="remarks-tab" data-toggle="pill" href="#remarks" role="tab" aria-controls="remarks" aria-selected="false">Remarks</a>
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
                                    <h5 class="card-title">General Assessment</h5>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="post" action="{{ route('anc.assessment', $episode) }}">
                                        @csrf
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="gestation_age">Gestation Age (Wks)</label>
                                                        <input type="text" class="form-control" id="gestation_age" name="gestation_age" placeholder="Gestation Age" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="blood_pressure">Blood Pressure</label>
                                                        <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" placeholder="Blood Pressure" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="goitre">Goitre</label>
                                                        <input type="text" class="form-control" id="goitre" name="goitre" placeholder="Goitre" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="pallor">Pallor</label>
                                                        <input type="text" class="form-control" id="pallor" name="pallor" placeholder="Pallor" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="weight">Weight (kg)</label>
                                                        <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="height">Height (m)</label>
                                                        <input type="text" class="form-control" id="height" name="height" placeholder="Height" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="respiratory_system">Respiratory System</label>
                                                        <input type="text" class="form-control" id="respiratory_system" name="respiratory_system" placeholder="Respiratory System" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="symptomes_of_TB">Symptoms Of TB</label>
                                                        <input type="text" class="form-control" id="symptomes_of_TB" name="symptomes_of_tb" placeholder="Symptoms Of TB" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="cvs">CVS</label>
                                                        <input type="text" class="form-control" id="cvs" name="cvs" placeholder="CVS" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="abdomen">Abdomen</label>
                                                        <input type="text" class="form-control" id="abdomen" name="abdomen" placeholder="Abdomen" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="perineum">Perineum</label>
                                                        <input type="text" class="form-control" id="perineum" name="perineum" placeholder="Perineum" required>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="icd-10-codes" role="tabpanel" aria-labelledby="icd-10-codes-tab">
                            <!-- ICD-10 Codes Form -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Obstetric Examination</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('obs-examination', $episode) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="fundus_height">Height Of Fundus (cm):</label>
                                                <input type="text" name="fundus_height" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="lie">Lie:</label>
                                                <input type="text" name="lie" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="presantation">Presentation:</label>
                                                <input type="text" name="presentation" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="engaged">Engaged?:</label>
                                                <input type="text" name="engaged" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="heart_rate">Fetal Heart Rate:</label>
                                                <input type="text" name="fetal_heart_rate" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="fetal_movements">Fetal Movements:</label>
                                                <input type="text" name="fetal_movements" class="form-control" />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="lab-tests" role="tabpanel" aria-labelledby="lab-tests-tab">
                            <!-- ICD-10 Codes Form -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Laboratory Tests Results</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Test Name</th>
                                                <th>Result</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($testResults as $testResult)
                                            <tr>
                                                <td>{{ $testResult->name }}</td>
                                                <td>{{ $testResult->result }}</td>
                                                <td>{{ $testResult->comment }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                        <div class="tab-pane fade" id="education-plan" role="tabpanel" aria-labelledby="education-plan-tab">
                            <!-- education Plan Form -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Education Topics Covered</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('save-education-topics', $episode)}}" method="POST">
                                        @csrf
                                        @livewire('maternity-education')
                                        <br /><br />
                                        <button class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="remarks" role="tabpanel" aria-labelledby="remarks-tab">
                            <!-- remarks Plan Form -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Remarks/Treatments</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('save-maternity-remarks', $episode)}}" method="POST">
                                        @csrf
                                        @livewire('maternity-remarks')
                                        <br /><br />
                                        <button class="btn btn-primary">Submit</button>
                                    </form>
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
