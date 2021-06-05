<?php

namespace Modules\Payment\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class SpendingAboveIncome implements Rule
{
    private $name;
    private ?string $bill_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(?string $bill_id)
    {
        $this->bill_id = $bill_id;
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
        if (!is_null($this->bill_id)) {
            $value = clean_currency_format($value);

            $payment = DB::table('bills')
                ->selectRaw('`bills`.`name` AS bill_name, SUM(`payments`.`pay`) AS payed')
                ->where('payments.bill_id', $this->bill_id)->leftJoin('payments', 'bills.id', 'payments.bill_id')
                ->whereNull(['bills.deleted_at', 'payments.deleted_at'])
                ->first();

            $spending = DB::table('bills')
                ->selectRaw('SUM(`spendings`.`nominal`) AS spend')
                ->where('spendings.bill_id', $this->bill_id)->leftJoin('spendings', 'bills.id', 'spendings.bill_id')
                ->whereNull(['bills.deleted_at', 'spendings.deleted_at'])
                ->first();

            if (is_null($spending->spend)) $spending->spend = 0;
            $this->name = strtolower($payment->bill_name);

            return $value <= abs(($spending->spend - $payment->payed));
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Saldo pada tagihan {$this->name} tidak cukup, <a href='" . route('report.finance') . "' target='blank' class='text-primary'>lihat laporan keuangan?</a>";
    }
}
