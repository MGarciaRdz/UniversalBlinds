<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class roleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login.create') ->with('error', 'Por favor, inicia sesión para acceder a esta página.');
        }

        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acceso denegado.');
        }
        return $next($request);
    }
}
