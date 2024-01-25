@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h1>Patient Details</h1>
            <p>Name: {{ $episode->patient->name }}</p>
            <p>Date of Birth: {{ $episode->patient->date_of_birth }}</p>
            <p>Gender: {{ $episode->patient->gender }}</p>

            <p><strong>View Vitals for Episode</strong> <span class="text-info">{{ $episode->episode_code }}</span></p>

            <table class="table table-borderless">
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                </tr>
                @foreach ($vitals as $vital)
                    <tr>
                        <td>{{ $vital->name }}</td>
                        <td>{{ $vital->value }}</td>
                    </tr>
                @endforeach
            </table>
<br/>
            <p><strong>Date vitals taken: </strong><i>{{ $episode->created_at->format('l, F j, Y') }}</i></p>
        </div>
    </div>
@endsection
