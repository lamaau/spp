<?php

namespace Modules\Payment\Rules;

use Illuminate\Support\Facades\DB;
use Modules\Payment\Entities\Spending;
use Illuminate\Contracts\Validation\Rule;
use Modules\Report\Repository\IncomeRepository;

class SpendingAboveIncome implements Rule
{
    private $name;
    private ?string $bill_id;
    private bool $isUpdate;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(?string $bill_id, bool $isUpdate)
    {
        $this->bill_id = $bill_id;
        $this->isUpdate = $isUpdate;
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

            $repository = resolve(IncomeRepository::class);

            $payment = $repository->incomeWhereBill($this->bill_id);
            $spending = $repository->spendingWhereBill($this->bill_id);
            $this->name = strtolower($payment->bill_name);

            if ($this->isUpdate) {
                $oldNominal = Spending::query()->where('bill_id', $this->bill_id)->select('nominal')->first();

                if ($oldNominal) {
                    $totalSpend = (int)$spending->total_spending - (int)$oldNominal->nominal;
                    $totalIncome = ((int)$payment->total_income - (int)$totalSpend);

                    return $value <= $totalIncome ? true : false;
                }
            }

            $totalIncome = ((int)$payment->total_income - (int)$spending->total_spending);
            return $value <= $totalIncome ? true : false;
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
