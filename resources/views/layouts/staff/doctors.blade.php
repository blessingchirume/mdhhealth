@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Doctors</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Branch</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                     <tr>
                        <td>{{ $doctor->name .' '. $doctor->surname }}</td>
                        <td>{{ $doctor->designations->name }}</td>
                        <td>{{ $doctor->branch->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endSection
