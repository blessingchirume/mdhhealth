@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nurses</h3>
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
                    @foreach ($nurses as $nurse)
                     <tr>
                        <td>{{ $nurse->name .' '. $nurse->surname }}</td>
                        <td>{{ $nurse->designations->name ?? '' }}</td>
                        <td>{{ $nurse->branch->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endSection
