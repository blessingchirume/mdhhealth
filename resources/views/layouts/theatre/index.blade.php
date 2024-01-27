@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Theatre Module - Patient Episodes</h2>
        <a href="{{ route('send_to_theatre') }}" class="btn btn-primary pull-right">Add Patient to Theatre Queue</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Episode Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($theatre_admissions as $admission)
                    <tr>
                        <td>{{ $admission->patient ? $admission->patient->name : 'Unknown Patient' }}</td>
                        <td>{{ $admission->details }}</td>
                        <td>
                            <a href="/calculate-bill/{{ $admission->id }}" class="btn btn-primary">Calculate Bill</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
