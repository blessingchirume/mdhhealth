@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('lab.store') }}" id="lab-form">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Select your desired tests</h3>
        </div>
        <div class="card-body">
            @foreach ($categories as $category)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $category->name }}</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($category->tests->chunk(4) as $testChunk)
                            <div class="row">
                                @foreach ($testChunk as $test)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $test->slug }}"
                                                    name="tests[]" value="{{ $test->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $test->slug }}">{{ $test->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach <!-- Add this line to close the inner foreach loop -->
                    </div>
                </div>
            @endforeach <!-- Add this line to close the outer foreach loop -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </div>
    </div>
</form>
@endsection