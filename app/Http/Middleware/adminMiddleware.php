<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class adminMiddleware
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
        if(!Auth::check()){
            return redirect('/login');
        }else{
            foreach(Auth::user()->roles as $role){ 

                if( $role->role_name != Null ){
                    return $next($request);
                }
                
            }
            return redirect('/');
        }
    }
}
