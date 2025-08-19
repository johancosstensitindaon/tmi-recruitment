@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5 bg-white text-dark" style="width: 100%; max-width: 400px;">
        <h3 class="mb-4 text-center fw-bold">Daftar - PT Team Metal Indonesia</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required>
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-gold w-100">Daftar Sekarang</button>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-decoration-none text-secondary">Sudah punya akun? Login</a>
            </div>
        </form>
    </div>
</div>
@endsection
