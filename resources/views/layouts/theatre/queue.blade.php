@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Theatre Admissions</h2>
        <div class="card m-3">
            <div class="card-header">
                <h3 class="card-title">Send Patient to Theatre </h3>
            </div>
            <div class="card-body">
                <form method='post' action="{{ route('send-to-theatre') }}">
                    @csrf
                    <livewire:send-to-theatre />               
                </form>
            </div>
        </div>
    </div>
    @endsection
