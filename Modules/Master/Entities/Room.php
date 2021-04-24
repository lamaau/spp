<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected static function newFactory()
    {
        return \Modules\Master\Database\Factories\RoomFactory::new();
    }

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
}
