@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>ICU Patients List<a href="{{ 'home'}}" class="btn btn-primary float-right"><i class="fa fa-home"></i></a></h2>

        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Episode Code</th>
                        <th>Patient</th>
                        <th>Admission Date</th>
                        <th>Discharge Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admissions as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->admission->episode->episode_code ?? null }}</td>
                        <td>{{ $value->admission->name ?? null}}</td>
                        <td>{{ $value->episode->chargesheet->checkin??null }}</td>
                        <td>{{ $value->episode->chargesheet->checkout??null }}</td>
                        <td>{{ $value->status ?? null}}</td>
                        <td>
                            <a href="{{ route('icu.show', $value->id) }}"><i class="fa fa-eye success"></i></a>
                            <a href="#" ><i class="fa fa-exchange" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection
