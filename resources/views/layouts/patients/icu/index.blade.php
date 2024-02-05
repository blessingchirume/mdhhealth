@extends('layouts.app')

@section('content')
    <div class="card">
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
                        <td>{{ $value->episode_code }}</td>
                        <td>{{ $value->patient->name }}</td>
                        <td>{{ $value->admission_date }}</td>
                        <td>{{ $value->discharge_date }}</td>
                        <td>{{ $value->status }}</td>
                        <td>
                            <a href="{{ route('episode.show', $value) }}"><i class="fa fa-eye success"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection