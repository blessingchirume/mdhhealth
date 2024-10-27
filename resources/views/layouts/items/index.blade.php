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
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right btn-group btn-group-sm">
                                <button type="button" data-toggle="modal" data-target="#generate-price-list-modal"
                                    class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Generate
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">

                            <table id="table1" class="table data-table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Code</th>
                                        <th>Item Description</th>
                                        <th>Type</th>
                                        <th>SI Unit</th>
                                        <th>Price Unit</th>
                                        <th>Base Price</th>
                                        <th>Tariff Code</th>
                                        <th>
                                            <center>
                                                Action
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collection as $index => $value)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $value->item_code }}</td>
                                            <td>{{ $value->item_description }}</td>
                                            <td>{{ $value->group->name }}</td>
                                            <td>{{ $value->si_unit }}</td>
                                            <td>{{ $value->price_unit }}</td>
                                            <td>{{ $value->base_price }}</td>
                                            <td>{{ $value->tariff_code }}</td>
                                            <td>
                                                <center>
                                                    <a href="{{ route('item.show', $value) }}"><i
                                                            class="fa fa-eye success mr-4"></i></a>
                                                    <a href="#"><i class="fa fa-edit success"></i></a>
                                                </center>
                                            </td>
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

    <div class="modal fade" id="generate-price-list-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create-item-form" method="post" action="{{ route('item.create-price-list', 1) }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item-group">Category</label>
                                    <select name="item_group_id" class="form-control">
                                        @foreach ($itemgroups as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Item Code</label>
                                    <input type="text" name="item_code" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="item_description">Description</label>
                            <input type="text" name="item_description" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="si-unit">SI Unit</label>
                            <input type="text" name="si_unit" class="form-control" />
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price-unit">Price/Unit</label>
                                    <input type="text" name="price_unit" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="base-price">Base Price</label>
                                    <input type="text" name="base_price" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tariff-code">Tariff Code</label>
                                    <input type="text" name="tariff_code" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="form-group pull-right">
                        <button onclick="$('#create-item-form').submit()" class="btn btn-secondary float-right mr-2">Update
                            Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
