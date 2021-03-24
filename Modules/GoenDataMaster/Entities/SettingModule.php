<?php

namespace Modules\GoenDataMaster\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Utils\Uuid;

class SettingModule extends Model
{
    use Uuid, HasFactory;

    protected $guarded = [];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return SettingModuleFactory::new ();
    }
}
