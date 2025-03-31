<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Closure;

class CheckUserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah cookie user_id ada
        if ($request->hasCookie('user_id')) {
            // Jika ada, lanjutkan ke request selanjutnya
            return $next($request);
        }

        // Jika tidak ada, redirect ke halaman login
        return redirect('/login')->with('error', 'Silakan login untuk melanjutkan.');
    }
}
