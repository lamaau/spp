<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Modules\Setting\Constants\UserConstant;
use Modules\Setting\Entities\Setting;

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
        if ($request->user()->status === UserConstant::SUSPEND) {
            Auth::logout();
            return $request->expectsJson()
                ? abort(403, 'Yout account is suspended.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'login'));
        }

        if (
            !$request->user() ||
            ($request->user() instanceof MustVerifyEmail &&
                !$request->user()->hasVerifiedEmail())
        ) {
            return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));
        } else {
            if (!Setting::first() && Auth::check()) {
                return $request->expectsJson()
                    ? abort(403, 'You have to setup this app first.')
                    : Redirect::guest(URL::route($redirectToRoute ?: 'install'));
            }
        }

        return $next($request);
    }
}
