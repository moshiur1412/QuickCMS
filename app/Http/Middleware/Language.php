<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Language
{
   
    public function handle($request, Closure $next)
    {
        if (!Session::has('locale')) {
            Session::set('locale', 'en');
        }
        app()->setlocale(Session::get('locale'));
        return $next($request);
    }
}
