<?php

namespace App\Http\Middleware;

use Closure;

class StoreAdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->isStoreAdmin() || $request->user()->isManager()) {

            return $next($request);

        }

        return abort(404,'not allowed zone');
    }
}
