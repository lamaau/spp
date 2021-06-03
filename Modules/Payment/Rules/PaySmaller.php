<?php

namespace Modules\Payment\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class PaySmaller implements Rule
{
    /** @var string|null */
    protected $bill;
    protected $year;
    protected $student;
    protected $month;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $bill, string $year, string $student, ?string $month)
    {
        $this->bill = $bill;
        $this->year = $year;
        $this->student = $student;
        $this->month = $month;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $rawQuery = '`bills`.`nominal`';
        $rawQuery .= ', sum(`payments`.`pay`) as total_payment';

        $query = DB::table('payments')
            ->select(DB::raw($rawQuery))
            ->leftJoin('bills', 'bills.id', '=', 'payments.bill_id')
            ->where('year_id', $this->year)
            ->where('bill_id', $this->bill)
            ->where('student_id', $this->student)
            ->whereNull('payments.deleted_at');

        if (!is_null($this->month)) {
            $payments = $query->whereMonth('month', explode('-', $this->month)[1])->get();
        } else {
            $payments = $query->get();
        }

        if (
            !is_null($payments->first()->nominal)
            && !is_null($payments->first()->total_payment)
        ) {
            return (int)$payments->first()->total_payment < $payments->first()->nominal;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if (!is_null($this->month)) {
            return 'Pembayaran pada bulan '
                . strtolower(\Carbon\Carbon::parse($this->month)->translatedFormat('F'))
                . ' telah dilunasi.';
        }

        return 'Pembayaran ini telah dilunasi';
    }
}
