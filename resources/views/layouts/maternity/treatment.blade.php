@extends('layouts.app')

@section('content_header')
    <h1>Administer Treatment</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">patient Information</h3>
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
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Treatments</h3>
                        <div class="float-right"><a href="{{ route('maternity.index') }}" class="btn btn-primary">Back</a></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="4">Treatment Plan / Prescription</th>
                                </tr>
                                <tr>
                                    <th style="width: 65%;">Treatment/Drug</th>
                                    <th style="width: 15%;">Dosage</th>
                                    <th>Frequency</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prescriptions as $prescription)
                                    @foreach ($prescription->prescription_items as $item)
                                     @if($item->has_start_dose)
                                        <tr>
                                            <td>{{ $item->item->item_description }}(Start Dose)</td>
                                            <td>{{ $item->start_dose }}</td>
                                            <td>Once</td>
                                            <td>Initial Dose</td>

                                        </tr>
                                        @endif
                                        <tr>
                                            <td>{{ $item->item->item_description }}</td>
                                            <td>{{ $item->dosage }}</td>
                                            <td>{{ $item->frequency }}</td>
                                            <td>{{ $item->duration }}</td>

                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#administerTreatmentModal">
                            Administer Treatment
                        </button>

                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#sundriesModal">
                            Record Sundries
                        </button>
                        <table class="table table-bordered" id="administered">
                            <thead>
                                <tr>
                                    <th colspan="3">Administered Treatments</th>
                                </tr>
                                <tr>
                                    <th style="width: 65%;">Treatment/Drug</th>
                                    <!--th style="width: 15%;">Dosage</th-->
                                    <th>Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($chargesheetItems as $administered)
                                    @if (isset($administered->item))
                                        <tr>
                                            <td>{{ $administered->item->item_description }}</td>
                                            <!--td>{{ $administered->dosage }}</td-->
                                            <td>{{ $administered->created_at }}</td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>

                        <div class="modal fade" id="administerTreatmentModal" tabindex="-1" role="dialog"
                            aria-labelledby="administerTreatmentModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="administerTreatmentModalLabel">Administered Treatment
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="treatmentForm"
                                            action="{{ route('administer-treatment', $episode->id) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="form-group">
                                                        <label for="treatment">Treatment/Drug</label>
                                                        <select type="text" class="form-control" id="treatment"
                                                            name="treatment" required>
                                                            @foreach ($prescriptions as $prescription)
                                                                @foreach ($prescription->prescription_items as $item)
                                                                @if($item->has_start_dose)
                                                                <option value="{{ $item->item_id }}">
                                                                        {{ $item->item->item_description }}(Start Dose)</option>
                                                                @endif
                                                                    <option value="{{ $item->item_id }}">
                                                                        {{ $item->item->item_description }}</option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2">
                                                    <div class="form-group">
                                                        <label for="dosage">Dosage</label>
                                                        <input type='text' class="form-control" id="dosage"
                                                            name="dosage" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2">
                                                <div class="form-group">
                                                        <label for="dosage">Adminstration</label>
                                                        <select class="form-control" id="type"
                                                            name="administration" required>
                                                            <option>Injection</option>
                                                            <option>Oral</option>
                                                            <option>Drip</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="dosage">Quantity</label>
                                                        <input type='text' class="form-control" id="quantity"
                                                            name="quantity" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="sundriesModal" tabindex="-1" role="dialog"
                            aria-labelledby="sundriesModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sundriesModalLabel">Record Sundries For This Episode
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="sundriesForm"
                                            action="{{ route('treatment-sundries', $episode->id) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="treatment">Sundries</label>
                                                        <select type="text" class="form-control" id="item"
                                                            name="item" required>
                                                            @foreach ($sundries as $sundry)
                                                            @foreach ($sundry->items as $item)
                                                               <option value="{{$item->id}}">{{$item->item_description}}</option>
                                                            @endforeach
                                                             @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="dosage">Quantity</label>
                                                        <input type='text' class="form-control" id="quantity"
                                                            name="quantity" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Upload</button>
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

@stop

