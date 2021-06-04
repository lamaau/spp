<?php

namespace Modules\Walet\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Walet\Repository\IncomeRepository;
use Modules\Walet\Repository\SpendingRepository;

class AboveIncome implements Rule
{
    private IncomeRepository $income;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->income = resolve(IncomeRepository::class);
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
        $spending = resolve(SpendingRepository::class)->spending();

        return (int)abs($spending + clean_currency_format($value)) <= (int)$this->income->income();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ":attribute lebih besar dari pemasukan, total pemasukan saat ini adalah: " . idr($this->income->income());
    }
}
