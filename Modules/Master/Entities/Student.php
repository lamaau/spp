<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Modules\Master\Entities\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Constants\StudentConstant;

class Student extends Model
{
    use SoftDeletes,
        HasFactory,
        Uuid;

    /**
     * Primary Key Incrementing
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Column unique
     *
     * @var array
     */
    public $unique = [
        'nis', 'nisn', 'email'
    ];

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
    protected $table = 'students';

    /**
     * Get where active scope
     *
     * @param object $query
     * @return void
     */
    public function scopeActive(object $query)
    {
        return $query->where('status', StudentConstant::ACTIVE);
    }
    
    /**
     * Get room
     *
     * @return BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id')->withTrashed();
    }

    /**
     * Get bill
     *
     * @return BelongsTo
     */
    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class, 'bill_id')->withTrashed();
    }
}
