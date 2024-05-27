@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Pay Consultation') }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-hearder">

            </div>
            <div class="card-body">
                <livewire:consultation-form />
            </div>
        </div>
    </div>
</div>
@endsection