@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Module coming soon') }}</h1>
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
                    Module coming soon
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<div class="modal lg fade" id="reciept">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Reciept</h4>
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
                                <label for="name">Provider</label>
                                <select name="tank" class="form-control form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="" selected="selected">Strauss Logistics</option>
                                    <option value="" selected="selected">Mega Market</option>
                                </select>
                            </div>


                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Item</label>
                                <select name="tank" class="form-control form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="" selected="selected">Unleaded Petrol</option>
                                    <option value="" selected="selected">Disiel 50</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Quantity</label>
                                <input class="form-control" name="purchase" type="text" placeholder="Quantity" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Transaction Date</label>
                                <input class="form-control" name="opening_balance" type="date" placeholder="date" required>
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