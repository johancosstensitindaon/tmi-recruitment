<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ]);

    // ✅ DEKLARASI VARIABELNYA DI SINI
    $credentials = $request->only('email', 'password');

    // 1. Coba login sebagai Admin
    if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }

    // 2. Coba login sebagai Kandidat
    if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        // Cek verifikasi email jika perlu
        if (!Auth::guard('web')->user()->hasVerifiedEmail()) {
            Auth::guard('web')->logout();

            throw ValidationException::withMessages([
                'email' => 'Akun Anda belum verifikasi email.',
            ]);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    // Jika gagal semua
    throw ValidationException::withMessages([
        'email' => __('auth.failed'),
    ]);

        // if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
        //     return back()->withErrors(['email' => 'Login gagal. Cek email atau password.']);
        // }

        // if (!Auth::user()->hasVerifiedEmail()) {
        //     Auth::logout();
        //     return redirect('/login')->withErrors(['email' => 'Silakan verifikasi email Anda terlebih dahulu.']);
        // }

        // $request->session()->regenerate();
        // return redirect()->intended('/profile');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect('/');

        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
