<?php

namespace Modules\GoenDataMaster\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\GoenDataMaster\Entities\Invoice;
use Modules\Utils\Uuid;

class Setting extends Model
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
        return \Modules\GoenDataMaster\Database\Factories\SettingFactory::new ();
    }

    /**
     * Get modules
     *
     * @return HasMany
     */
    public function modules(): HasMany
    {
        return $this->hasMany(SettingModule::class, 'setting_id', 'id');
    }

    /**
     * Get invoices
     *
     * @return HasMany
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'setting_id', 'id');
    }
}
