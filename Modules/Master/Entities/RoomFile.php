<?php

namespace Modules\Master\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Utils\Uuid;

class RoomFile extends Model
{
    use Uuid;

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
    protected $table = 'room_files';
}
