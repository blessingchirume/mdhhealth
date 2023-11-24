@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Tanks') }}</h1>
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
                            <button data-toggle="modal" data-target="#new-tank" type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Generate
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <table id="table1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tanks as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>Diesel 50</td>
                                    <td> <a href="{{ route('tank.show', $value->id) }}" type="button" class='btn btn-secondary btn-sm'>
                                            <i class="fas fa-edit"></i> view
                                        </a></td>
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

<div class="modal lg fade" id="new-tank">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Tank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Product</label>
                                <select name="tank" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="" selected="selected">Unleaded Petrol</option>
                                    <option value="" selected="selected">Disiel 50</option>
                                    <option value="" selected="selected">EXPT0003</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Tank Name</label>
                                <input class="form-control" name="purchase" type="text" placeholder="Tank Name" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-secondary float-right mr-2">Update Details</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- /.content -->
@endsection