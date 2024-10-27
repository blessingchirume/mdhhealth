@extends('layouts.app')

@section('content')
    <div class="card m-3 card-primary">
        <div class="card-header  d-print-none">
            <h4 class="">View Test Results for Episode <span class='text-warning'>[{{ $booking->episode->episode_code }}]</span><div class="float-right"><a href="{{ route('laboratory.bookings') }}" class="btn btn-primary ">Back</a></div></h4>
        </div>
        <div class="card-body ">
            <h4>Patient Information</h4>
            <div class="row">
                <div class="col-md-4">
                    <span><strong>Patient: </strong></span>{{ $booking->episode->patient->name.' '.$booking->episode->patient->surname }}
                </div>
                <div class="col-md-4">
                    <span><strong>Age: </strong></span>{{ $age }}
                </div>

                <div class="col-md-4">
                    <span><strong>Attendee: </strong></span>{{ $booking->episode->attendee }}
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
        <!-- add button to print only the class card-body -->
        <div class="card-footer d-print-none">
            <div class="float-right">
                <a href="javascript:window.print()" class="btn btn-primary">Print</a>
            </div>
        </div>
    </div>
@endsection
