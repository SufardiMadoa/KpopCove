<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @param  string  $role
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next, $role)
  {
    // Check if user is authenticated
    if (!Auth::check()) {
      return redirect('login');
    }

    // Check if user has the required role
    if (Auth::user()->role_222305 !== $role) {
      return redirect()->route('userHome.home')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }

    return $next($request);
  }
}
