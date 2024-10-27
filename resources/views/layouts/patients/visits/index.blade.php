@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h1>Patients List</h1>
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th>EpisodeCode</th>
                        <th>Patient Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($episodes as $episode)
                        <tr>
                            <td>{{ $episode->episode_code }}</td>
                            <td>{{ $episode->patient->name.' '.$episode->patient->surname }}</td>
                            <td>
                                @if($episode->vitals->isEmpty())
                                <a href="{{ route('patient.vitals.create', $episode->id) }}">Record Vitals</a>
                                @else
                                    <a href="{{ route('patient.vitals.show', $episode->id) }}">View Vitals</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
