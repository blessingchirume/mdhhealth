@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $patient->name }} {{ $patient->surname }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <section class="content">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Episodes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-home-tab" data-toggle="pill" href="#patient-details-acruals" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Acruals</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-right btn-group btn-group-sm">
                                    <a href="{{ route('episode.create', $patient) }}" type="button" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Generate
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Episode Code</th>
                                                <th>Episode Number</th>
                                                <th>Patient Type</th>
                                                <th>Date</th>
                                                <th>Attending Dr</th>
                                                <th>Ward</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($patient->episodes as $value)
                                            <tr>
                                                <td>{{ $value->episode_code }}</td>
                                                <td>{{ $value->episode_entry }}</td>
                                                <td>{{ $value->patient_type }}</td>
                                                <td>{{ $value->date }}</td>
                                                <td>{{ $value->attendee }}</td>
                                                <td>{{ $value->ward }}</td>
                                                <td>
                                                    <a href="{{ route('patient.episode.show', $value)}}"><i class="fa fa-eye success m-2"></i></a>
                                                    <a href="{{ route('patient.episode.show', $value)}}"><i class="fa fa-edit primary m-2"></i></a>
                                                    <a href="{{ route('doctors.observation', $value)}}"><i class="fa fa-clipboard m-2"></i></a>
                                                    <a href="{{ route('patient.episode.show', $value)}}"><i class="fa fa-trash m-2"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="patient-details-acruals" role="tabpanel" aria-labelledby="patient-details-acruals-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-right btn-group btn-group-sm">
                                        <a href="{{ route('episode.create', $patient) }}" type="button" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Generate
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Episode Code</th>
                                                <th>Base Amount</th>
                                                <th>Amount Due</th>
                                                <th>Days Overdue</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($patient->acruals as $value)
                                            <tr>
                                                <td>{{ $value->episode_code }}</td>
                                                <td>{{ number_format($value->base_amount, 2) }}</td>
                                                <td>{{ number_format($value->amount_due, 2) }}</td>
                                                <td>{{ now()->diffInDays(Carbon::parse($value->date)) }}</td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('patient.episode.show', $value)}}"><i class="fa fa-eye success m-2"></i></a>
                                                    <a href="{{ route('patient.episode.show', $value)}}"><i class="fa fa-edit primary m-2"></i></a>
                                                    <a href="{{ route('patient.episode.show', $value)}}"><i class="fa fa-trash m-2"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="modal lg fade" id="pump-reading">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Episode number</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="episode_form" method="post" action="{{ route('patient.episode.store', $patient) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Designation</label>
                                <select name="ward" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    @foreach($designations as $index => $designation)
                                    <option value="{{ $designation->id }}" selected="selected">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Attendee</label>
                                <select name="attendee" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="Blessing Chirume" selected="selected">Blessing Chirume</option>
                                    <option value="Evelyn Jeke" selected="selected">Evelyn Jeke</option>
                                    <option value="Tendai Chidawanyika" selected="selected">Tendai Chidawanyika</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Patient Group</label>
                                <select name="patient_type" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="InPatient" selected="selected">In Patient</option>
                                    <option value="OutPatient" selected="selected">Out Patient</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Payment Method</label>
                                <select name="" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="Cash" selected="selected">Cash</option>
                                    <option value="Medical_aid">Medica Aid</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="form-group pull-right">
                    <button onclick="$('#episode_form').submit()" class="btn btn-secondary float-right mr-2">Update Details</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection