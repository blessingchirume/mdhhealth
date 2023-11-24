@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Pumps') }}</h1>
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

                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right btn-group btn-group-sm">
                                <button data-toggle="modal" data-target="#pump" type="button" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Generate
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Pump Code</th>
                                        <th>Nossle</th>
                                        <th>Tank</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>EXPP0001</td>
                                        <td>Desiel</td>
                                        <td>EXPT0001</td>
                                        <td> <a href="/pump-reading" type="button" class='btn btn-secondary btn-sm'>
                                                <i class="fas fa-edit"></i> view
                                            </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<div class="modal lg fade" id="pump">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pump Reading</h4>
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
                                <label for="name">Pump Name</label>
                                <input class="form-control" name="purchase" type="text" placeholder="Pump Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Tank</label>
                                <select name="tank" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="" selected="selected">EXPT0001</option>
                                    <option value="" >EXPT0002</option>
                                    <option value="" >EXPT0003</option>
                                </select>
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

@endsection