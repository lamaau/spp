<?php

namespace Modules\Setting\Entities;

use Modules\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
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
    protected $table = 'settings';
}
