@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Departments') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right btn-group btn-group-sm">
                            <button data-toggle="modal" data-target="#add-payment-modal" type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Generate
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table id="table1" class="table data-table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Users</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($collection as $index => $value)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $value->name}}</td>
                                    <td>{{ $value->code }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->users->count() }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('designation.ward.index', $value->id) }}">
                                            <i class="fas fa-bed"></i>
                                        </a>

                                        <a href="{{ route('designation.edit', $value->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer clearfix">
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<div class="modal lg fade" id="add-payment-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Episode number</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="designation_form" method="post" action="{{ route('designation.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Designation</label>
                                <input class="form-control" name="name" type="text" placeholder="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <div class="form-group pull-right">
                    <button class="btn btn-secondary float-right mr-2">Update Details</button>
                </div>
            </div></form>
        </div>
    </div>
</div>
@endsection
