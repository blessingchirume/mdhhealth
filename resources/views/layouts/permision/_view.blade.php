@extends('home')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">


                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card card-primary card-outline col-9">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit bold"></i>
                -- Role and Permisions
            </h3>
        </div>
        <div class="card-body">
            <h4>Left Sided</h4>
            <div class="row">
                <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        @foreach($roles as $role)
                        <a class="nav-link " id="{{$role->name}}-tab" data-toggle="pill" href="#{{$role->name}}" role="tab" aria-controls="{{$role->name}}" aria-selected="false">{{$role->name}}</a>

                        @endforeach

                    </div>
                </div>
                <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">

                        @foreach($roles as $role)
                        @foreach($role->getPermissionNames() as $permision)
                        <div class="tab-pane text-left fade" id="{{$role->name}}" role="tabpanel" aria-labelledby="{{$role->name}}-tab">
                            {{$permision}}
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- Update Password -->
<div class="modal fade" id="password-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Container Shipping</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info"><strong>Notice</strong> For stronger passwords please use generate random , this will send new password to the user</div>
                <form method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="text" class="form-control" name="new_password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="text" class="form-control" name="conf_password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/default-password-reset/" class="btn btn-default float-left">Generate Random</a>
                        <button type="submit" class="btn btn-primary float-right">Update Password</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="trip-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Trip Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info"><strong>Notice</strong> Once you have submitted the drawdown, you won`t be able to edit</div>
                <form method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" class="form-control" name="TripAmount">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-left">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="invoice">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Trip Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info"><strong>Notice</strong> Once you have submitted the invoice, you won`t be able to edit</div>
                <form method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" class="form-control" name="TripAmount">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-left">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Update Password -->
<div class="modal fade" id="draw-down">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Draw Down</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="alert alert-warning"><strong>Warning</strong> The results of this operation wont be revesed</div>

                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" class="form-control" name="DAmount">
                        </div>
                        <div class="form-group">
                            <label for="">Purpose</label>
                            <select name="DType" id="DType" class="form-control multiple" required>
                                <option value="Toll Fee">Toll Fee</option>
                                <option value="Fuel">Fuel</option>
                                <option value="Maintainance">Maintainance</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary float-right">Proceed</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="dropship">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Dropship</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="alert alert-warning"><strong>Warning</strong>You are about to confirm dropshipping this container!</div>
                        <div class="form-group">
                            <label for="">Location</label>
                            <input type="text" class="form-control" name="u_DropShipTo" placeholder="Location">
                        </div>
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