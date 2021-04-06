<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Modules\Master\Entities\User;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    // public $domain = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate([
            'name'     => ['required'],
            // 'domain'   => ['required', 'string'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'same:passwordConfirmation'],
        ]);

        $user = User::create([
            'email'    => $this->email,
            'name'     => $this->name,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('install'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth', ['title' => 'Halaman Register']);
    }
}
