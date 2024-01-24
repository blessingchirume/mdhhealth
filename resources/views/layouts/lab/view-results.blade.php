@extends('layouts.app')

@section('content')
    <div class="card m-3 card-primary">
        <div class="card-header">
            <h3 class="card-title">View Test Results for Episode <span class='text-warning'>[{{ $episode->episode_code }}]</span></h3>
        </div>
        <div class="card-body ">
            <h4>Patient Information</h4>
            <div class="row">
                <div class="col-md-4">
                    <span><strong>Patient: </strong></span>{{ $episode->patient->name.' '.$episode->patient->surname }}
                </div>
                <div class="col-md-4">
                    <span><strong>Age: </strong></span>{{ $age }}
                </div>

                <div class="col-md-4">
                    <span><strong>Attendee: </strong></span>{{ $episode->attendee }}
                </div>
            </div><br/>
            <h4>Test Results</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Test Name</th>
                        <th>Result</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testResults as $testResult)
                        <tr>
                            <td>{{ $testResult->name }}</td>
                            <td>{{ $testResult->result }}</td>
                            <td>{{ $testResult->comment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
