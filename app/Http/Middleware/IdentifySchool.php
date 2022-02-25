<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IdentifySchool
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->hasSchool($request)) {
            // set default url params and forget params
            app('url')->defaults(['school' => $request->route('school')]);
            $request->route()->forgetParameter('school');
        }

        return $next($request);
    }

    /**
     * Has school
     *
     * @return boolean
     */
    private function hasSchool(Request $request): bool
    {
        $school_id = $request->route('school');

        if (!$school_id) {
            return false;
        }

        $school = school($school_id);

        if (empty($school)) {
            return false;
        }

        $school->makeCurrent();

        return true;
    }
}
