<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestRedirectMiddleware
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Si l'utilisateur est authentifié, on le redirige vers la page d'accueil.
            return redirect('/accueil');
        }

        return $next($request);
    }
}
