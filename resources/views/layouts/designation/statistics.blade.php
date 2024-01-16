@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Dashboard') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-pump-soap"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Patients</span>
                        <span class="info-box-number">
                            {{ $analytics['patients'] }}
                        </span>
                    </div>

                </div>

            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-gas-pump"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Departments</span>
                        <span class="info-box-number">{{ $analytics['departments'] }}</span>
                    </div>

                </div>

            </div>


            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Partners</span>
                        <span class="info-box-number">{{ $analytics['partners'] }}</span>
                    </div>

                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">{{ $analytics['users'] }}</span>
                    </div>

                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Monthly Recap Report</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a href="#" class="dropdown-item">Action</a>
                                    <a href="#" class="dropdown-item">Another action</a>
                                    <a href="#" class="dropdown-item">Something else here</a>
                                    <a class="dropdown-divider"></a>
                                    <a href="#" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                    <h5 class="description-header">${{ $analytics['revenue'] }}</h5>
                                    <span class="description-text">TOTAL EPISODE REVENUE</span>
                                </div>

                            </div>

                            <div class="col-sm-4 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                    <h5 class="description-header">${{ $analytics['payments'] }}</h5>
                                    <span class="description-text">TOTAL PAYMENTS</span>
                                </div>

                            </div>

                            <div class="col-sm-4 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                    <h5 class="description-header">${{ $analytics['acruals'] }}</h5>
                                    <span class="description-text">TOTAL EPISODE ACRUALS</span>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<div class="modal fade" id="sync">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sync Transactions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="alert alert-warning"><strong>Warning</strong> You are about to push transactions to the main office, this action cannot be reversed</div>
                    </div>
                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary float-right">Proceed</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection