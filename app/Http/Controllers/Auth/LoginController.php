<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Inertia\Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    /**
     * Display the login view
     *
     * @return Response
     */
    public function create(): Response
    {
        return inertia('auth/login');
    }

    public function store(LoginRequest $request)
    {        
        $request->authenticate();
        dd($request->all());

        $request->session()->regenerate();


        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
