<?php

namespace Modules\Setting\Entities;

use Modules\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mail extends Model
{
    use Uuid, SoftDeletes;

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
    protected $table = 'mails';

    /**
     * Get author
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
