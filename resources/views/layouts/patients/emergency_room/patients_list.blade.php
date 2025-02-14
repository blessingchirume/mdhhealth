@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h2>Patients in Emergency Room</h2>
            <table class="table  nowrap align-middle">
                <tr>
                    <th>Patients Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>AdmittedOn</th>
                    <th>Action</th>
                </tr>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->created_at->format('d-m-Y @ H:i') }}</td>
                        <td>
                            <a href="#"><i class="fa fa-eye"></i></a>&emsp;
                            <a href="#"><i class="fa fa-edit"></i></a>&emsp;
                            <a href="#" class="text-success"><i class="fa fa-check"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
