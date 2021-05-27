<?php

namespace Modules\Walet\Repository\Eloquent;

use Modules\Payment\Entities\Payment;
use Modules\Walet\Repository\IncomeRepository;

class IncomeEloquent implements IncomeRepository
{
    /** @var Income */
    protected $income;

    public function __construct(Payment $income)
    {
        $this->income = $income;
    }

    public function income(): int
    {
        return $this->income->query()->select('pay')->sum('pay');
    }
}
