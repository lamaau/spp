<?php

namespace App\Models\Concerns;

use App\Models\Concerns\WithUuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eloquent extends Model
{
    use WithUuid,
        SoftDeletes;

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
