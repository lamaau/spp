<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Modules\Payment\Entities\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Database\Factories\RoomFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory,
        SoftDeletes,
        Uuid;

    /**
     * Primary Key Incrementing
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Unique
     *
     * @var array
     */
    public $unique = ['name'];

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
    protected $table = 'rooms';

    /**
     * Faker factory
     *
     * @return RoomFactory
     */
    protected static function newFactory(): RoomFactory
    {
        return RoomFactory::new();
    }

    /**
     * Get name
     *
     * @param null|string $value
     * @return string
     */
    public function getNameAttribute($value): string
    {
        return explode('-', $value)[1] ?? $value;
    }

    /**
     * Get students
     *
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
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
}
