<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class Installed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (!$request->user() ||
            ($request->user() instanceof MustVerifyEmail &&
                !$request->user()->hasVerifiedEmail())) {
            return $request->expectsJson()
            ? abort(403, 'Your email address is not verified.')
            : Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));
        } else {
            if (!Setting::count()) {
                return $request->expectsJson()
                ? abort(403, 'You have to setup this app first.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'install'));
            }
        }

        return $next($request);
    }
}
