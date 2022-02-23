<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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
            URL::defaults(['school' => $request->route('school')]);
            return $next($request);
        }

        abort(404, 'Not Found');
    }

    /**
     * Has school
     *
     * @return boolean
     */
    private function hasSchool(Request $request): bool
    {
        $school = $request->route('school');

        if (!$school) {
            return false;
        }

        $school = school($school);

        if (empty($school) || is_null($school)) {
            return false;
        }

        $school->makeCurrent();

        return true;
    }
}
