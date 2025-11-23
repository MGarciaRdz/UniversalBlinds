<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class roleMiddleware
{
    /**
     * Handle an incoming request.
     * Uso: ->middleware('role:administrador') o ->middleware('role:cliente')
     */
    public function handle(Request $request, Closure $next, $roles = null)
    {
        $user = auth()->user();

        if (! $user) {
            return redirect()->route('login.create');
        }

        if ($roles) {
            $allowed = array_map('trim', explode(',', $roles));
            $userRole = strtolower($user->rol ?? $user->role ?? '');

            $allowedLower = array_map('strtolower', $allowed);
            if (! in_array($userRole, $allowedLower, true)) {
                abort(403, 'Acceso denegado.');
            }
        }

        return $next($request);
    }
}
