<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // return $next($request);
       if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (in_array(Auth::user()->role, $roles)) {
            // Jika ya, lanjutkan permintaan
            return $next($request);
        }

        // Jika tidak memiliki peran yang sesuai, kembalikan respons yang sesuai (misalnya, akses ditolak)
        abort(403, 'Unauthorized');
    }
}
