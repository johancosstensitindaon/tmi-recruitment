<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    // public function update(Request $request): RedirectResponse
    // {
    //     $validated = $request->validateWithBag('updatePassword', [
    //         'current_password' => ['required', 'current_password'],
    //         'password' => ['required', Password::defaults(), 'confirmed'],
    //     ]);

    //     $request->user()->update([
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     return back()->with('status', 'password-updated');
    // }

    public function update(Request $request)
{
    $request->validate([
        'current_password' => ['required'],
        'new_password' => ['required', 'min:8', 'confirmed'],
    ]);

    try {
        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('password.edit')->with('status', 'Password berhasil diubah.');
    } catch (\Exception $e) {
        Log::error('Gagal mengubah password: '.$e->getMessage());
        return back()->withErrors(['general' => 'Terjadi kesalahan saat mengubah password. Silakan coba lagi.']);
    }
}


    public function edit()
    {
        return view('auth.change-password');
    }
}
