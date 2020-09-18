<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;


class LangWare
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
        if( Session::get('locale')){

            App::setLocale(Session::get('locale'));

        }
        else{
            App::setLocale(Config::get('app.fallback_locale'));
        }
        return $next($request);
    }
}
