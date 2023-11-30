@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Items') }}</h1>
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

                <div class="alert alert-info">
                    Sample table page
                </div>

                <div class="card">
                    <div class="card-body p-0">

                        <table id="table1" class="table data-table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Code</th>
                                    <th>Item Description</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($collection as $index => $value)
                                <tr>
                                    <td>{{ $index  + 1 }}</td>
                                    <td>{{ $value->item_code }}</td>
                                    <td>{{ $value->item_description }}</td>
                                    <td>{{ $value->item_group }}</td>
                                    <td>actions[view, edit, delete]</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection