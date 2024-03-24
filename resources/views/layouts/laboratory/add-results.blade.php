@extends('layouts.app')

@section('content')
<div class="card m-3">
    <div class="card-header">
        <h3 class="">Upload Test Results<div class="float-right"><a href="{{ route('laboratory.bookings') }}" class="btn btn-primary ">Back</a></div></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <span><strong>Patient: </strong></span>{{ $booking->episode->patient->name.' '.$booking->episode->patient->surname }}
            </div>
            <div class="col-md-1">
                <span><strong>Age: </strong></span>{{ $age }}
            </div>
            <div class="col-md-3">
                <span><strong>Episode Code: </strong></span>{{ $booking->episode->episode_code }}
            </div>
            <div class="col-md-3">
                <span><strong>Attendee: </strong></span>{{ $booking->episode->attendee }}
            </div>
            <div class="col-md-1">
                <span><strong>Ward: </strong></span>{{ $booking->episode->ward }}
            </div>

        </div>
    </div>
</div>
<form method="post" action="{{ route('save-test-results', $booking) }}" id="lab-form">
    @csrf
    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
    @foreach ($bookedTests as $category)
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">{{ $category->category }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($category->tests as $test)
                        <div class="col-md-4  border-right">
                            <div class="mb-2">
                                {{ $test->name }} Result:
                                <input type="text" id="{{ $test->slug }}" class="form-control" name="test_results[{{ $test->id }}][result]" value="{{ $test->result }}">
                            </div>
                            <div class="mb-2">
                                {{ $test->name }} Comment:
                                <input type="text" class="form-control" id="comment_{{ $test->slug }}" name="test_results[{{ $test->id }}][comment]" value="{{ $test->comment }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    @if ($booking->status ==='Pending')
     <button type="submit" class="btn btn-primary m-3">Upload Results</button>
     @elseif ($booking->status ==='In-Progress')
     <button type="submit" class="btn btn-primary m-3">Update Results</button>
     <button type="button" class="btn btn-success" onclick="location.href='{{ route('laboratory.conclude-test', $booking) }}'">Conclude Test Booking</button>
    @endif


</form>
@endsection
