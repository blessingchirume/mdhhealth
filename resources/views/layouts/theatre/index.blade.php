@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card m-3">
            <div class="card-header">
                <h2 class="card-title">Theatre patient Bookings</h2>
                <a href="{{ route('send_to_theatre') }}" class="btn btn-primary float-right">Add patient to Theatre Queue</a>
            </div>
            <div class="card-body">
                <table class="table  nowrap align-middle">
                    <thead>
                        <tr>
                            <th>patient Name</th>
                            <th>Episode</th>
                            <th>Room</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admissions as $admission)
                        @foreach($admission->theatreAdmissions as $theatreAdmission)
                            <tr>
                                <td>{{ $admission->patient->name ?? 'Unknown patient' }}</td>
                                <td>{{ $admission->episode_code ?? 'No Details' }}</td>
                                <td>{{ $theatreAdmission->theatreRoom->room ?? 'No Details' }}</td>
                                <td>{{ $theatreAdmission->status ?? 'No Details' }}</td>
                                <td>{{ $theatreAdmission->date ?? 'No Details' }}</td>
                                <td>{{ $theatreAdmission->time_in ?? 'No Details' }}</td>
                                <td>
                                    @if($theatreAdmission->status == 'Pending')
                                        <a href="{{route('surgery_start', $theatreAdmission->id) }}" class="btn btn-primary">Send to Theatre</a>
                                    @elseif($theatreAdmission->status == 'In-surgery')
                                            <a href="{{route('surgery_end', $theatreAdmission->id) }}" class="btn btn-danger">End Surgery</a>

                                            <!-- <livewire:surgery-duration-tracker :admissionId="$theatreAdmission->id" /-->
                                    @elseif($theatreAdmission->status == 'Completed')
                                        <a href="/theatre-billables/{{ $admission->id }}" class="btn btn-primary">Update Bill</a>
                                    @else
                                        Status Unknown
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
