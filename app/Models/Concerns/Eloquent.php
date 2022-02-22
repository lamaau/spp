<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Eloquent extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $model) {
            $model->fill([
                'created_by' => Auth::id(),
            ]);
        });
    }
}
