<?php

namespace App\Traits;

use Livewire\Event;

trait Notify
{
    public function success(string $title, string $message): Event
    {
        return $this->emit('notice', ['type' => 'success', 'title' => $title, 'message' => $message]);
    }

    public function error(string $title, string $message): Event
    {
        return $this->emit('notice', ['type' => 'error', 'title' => $title, 'message' => $message]);
    }
}
