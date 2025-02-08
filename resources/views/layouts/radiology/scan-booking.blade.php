@extends('layouts.app')

@section('content')
<div class="card m-3">
    <div class="card-header">
        <h4 class="">Book Scan<div class="float-right"><a href="{{ route('radiology.index') }}" class="btn btn-primary ">Back</a></div></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <span><strong>patient: </strong></span>{{ $episode->patient->name.' '.$episode->patient->surname }}
            </div>
            <div class="col-md-1">
                <span><strong>Age: </strong></span>{{ $age }}
            </div>
            <div class="col-md-3">
                <span><strong>Episode Code: </strong></span>{{ $episode->episode_code }}
            </div>
            <div class="col-md-3">
                <span><strong>Attendee: </strong></span>{{ $episode->attendee }}
            </div>
            <div class="col-md-1">
                <span><strong>Ward: </strong></span>{{ $episode->ward }}
            </div>

        </div>
    </div>
</div>
<form method="post" action="{{ route('scan-booking.store', $episode) }}" id="lab-form">
    @csrf
    <div class="card card-primary m-3">
        <div class="card-header">
            <h3 class="card-title">Select Tests</h3>
        </div>
        <div class="card-body">

                <div class="card">

                    <div class="card-body">
                            <div class="row">
                                @foreach ($categories as $test)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $test->name }}"
                                                    name="tests[]" value="{{ $test->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $test->name }}">{{ $test->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- Add this line to close the inner foreach loop -->
                    </div>
                </div><!-- Add this line to close the outer foreach loop -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </div>
    </div>
</form>
@endsection
