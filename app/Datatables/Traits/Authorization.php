<?php

namespace App\Datatables\Traits;

trait Authorization
{
    public function can(string $permission)
    {
        if (!auth()->user()->can($permission)) {
            $this->emit('flash', ['type' => 'info', 'message' => 'Anda tidak diizinkan untuk melakukan tidakan ini']);
            return true;
        }

        return false;
    }
}
