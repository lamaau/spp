<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Entities\Spending;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill extends Model
{
    use SoftDeletes,
        Uuid;

    /**
     * Primary Key Incrementing
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Mass Assignment
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Primary Key Type
     *
     * @var string
     */
    protected $keyType = "string";

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'bills';

    /**
     * Casting
     *
     * @var array
     */
    protected $casts = [
        'monthly' => 'boolean',
    ];

    /**
     * Nominal in idr
     *
     * @return string
     */
    public function getNominalIdrAttribute()
    {
        return idr($this->nominal);
    }

    /**
     * Monthly state
     *
     * @return void
     */
    public function getBillMonthlyAttribute()
    {
        return $this->monthly ? 'Ya' : 'Tidak';
    }

    /**
     * Get payments
     *
     * @return HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get spendings
     *
     * @return HasMany
     */
    public function spendings(): HasMany
    {
        return $this->hasMany(Spending::class);
    }
}
