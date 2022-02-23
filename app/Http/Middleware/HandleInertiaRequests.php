<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Nedwors\Navigator\Facades\Nav;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'app' => fn (): array => static::handleSharedData($request)
        ]);
    }

    private static function handleSharedData(Request $request): array
    {
        return [
            'auth' => $request->user() ?: null,
            'navigators' => fn () => Nav::toJson(),
            'schools' => fn () => $request->user() ? $request->user()->schools()->select(['id', 'name'])->get() : null,
        ];
    }
}
