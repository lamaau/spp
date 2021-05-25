<?php

namespace Modules\Payment\Entities;

use Modules\Utils\Uuid;
use Modules\Master\Entities\Bill;
use Modules\Master\Entities\User;
use Modules\Master\Entities\Student;
use Illuminate\Database\Eloquent\Model;
use Modules\Master\Entities\SchoolYear;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
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
    protected $table = 'payments';

    /**
     * Get student
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    /**
     * Get bill
     *
     * @return BelongsTo
     */
    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    /**
     * Get student
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * Get school year | tahun ajaran
     *
     * @return BelongsTo
     */
    public function school_year(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class, 'year_id');
    }
}
