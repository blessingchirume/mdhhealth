@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $partner->name }}</h1>
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
                                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Packages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Update</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="float-right btn-group btn-group-sm">
                                            <button data-toggle="modal" data-target="#pump-reading" type="button" class="btn btn-primary">
                                                <i class="fa fa-plus"></i> Generate
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="table1" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Package</th>
                                                <th>Provider</th>
                                                <th>Members</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($partner->packages as $index => $value)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->partner->name }}</td>
                                                    <td>{{ $value->entries->count() }}</td>
                                                    <td>{{ $value->created_at }}</td>
                                                    <td>{{ $value->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ route('patient.show', $value)}}"><i class="fa fa-eye success m-2"></i></a>
                                                        <a href="{{ route('patient.show', $value)}}"><i class="fa fa-edit primary m-2"></i></a>
                                                        <a href="{{ route('patient.show', $value)}}"><i class="fa fa-trash m-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="update-partner-form" method="post" action="{{ route('medicalaid.update', $partner) }}">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="code">Code</label>
                                                        <input class="form-control" name="code" type="text" placeholder="code" value="{{ $partner->code }}" required readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="acronym">Provider Acronym</label>
                                                        <input class="form-control" name="acronym" type="text" placeholder="acronym" value="{{ $partner->acronym }}" required/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">Provider Name</label>
                                                        <input class="form-control" name="name" type="text" placeholder="name" value="{{ $partner->name }}" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <div class="form-group pull-right">
                                            <button onclick="$('#update-partner-form').submit()" class="btn btn-secondary float-right mr-2">Update Details</button>
                                        </div>
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
                    <h4 class="modal-title">Package Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create-package-form" method="post" action="{{ route('medicalaid.associate-package', $partner) }}">
                        {{ csrf_field() }}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Package Name</label>
                                    <input class="form-control" name="code" type="text" placeholder="code" required>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="form-group pull-right">
                        <button onclick="$('#create-package-form').submit()" class="btn btn-secondary float-right mr-2">Update Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
