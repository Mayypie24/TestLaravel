@extends('layouts.app')

@section('title', 'Daftar Akun - Bengkel Sinar Baru Motor')
@section('content')
<div class="container mt-5">
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 24px;
            border-bottom: none;
        }

        .card-body {
            padding: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: none;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .input-group-text {
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-center a {
            color: #007bff;
            text-decoration: underline;
        }

        .text-center a:hover {
            text-decoration: none;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Daftar Akun
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <!-- Bagian Password dengan Ikon Mata -->
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword('password', this)">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian Konfirmasi Password dengan Ikon Mata -->
                        <div class="form-group mt-3">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword('password_confirmation', this)">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-4">Daftar</button>
                    </form>

                    <div class="text-center mt-3">
                        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Toggle Password -->
<script>
    function togglePassword(inputId, element) {
        const inputField = document.getElementById(inputId);
        const icon = element.querySelector('i');
        if (inputField.type === 'password') {
            inputField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            inputField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection
