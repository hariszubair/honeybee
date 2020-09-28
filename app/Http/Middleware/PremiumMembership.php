<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PremiumMembership
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
       $user=Auth::user();
use Illuminate\Support\Facades\Auth;
        if($user->userinfo->membership == 2)
        {
            return $next($request);
        }
           return redirect('/home');
    }
}
