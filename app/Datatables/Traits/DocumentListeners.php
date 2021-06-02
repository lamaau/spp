<?php

namespace App\Datatables\Traits;

use Illuminate\Support\Facades\Auth;

trait DocumentListeners
{
    public function getListeners()
    {
        $userId = Auth::user()->id;

        return [
            "echo-private:notifications.{$userId},DocumentImportedComplete" => '$refresh',
        ];
    }
}
