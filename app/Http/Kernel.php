<?php

declare(strict_types=1);

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            'cookies.encrypt',
            'cookies.response',
            'session.start',
            // 'session.auth',
            'session.errors',
            'csrf',
            'bindings',
            'inertia'
        ],
        'api' => [
            'throttle:api',
            'bindings'
        ],
        'admin' => [
            'web',
            'auth',
            'bindings',
            'identify.school',
        ],
        'guest' => [
            'web',
            'auth.redirect'
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // laravel
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.redirect' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'cookies.encrypt' => \App\Http\Middleware\EncryptCookies::class,
        'cookies.response' => \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        'csrf' => \App\Http\Middleware\VerifyCsrfToken::class,
        'session.auth' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'session.errors' => \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        'session.start' => \Illuminate\Session\Middleware\StartSession::class,
        //'signature' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        //'sanctum' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'signature' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // package
        'inertia' => \App\Http\Middleware\HandleInertiaRequests::class,
        // 'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        // 'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        // 'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,

        // custom
        'identify.school' => \App\Http\Middleware\IdentifySchool::class,
    ];
}
