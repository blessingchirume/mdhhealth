<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agimedix Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F5F5F5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: #fff;
            /* border: 1px solid #ddd; */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
        }

        .login-card img {
            width: 300px;
            /* Increased size for better visibility */
            margin-bottom: 1.5rem;
        }

        .btn-custom {
            background-color: #2C3F82;
            color: white;
            width: 100%;
            border: none;
            /* Removed rounded corners */
            height: 45px;
            text-transform: uppercase;
        }

        .btn-custom:hover {
            background-color: #1A2F51;
            color: white;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            /* Removed rounded corners */
            height: 45px;
        }

        .text-link {
            color: #27477A;
            text-decoration: none;
        }

        .text-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <img src="{{ asset('images/AGI_HMS_logo_trans.png') }}" alt="Agimedix Logo">
        <div class="left">
            <h5 class="mb-4 text-start" style="color: #27477A;">Login</h5>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autofocus>
                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-custom btn-block">Login</button>
        </form>
        <div class="mt-3">
            @if (Route::has('password.request'))
            <p class="mb-1">
            <a href="{{ route('password.request') }}" class="text-link">Forgot Password?</a>

            </p>
        @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>