<?php

namespace Modules\Walet\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Walet\Repository\IncomeRepository;
use Modules\Walet\Repository\SpendingRepository;

class AboveIncome implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
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
        $income = resolve(IncomeRepository::class)->income();
        $spending = resolve(SpendingRepository::class)->spending();

        return $income < $spending;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Pemasukan kurang dari pengeluaran';
    }
}
