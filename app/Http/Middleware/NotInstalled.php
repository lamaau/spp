<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Modules\GoenDataMaster\Entities\Setting;

class NotInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {
        if (Setting::whereCreatedBy(Auth::id())->count()) {
            return $request->expectsJson()
                ? abort(403, 'You have to setup this app first.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'home'));
        }

        return $next($request);
    }
}
