@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1200px;
            display: flex;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .login-logo {
            flex: 1;
            background: linear-gradient(135deg, #1A73E8, #61B0FF);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 60px;
            text-align: center;
        }

        .login-logo img {
            width: 300px; /* Logo diperbesar */
            height: auto;
        }

        .login-form {
            flex: 2;
            padding: 60px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h1 {
            font-size: 32px;
            font-weight: 600;
            color: #333;
        }

        .login-header p {
            font-size: 16px;
            color: #777;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #555;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 12px 18px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .form-control:focus {
            border-color: #1A73E8;
            box-shadow: 0 0 8px rgba(26, 115, 232, 0.3);
            outline: none;
        }

        .btn-primary {
            width: 100%;
            padding: 15px;
            background-color: #1A73E8;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: 600;
            border-radius: 10px;
            transition: background 0.3s ease;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #145DBF;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
        }

        .login-footer a {
            color: #1A73E8;
            text-decoration: none;
            font-weight: 500;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }

        .footer a {
            color: #1A73E8;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 992px) {
            .login-wrapper {
                flex-direction: column;
            }

            .login-logo {
                padding: 40px;
            }

            .login-form {
                padding: 40px;
            }
        }
    </style>

    <!-- Wrapper -->
    <div class="login-wrapper">
        <!-- Logo -->
        <div class="login-logo">
            <img src="{{ asset('images/logo-sinar-baru-motor-removebg-preview.png') }}" alt="Logo Bengkel">
        </div>

        <!-- Form -->
        <div class="login-form">
            <div class="login-header">
                <h1>Login Sistem</h1>
                <p>Selamat datang di Sistem Informasi Bengkel Motor</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" placeholder="Masukkan Email Anda" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" placeholder="Masukkan Password Anda" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn-primary">Login</button>
            </form>

            <!-- Register Link -->
            <div class="login-footer">
                @if (Route::has('register'))
                    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Bengkel Sinar Baru Motor. All Rights Reserved. | <a href="#">Kebijakan Privasi</a></p>
    </div>
</div>
@endsection