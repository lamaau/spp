<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Constants\StudentConstant;
use Modules\Setting\Constants\UserConstant;

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

        $credentials = ['email' => $this->email, 'password' => $this->password, 'status' => UserConstant::ACTIVE];

        if (Auth::attempt($credentials, $this->remember)) {
            return redirect()->intended(route('dashboard'));
        }

        return $this->addError('email', trans('auth.failed'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth', ['title' => 'Halaman Login']);
    }
}
