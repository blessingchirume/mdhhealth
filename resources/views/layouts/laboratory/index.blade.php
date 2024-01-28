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
                                @if($episode->labTests->isEmpty())
                                <a href="{{ route('test-booking', $episode->id) }}">Book Test</a>
                                @else
                                    @if($episode->labTests->where('status', 'pending')->isNotEmpty())
                                        <a href="{{ route('upload-results', $episode->id) }}">Upload Results</a>
                                    @else
                                        <a href="{{ route('view-results', $episode->id) }}">View Results</a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
