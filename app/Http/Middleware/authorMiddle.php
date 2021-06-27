<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\post;
class authorMiddle
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
        $post = post::withTrashed()->find($request->id);
        if(!Auth::check()){
            return redirect('/login');
        }else{
            foreach(Auth::user()->roles as $role){
                if($role->role_name == "Admin" || $role->role_name == "Manager" || $post->user_id == Auth::user()->id ){
                    return $next($request);
                }
            }
            return redirect(url('/login'));
        }
    }
}
