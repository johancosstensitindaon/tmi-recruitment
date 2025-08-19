@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5 bg-white text-dark" style="width: 100%; max-width: 400px;">
        <h3 class="mb-4 text-center fw-bold">Login - PT Team Metal Indonesia</h3>

        @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-gold w-100">Login</button>

            <div class="text-center mt-3">
                <a href="{{ route('register') }}" class="text-decoration-none text-secondary">Belum punya akun?
                    Daftar</a>
            </div>
        </form>
    </div>
</div>
@endsection
