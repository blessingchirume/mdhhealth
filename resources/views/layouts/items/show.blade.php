@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $item->item_description }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <section class="content">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Price List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Update</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                            <div class="card">
                                
                                <div class="card-body">
                                    <table id="table1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Provider</th>
                                                <th>Package</th>
                                                <th>Price</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($item->packages as $index => $value)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $value->package->partner->name }}</td>
                                                <td>{{ $value->package->name }}</td>
                                                <td> <input class="form-control" name="price" type="number" placeholder="price" value="{{ $value->price }}" required />
                                                </td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>{{ $value->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('item.show', $value)}}"><i class="fa fa-eye success m-2"></i></a>
                                                    <a href="{{ route('item.show', $value)}}"><i class="fa fa-edit primary m-2"></i></a>
                                                    <a href="{{ route('item.show', $value)}}"><i class="fa fa-trash m-2"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="float-right btn-group btn-group-sm">
                                        <button data-toggle="modal" data-target="#pump-reading" type="button" class="btn btn-warning">
                                            <i class="fa fa-edit"></i> update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                            <div class="card">
                                <div class="card-body">
                                    <form id="update-partner-form" method="post" action="{{ route('medicalaid.update', $item) }}">
                                        {{ csrf_field() }}

                                    </form>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group pull-right">
                                        <button onclick="$('#update-partner-form').submit()" class="btn btn-secondary float-right mr-2">Update Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection