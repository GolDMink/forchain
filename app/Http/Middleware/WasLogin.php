<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class WasLogin
{
    public function handle($request, Closure $next)
    {
        if(Session::has('user_app')){
            return $next($request);
        }else{
            return redirect()->route('login');
        }

    }
}
