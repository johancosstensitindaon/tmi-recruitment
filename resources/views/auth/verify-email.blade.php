{{-- resources/views/auth/verify-email.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-10">
    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Verifikasi Email Anda</h2>
        <p class="text-gray-600 mb-6">
            Terima kasih telah mendaftar! Sebelum melanjutkan, mohon verifikasi email Anda dengan mengklik tautan
            yang telah kami kirim ke email Anda. Jika Anda belum menerima email, kami bisa kirim ulang.
        </p>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-green-600">
            Link verifikasi baru telah dikirim ke alamat email Anda.
        </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="text-gray-500 hover:text-red-500 text-sm underline">
                Keluar
            </button>
        </form>
    </div>
</div>
@endsection
