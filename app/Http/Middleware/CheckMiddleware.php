<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMiddleware
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
        if ($request->session()->get('id_of_user')===null) {
           return redirect()->route('login');
        }
        return $next($request);
    }
}
