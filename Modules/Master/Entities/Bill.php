<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
