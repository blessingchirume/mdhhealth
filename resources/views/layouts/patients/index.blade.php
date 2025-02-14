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
                                @can(App\Constants\PermisionConstants::createPatient)
                                <a href="{{ route('patient.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Generate
                                </a>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table1" class="table  nowrap align-middle">
                                <thead>
                                    <tr>
                                        <th>patient ID</th>
                                        <th>ID Number</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>dob</th>
                                        <th>gender</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <center>
                                            <th>Action</th>
                                        </center>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($collection as $value)
                                    <tr>
                                        <td>{{ $value->patient_id }}</td>
                                        <td>{{ $value->national_id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->surname }}</td>
                                        <td>{{ $value->email}}</td>
                                        <td>{{ $value->dob }}</td>
                                        <td>{{ $value->gender }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>
                                            <center>
                                                @can(App\Constants\PermisionConstants::viewPatient)
                                                <a href="{{ route('patient.show', $value)}}"><i class="fa fa-eye success mr-4"></i></a>
                                                @endcan
                                                @can(App\Constants\PermisionConstants::updatePatient)
                                                <a href="{{ route('patient.edit', $value)}}"><i class="fa fa-edit success"></i></a>
                                                @endcan
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
