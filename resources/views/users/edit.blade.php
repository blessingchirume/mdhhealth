@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit User') }}</h1>
                </div></div></div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                                </div>

                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', $user->surname) }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update User</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
