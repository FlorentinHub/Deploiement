<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isAdmin) {
            return $next($request);
        }
        return redirect('/')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page en tant qu\'administrateur.');

    }
}

