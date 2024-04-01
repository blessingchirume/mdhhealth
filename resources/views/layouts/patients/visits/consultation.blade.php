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






                <section class="content">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#observation-tab" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Observation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-home-tab" data-toggle="pill" href="#icd-10-codes-tab" role="tab" aria-controls="icd-10-codes-tab" aria-selected="true">ICD10-Codes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-home-tab" data-toggle="pill" href="#treatment-plan-tab" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Treatment Plan</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="observation-tab" role="tabpanel" aria-labelledby="observation-tab">
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
                                                    <textarea name="complaints" id="complaints" class="form-control">{{ $observation->complaints ?? null }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="complaints_history">History of Complaints</label>
                                                    <textarea name="complaints_history" id="complaints_history" class="form-control">{{ $observation->complaints_history ?? null }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="observation">Observation</label>
                                                    <textarea name="observation" id="observation" class="form-control">{{ $observation->observation ?? null }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                    <textarea name="notes" id="notes" class="form-control">{{ $observation->notes ?? null }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Observation</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="icd-10-codes-tab" role="tabpanel" aria-labelledby="icd-10-codes-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">ICD-10 Codes</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('assign-icd10-codes', $episode) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="icd10_codes">Select ICD-10 Codes:</label>
                                            <select id="icd10_codes" name="icd10_codes[]" class="form-control select2" multiple="multiple">
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
                        <div class="tab-pane fade show" id="treatment-plan-tab" role="tabpanel" aria-labelledby="treatment-plan-tab">
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
                                                <option value="other_treatment">Procedures / Other Treatment(s)</option>
                                            </select>
                                        </div>
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
                                                    <div class="form-group d-none" id="medication_section">
                                                        <label for="medication">Medication:</label>
                                                        <select class="form-control select2" name="medication[]" id="medication">
                                                            @foreach ($items as $option)
                                                            @if ($option->group->id != 1)
                                                            @continue
                                                            @endif
                                                            <option value="{{ $option->item_description }}">{{ $option->item_code }} |
                                                                {{ $option->item_description }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group d-none" id="dosage_section">
                                                        <label for="dosage">Dosage:</label>
                                                        <input type="text" class="form-control" name="dosage[]" id="dosage">
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group d-none" id="dosage_section">
                                                        <label for="frequency">Frequency:</label>
                                                        <select class="form-control" name="frequency[]" id="frequency">
                                                            <option value="1">Once a day</option>
                                                            <option value="2">Twice a day</option>
                                                            <option value="3">Three times a day</option>
                                                            <option value="0">As needed</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group d-none" id="dosage_section">
                                                        <label for="duration">Duration (Days):</label>
                                                        <input type="text" class="form-control" name="duration[]" id="duration">
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group d-none" id="dosage_section">
                                                        <label for="duration">&nbsp;<br /></label>
                                                        <a class="btn btn-success" id="add_medication" href="#">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group d-none" id="other_treatment_section">
                                            <label for="other_treatment">Other Treatment:</label>
                                            <select class="form-control select2" id="medication" name="other_treatment">
                                                @foreach ($items as $option)
                                                @if ($option->group->name == 'Drugs' || $option->group->name == 'Medications' || $option->group->name == 'Drug' || $option->group->name == 'Medication' || $option->group->name == 'Drugs & Medications' || $option->group->name == 'Medications & Drugs')
                                                <?php continue; ?>
                                                @endif
                                                <option value="{{ $option->item_description }}">{{ $option->item_code }} |
                                                    {{ $option->item_description }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="instructions">Application Instructions:</label>
                                            <textarea class="form-control" id="instructions" name="instructions[]" rows="3"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create Plan</button>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
        </div>
    </div>
</div>



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

    document.addEventListener('DOMContentLoaded', function() {
        var addMedicationBtn = document.getElementById('add_medication');
        var medicationTable = document.getElementById('medication_table');
        var medicationRow = document.getElementById('medication_row');

        addMedicationBtn.addEventListener('click', function(e) {
            e.preventDefault();

            // Get the form field values
            var medication = document.getElementById('medication').value;
            var dosage = document.getElementById('dosage').value;
            var frequency = document.getElementById('frequency').value;
            var duration = document.getElementById('duration').value;

            // Create a new row in the table
            var newRow = medicationTable.insertRow();
            newRow.innerHTML = `
            <td>${medication}<input type="hidden" name="medication[]" value="${medication}"></td>
            <td>${dosage}<input type="hidden" name="dosage[]" value="${dosage}"></td>
            <td>${frequency}<input type="hidden" name="frequency[]" value="${frequency}"></td>
            <td>${duration}<input type="hidden" name="duration[]" value="${duration}"></td>
         `;

            // Reset the form fields
            document.getElementById('medication').value = '';
            document.getElementById('dosage').value = '';
            document.getElementById('frequency').value = '';
            document.getElementById('duration').value = '';

            // Clone the row and append it to the form container
            // var clonedRow = medicationRow.cloneNode(true);
            //  clonedRow.classList.remove('row');
            //  medicationRow.parentNode.insertBefore(clonedRow, medicationRow.nextSibling);
        });

        // Submit the form
        // document.getElementById('submit-btn').addEventListener('click', function() {
        //       document.querySelector('form').submit();
        //  });
    });
</script>
@endsection