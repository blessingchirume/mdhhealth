@extends('layouts.app')

@section('content')
<div class="card m-3">
    <div class="card-header">
        <h3 class="card-title">Upload Test Results</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <span><strong>Patient: </strong></span>{{ $episode->patient->name.' '.$episode->patient->surname }}
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
<form method="post" action="{{ route('save-test-results', $episode) }}" id="lab-form">
    @csrf
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
                                <input type="text" id="{{ $test->slug }}" class="form-control" name="test_results[{{ $test->id }}][result]">
                            </div>
                            <div class="mb-2">
                                {{ $test->name }} Comment:
                                <input type="text" class="form-control" id="comment_{{ $test->slug }}" name="test_results[{{ $test->id }}][comment]">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary m-3">Add Results</button>
</form>
@endsection
