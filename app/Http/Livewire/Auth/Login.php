<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Constants\StudentConstant;

class Login extends Component
{
    /** @var string */
    public $email = null;

    /** @var string */
    public $password = null;

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email'    => ['required', 'email'],
        'password' => ['required', 'string'],
    ];

    public function authenticate()
    {
        $this->validate();

        request()->session()->regenerate();

        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::guard('web')->attempt($credentials, $this->remember)) {
            return redirect()->intended(route('dashboard'));
        }

        if (Auth::guard('student')->attempt(array_merge($credentials, [
            'status' => StudentConstant::ACTIVE,
        ]), $this->remember)) {
            return redirect()->intended(route('u.dashboard'));
        }

        return $this->addError('email', trans('auth.failed'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth', ['title' => 'Halaman Login']);
    }
}
