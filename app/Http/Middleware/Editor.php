<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Editor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2) {
            return $next($request);
        }else {
            return redirect('/permission');
        }
        return $next($request);
    }
}
