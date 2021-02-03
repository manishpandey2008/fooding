<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BAdminMiddleware
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
        if ($request->session()->get('role')!=='admin') {
           return redirect()->route('b_index');
        }
        return $next($request);
    }
}
