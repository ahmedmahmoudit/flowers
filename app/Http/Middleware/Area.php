<?php

namespace App\Http\Middleware;

use Closure;

class Area
{
    public function handle($request, Closure $next)
    {
        if (!cache()->has('selectedArea') || !cache()->get('selectedArea')) {
            return redirect()->route('area.select');
//            app()->setLocale(session()->get('locale'));
        }
        return $next($request);
    }
}