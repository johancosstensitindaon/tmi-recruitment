<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        Log::info('Register: masuk ke controller');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
        DB::beginTransaction();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Log::info('User created:', ['id' => $user->id]);

        Kandidat::create([
            'user_id' => $user->id,
            'nama' => $user->name,
            'email' => $user->email,
        ]);
        Log::info('Kandidat created:', ['user_id' => $user->id]);

        event(new Registered($user));

        Auth::login($user);
        DB::commit();

        return redirect(RouteServiceProvider::HOME);
    } catch (\Throwable $e) {
        DB::rollBack();
        Log::error('Gagal register: ' . $e->getMessage());
        return back()->withErrors(['register' => 'Gagal membuat akun.']);
    }
    }
}
