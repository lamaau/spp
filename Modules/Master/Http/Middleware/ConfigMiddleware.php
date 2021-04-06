<?php

namespace Modules\Master\Http\Middleware\Tenant;

use Closure;
use Illuminate\Http\Request;

class ConfigMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $tenant = $request->tenant();
        config()->set('app.name', $tenant->name);
        return $next($request);
    }
}
