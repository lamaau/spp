<?php

namespace Modules\GoenDataMaster\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Utils\Uuid;

class Invoice extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\GoenDataMaster\Database\Factories\InvoiceFactory::new();
    }
}
