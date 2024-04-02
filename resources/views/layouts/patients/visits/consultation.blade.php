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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="patient-info-tab" data-toggle="tab" href="#patient-info"
                                role="tab" aria-controls="patient-info" aria-selected="true">Patient Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="notes-observations-tab" data-toggle="tab"
                                href="#notes-observations" role="tab" aria-controls="notes-observations"
                                aria-selected="false">Notes and Observations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="icd10-codes-tab" data-toggle="tab" href="#icd10-codes" role="tab"
                                aria-controls="icd10-codes" aria-selected="false">ICD-10 Codes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="treatment-plan-tab" data-toggle="tab" href="#treatment-plan"
                                role="tab" aria-controls="treatment-plan" aria-selected="false">Treatment Plan</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="patient-info" role="tabpanel"
                            aria-labelledby="patient-info-tab">
                            <!-- Patient Information Card -->
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
                                        <div class="col-md-4"><strong>National ID:</strong> {{ $patient->national_id }}
                                        </div>
                                        <div class="col-md-4"><strong>Phone Number:</strong> {{ $patient->phone }}</div>
                                        <div class="col-md-4"><strong>Address:</strong> {{ $patient->address }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="notes-observations" role="tabpanel"
                            aria-labelledby="notes-observations-tab">
                            <!-- Notes and Observations Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Notes and Observations</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Notes and Observations Content -->

                                        @livewire('observation-form')

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="icd10-codes" role="tabpanel"
                            aria-labelledby="icd10-codes-tab">
                            <!-- ICD-10 Codes Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">ICD-10 Codes</h5>
                                </div>
                                <div class="card-body">
                                    <!-- ICD-10 Codes Content -->
                                    @livewire('icd10-form')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="treatment-plan" role="tabpanel"
                            aria-labelledby="treatment-plan-tab">
                            <!-- Treatment Plan Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Treatment Plan</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Treatment Plan Content -->

@livewire('treatment-form')


                                </div>
                            </div>
                        </div>
                    </div>
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
