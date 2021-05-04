<?php

namespace App\Datatables\Traits;

use Livewire\Event;

trait Notify
{
    protected function e(string $color, string $title, string $message, string $position = 'topRight'): Event
    {
        return $this->emit('notify', ['color' => $color, 'title' => $title, 'message' => $message, 'position' => $position]);
    }

    public function error(string $title, string $message, string $position = 'topRight'): Event
    {
        return $this->e('red', $title, $message, $position);
    }

    public function warning(string $title, string $message, string $position = 'topRight'): Event
    {
        return $this->e('yellow', $title, $message, $position);
    }

    public function info(string $title, string $message, string $position = 'topRight'): Event
    {
        return $this->e('blue', $title, $message, $position);
    }

    public function success(string $title, string $message, string $position = 'topRight'): Event
    {
        return $this->e('green', $title, $message, $position);
    }
}
