<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Modules\Master\Entities\Room;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Modules\Master\Constants\StudentConstant;
use Spatie\Permission\Traits\HasRoles;

class Student extends Authenticatable
{
    use SoftDeletes,
        Notifiable,
        HasFactory,
        HasRoles,
        Uuid;

    /**
     * Guard
     *
     * @var string
     */
    protected $guard = 'student';
        
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

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
