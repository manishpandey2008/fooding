<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BUserMiddleware
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
        if ($request->session()->get('role')!=='user') {
           return redirect()->route('b_index');
        }
        return $next($request);
    }
}
