<?php

namespace App\Http\Middleware;

use Auth;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckIsDigital
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
        if (Auth::check() && Auth::user()->user_id == '82999419791736832')
        {
            return $next($request);
        }
        abort(401);
    }
}
