@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Styling untuk halaman login */
        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            background-color: #007bff;
            color: white;
            border-bottom: none;
        }

        .card-body {
            padding: 30px;
        }

        form .form-control {
            border-radius: 10px;
            box-shadow: none;
            transition: border-color 0.3s;
        }

        form .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            border-radius: 10px;
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-link {
            color: #007bff;
            text-decoration: underline;
            font-size: 14px;
        }

        .btn-link:hover {
            text-decoration: none;
        }

        .row {
            margin-bottom: 15px;
        }

        .login-banner {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-banner img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .login-banner h1 {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-banner">
                <img src="{{ asset('images/logo-sinar-baru-motor.jpg') }}" alt="Logo Bengkel">
                <h1>Login Sistem Informasi Bengkel</h1>
                <p>Silahkan Login</p>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">Daftar Akun</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
