<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $timeout = config('session.lifetime') * 60;
            $lastActivity = session('last_activity');

            if ($lastActivity && (time() - $lastActivity > $timeout)) {
                Auth::logout();
                session()->flush();
                return redirect('/login')->withErrors(['message' => 'Sesi Anda telah habis. Silakan login kembali.']);
            }

            session(['last_activity' => time()]);
        }

        return $next($request);
    }
}
