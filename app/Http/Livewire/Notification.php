<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notification extends Component
{
    public $notifications = [];

    protected $listeners = [
        'broadcaster' => 'notified'
    ];

    public function mount()
    {
        $this->notified();
    }

    public function notified()
    {
        $this->notifications = Auth::user()->unreadNotifications()->take(5)->orderBy('created_at', 'desc')->get();
    }

    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        $this->notified();
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
