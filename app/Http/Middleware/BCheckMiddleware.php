<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BCheckMiddleware
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
        if ($request->session()->get('id')===null) {
           return redirect()->route('b_login');
        }
        return $next($request);
    }
}
