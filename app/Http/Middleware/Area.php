<?php

namespace App\Http\Middleware;

use Closure;

class Area
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('selectedArea') || !session()->get('selectedArea')) {
            return redirect()->route('area.select');
        }
        return $next($request);
    }
}