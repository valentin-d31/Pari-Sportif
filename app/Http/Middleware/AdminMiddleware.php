<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin = Auth::user()->admin;
        if ($admin != 0)
            return $next($request);
        else
            return redirect()->route('match.index')->with("echec", "Vous n'êtes pas un administrateur");
    }
}
