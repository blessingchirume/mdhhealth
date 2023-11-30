@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Medical Partners') }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <section class="content">
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
                                        <th>Provider</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($collection as $index => $value)
                                    <tr>
                                        <td>{{ $index + 1}}</td>
                                        <td>{{ $value->code }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('medicalaid.show', $value)}}"><i class="fa fa-eye success"></i></a>
                                            <a href="{{ route('medicalaid.show', $value)}}"><i class="fa fa-edit primary"></i></a>
                                            <a href="{{ route('medicalaid.show', $value)}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                <h4 class="modal-title">Patient</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('medicalaid.store') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Provider Code</label>
                                <input class="form-control" name="code" type="text" placeholder="code" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="surname">Provider Name</label>
                                <input class="form-control" name="name" type="text" placeholder="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-secondary float-right mr-2">Update Details</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
