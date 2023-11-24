@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Patients') }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right btn-group btn-group-sm">
                                <a href="{{ route('patient.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Generate
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th>ID Number</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>dob</th>
                                        <th>gender</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <center><th>Action</th></center>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($collection as $value)
                                    <tr>
                                        <td>{{ $value->patient_id }}</td>
                                        <td>{{ $value->national_id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->surname }}</td>
                                        <td>{{ $value->dob }}</td>
                                        <td>{{ $value->gender }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>
                                            <center> 
                                                <a href="{{ route('patient.show', $value)}}"><i class="fa fa-eye success"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection