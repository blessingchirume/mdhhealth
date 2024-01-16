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

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Notes and Observations</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('create-patient-notes', $episode) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="complaints">Presentation of Complaints</label>
                                            <textarea name="complaints" id="complaints" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="complaints_history">History of Complaints</label>
                                            <textarea name="complaints_history" id="complaints_history" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="observation">Observation</label>
                                            <textarea name="observation" id="observation" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="notes">Notes</label>
                                            <textarea name="notes" id="notes" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Observation</button>
                            </form>
                        </div>
                    </div>

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
                                        multiple="multiple">
                                        <option value="A00">Cholera</option>
                                        <option value="A01">Typhoid fever</option>
                                        <option value="A02">COVID19</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Assign Codes</button>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Treatment Plan</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('create-treatment-plan', $episode) }}">
                                @csrf

                                <div class="form-group">
                                    <label for="treatment_type">Treatment Type:</label>
                                    <select class="form-control" id="treatment_type" name="treatment_type">
                                        <option value="medication">Medication</option>
                                        <option value="other_treatment">Other Treatment</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group d-none" id="medication_section">
                                            <label for="medication">Medication:</label>
                                            <select class="form-control select2" id="medication" name="medication">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group d-none" id="dosage_section">
                                            <label for="dosage">Dosage:</label>
                                            <input type="text" class="form-control" id="dosage" name="dosage">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group d-none" id="dosage_section">
                                            <label for="frequency">Frequency:</label>
                                            <select class="form-control" id="frequency" name="frequency">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group d-none" id="dosage_section">
                                            <label for="duration">Duration:</label>
                                            <input type="text" class="form-control" id="duration" name="duration">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="instructions">Application Instructions:</label>
                                    <textarea class="form-control" id="instructions" name="instructions" rows="3"></textarea>
                                </div>

                                <div class="form-group d-none" id="other_treatment_section">
                                    <label for="other_treatment">Other Treatment:</label>
                                    <input type="text" class="form-control" id="other_treatment"
                                        name="other_treatment">
                                </div>

                                <button type="submit" class="btn btn-primary">Create Plan</button>

                                <script>
                                    $(document).ready(function() {
                                        // Show the dosage_section initially
                                        $("#medication_section, #dosage_section").removeClass("d-none");

                                        $("#treatment_type").on("change", function() {
                                            if ($(this).val() === "medication") {
                                                $("#medication_section, #dosage_section").removeClass("d-none");
                                                $("#other_treatment_section").addClass("d-none");
                                            } else {
                                                $("#medication_section, #dosage_section").addClass("d-none");
                                                $("#other_treatment_section").removeClass("d-none");
                                            }
                                        });
                                    });
                                </script>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
