<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AcceptUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
            $user = auth()->user();
            
            if ($user && !$user->active_status) {
                return redirect('accept');
            }
            
            return $next($request);
            }
}
