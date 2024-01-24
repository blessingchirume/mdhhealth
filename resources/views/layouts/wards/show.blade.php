@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $ward->name }}</h1>
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
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Treament beds</a>
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
                                    <table id="table1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ward->beds as $index => $value)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td><span class="badge badge-danger">fully booked</span></td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>{{ $value->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('patient.episode.show', $value)}}"><i class="fa fa-eye success m-2"></i></a>
                                                    <a href="{{ route('patient.episode.show', $value)}}"><i class="fa fa-edit primary m-2"></i></a>
                                                    <a href="{{ route('patient.episode.show', $value)}}"><i class="fa fa-trash m-2"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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