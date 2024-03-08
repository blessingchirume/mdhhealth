@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card">
      <div class="card-header">
        <h3>Reset Password</h3>
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
          @csrf

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your email address" required autocomplete="email" autofocus>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New password" required autocomplete="new-password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm new password" required autocomplete="new-password">
          </div>

          <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary float-right">
              {{ __('Reset Password') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
