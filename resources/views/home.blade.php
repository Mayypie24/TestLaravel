<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selamat Datang di Beranda</div>

                <div class="card-body">
                    <div class="row">
                        <!-- Pilihan Kelola Barang -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Kelola Barang</h5>
                                    <a href="{{ route('barang.index') }}" class="btn btn-primary">Masuk</a>
                                </div>
                            </div>
                        </div>

                        <!-- Pilihan Kelola Layanan -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Kelola Layanan</h5>
                                    <a href="{{ route('layanan.index') }}" class="btn btn-primary">Masuk</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
