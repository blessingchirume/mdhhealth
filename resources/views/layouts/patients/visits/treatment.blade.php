@extends('layouts.app')

@section('content_header')
    <h1>Administer Treatment</h1>
@stop

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-4">
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Treatments</h3>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3">Treatment Plan</th>
                                </tr>
                                <tr>
                                    <th style="width: 65%;">Treatment/Drug</th>
                                    <th style="width: 15%;">Dosage</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($treatments as $index => $value)
                                    <tr>
                                        <td>{{ $value['medication'] }}</td>
                                        <td>{{ $value['dosage'] }}</td>
                                        <td>{{ $value['frequency'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#administerTreatmentModal">
                            Administer Treatment
                        </button>
                        <table class="table table-bordered" id="administered">
                            <thead>
                                <tr>
                                    <th colspan="3">Administered Treatments</th>
                                </tr>
                                <tr>
                                    <th style="width: 65%;">Treatment/Drug</th>
                                    <th style="width: 15%;">Dosage</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="modal fade" id="administerTreatmentModal" tabindex="-1" role="dialog"
                            aria-labelledby="administerTreatmentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="administerTreatmentModalLabel">Administer Treatment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="treatmentForm" action="">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="treatment">Treatment/Drug</label>
                                                        <select type="text" class="form-control" id="treatment"
                                                            name="treatment" required>
                                                            @foreach ($treatments as $index => $value)
                                                                <option value="{{ $value['id'] }}">
                                                                    {{ $value['medication'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="dosage">Dosage</label>
                                                        <input type='text' class="form-control" id="dosage"
                                                            name="dosage" required>
                                                    </div>
                                                </div>
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
                </div>

            </div>
        </div>
    </div>
    <script>
        $('#treatmentForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route('administer-treatment', $episode->id) }}', // Replace with your server endpoint
                type: 'POST', // Or 'GET' if you're retrieving data
                data: formData,
                success: function(response) {
                    // Update the table with the administered ID
                    $('#administered tbody').append(`
            <tr>
                <td>${response.medication}</td>
                <td>${response.dosage}</td>
                <td>${response.frequency}</td>
            </tr>
        `);
                }
            });
        });
    </script>
@stop
