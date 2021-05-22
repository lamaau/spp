<?php

namespace Modules\Payment\Entities;

use Modules\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Entities\Bill;
use Modules\Master\Entities\SchoolYear;
use Modules\Master\Entities\Student;

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
