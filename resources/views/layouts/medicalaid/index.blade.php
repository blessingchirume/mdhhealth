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
                        <div class="card-body p-3">
                            <table id="table1" class="datatable table no-wrap align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Provider</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th><center>Action</center></th>
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
                                        <center>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-cog fa-lg m-2 align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{ route('medicalaid.show', $value)}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                    <li><a href="{{ route('medicalaid.show', $value)}}" class="dropdown-item edit-item-btn text-primary"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    <li>
                                                        <a href="" class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </center>
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
                <h4 class="modal-title">patient</h4>
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="acronym">Provider Acrony</label>
                                <input class="form-control" name="acronym" type="text" placeholder="acronym" required>
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
