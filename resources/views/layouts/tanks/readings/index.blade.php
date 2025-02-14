@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('tank Reading') }}</h1>
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

                        <table id="table1" class="table nowrap align-middle">
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
@endsection
