<?php

namespace Modules\Master\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Master\Tenant\Manager;
use Modules\Master\Entities\Tenant;

class TenantMiddleware
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
        if (!auth()->user()->tenants->contains('id', $request->user()->tenant_id)) {
            return redirect()->route('dashboard');
        }

        app(Manager::class)->setTenant($request->user()->tenant_id);
        session()->put('tenant', $request->user()->tenant_id);

        return $next($request);
    }

    /**
     * Resolve tenant
     *
     * @param string $id
     * @return object
     */
    protected function resolveTenant($id): ?object
    {
        return Tenant::where('id', $id)->first();
    }

    /**
     * Register tenant
     *
     * @param object $tenant
     * @return void
     */
    protected function registerTenant(object $tenant): void
    {
        app(Manager::class)->setTenant($tenant);
        session()->put('tenant', $tenant->id);
    }
}
