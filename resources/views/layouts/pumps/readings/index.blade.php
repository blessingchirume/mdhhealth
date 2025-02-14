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
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Readings</a>
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
                                    <table id="table1" class="table  nowrap align-middle">
                                        <thead>
                                            <tr>
                                                <th>Reading Number</th>
                                                <th>tank</th>
                                                <th>Date</th>
                                                <th>User</th>
                                                <th>Purchase</th>
                                                <th>Opening Balance</th>
                                                <th>Closing Balance</th>
                                                <th>Expected Sale</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>EXPT/202301000143</td>
                                                <td>EXPT0001</td>
                                                <td>2023-01-28</td>
                                                <td>Blessing Chirume</td>
                                                <td>2500.68</td>
                                                <td>250.55</td>
                                                <td>203.22</td>
                                                <td>202378.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Product</label>
                                                    <select name="tank" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                                        <option value="" selected="selected">Unleaded Petrol</option>
                                                        <option value="" selected="selected">Disiel 50</option>
                                                        <option value="" selected="selected">EXPT0003</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Pump Name</label>
                                                    <input class="form-control" name="purchase" type="text" placeholder="Pump Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Tank</label>
                                                    <select name="tank" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                                        <option value="" selected="selected">EXPT0001</option>
                                                        <option value="">EXPT0002</option>
                                                        <option value="">EXPT0003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<div class="modal lg fade" id="pump-reading">
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Reading number</label>
                                <input class="form-control" name="reading_number" type="text" placeholder="Reading Number" value="EXPT/202301000143" readonly required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Tank</label>
                                <select name="tank" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="" selected="selected">EXPT0001</option>
                                    <option value="" selected="selected">EXPT0002</option>
                                    <option value="" selected="selected">EXPT0003</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Purchase</label>
                                <input class="form-control" name="purchase" type="text" placeholder="Purchase" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Opening Balance</label>
                                <input class="form-control" name="opening_balance" type="text" placeholder="opening balance" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Closing Balance</label>
                                <input class="form-control" name="closing_balance" type="text" placeholder="closing balance" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Expected Bales</label>
                                <input class="form-control" name="sales" type="text" placeholder="Expected Sales" readonly required>
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