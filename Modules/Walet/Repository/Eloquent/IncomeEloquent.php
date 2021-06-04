<?php

namespace Modules\Walet\Repository\Eloquent;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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

    /**
     * Get all income with sum pay for one bill
     *
     * @return integer
     */
    public function income(): int
    {
        return $this->income->query()->select('pay')->whereNull('deleted_at')->sum('pay');
    }

    /**
     * Get daily percentage
     *
     * @return array
     */
    public function dailyPercentage(): array
    {
        $firstIncome = $this->income->where('pay_date', Carbon::yesterday()->toDateString())->whereNull('deleted_at')->sum('pay');
        $lastIncome = $this->income->where('pay_date', Carbon::today()->toDateString())->whereNull('deleted_at')->sum('pay');

        $result = $this->callculatePercentage($firstIncome, $lastIncome);

        return [
            'result' => $result,
            'text' => 'Hari ini',
            'first_income' => $firstIncome,
            'last_income' => $lastIncome,
        ];
    }

    /**
     * Get weekly percentage
     *
     * @return integer
     */
    public function weeklyPercentage(): array
    {
        $oneWeekAgo = Carbon::today()->subWeek()->toDateString();
        $twoWeekAgo = Carbon::today()->subWeeks(2)->toDateString();

        $firstIncome = $this->income->whereBetween('pay_date', [$twoWeekAgo, $oneWeekAgo])->whereNull('deleted_at')->sum('pay');
        $lastIncome = $this->income->whereBetween('pay_date', [$oneWeekAgo, Carbon::today()->toDateString()])->whereNull('deleted_at')->sum('pay');
        
        $result = $this->callculatePercentage($firstIncome, $lastIncome);

        return [
            'result' => $result,
            'text' => 'Minggu ini',
            'first_income' => $firstIncome,
            'last_income' => $lastIncome,
        ];
    }

    /**
     * Get monthly percentage
     *
     * @return array
     */
    public function monthlyPercentage(): array
    {
        $oneMonthAgoStartDate = Carbon::today()->startOfMonth()->subMonth()->toDateString();
        $oneMonthAgoEndDate = Carbon::today()->endOfMonth()->subMonth()->toDateString();

        $currentMonthStartDate = Carbon::today()->startOfMonth()->toDateString();
        $currentMonthEndDate = Carbon::today()->endOfMonth()->toDateString();

        $firstIncome = $this->income->whereBetween('pay_date', [$oneMonthAgoStartDate, $oneMonthAgoEndDate])->whereNull('deleted_at')->sum('pay');
        $lastIncome = $this->income->whereBetween('pay_date', [$currentMonthStartDate, $currentMonthEndDate])->whereNull('deleted_at')->sum('pay');

        $result = $this->callculatePercentage($firstIncome, $lastIncome);

        return [
            'result' => $result,
            'text' => 'Bulan ini',
            'first_income' => $firstIncome,
            'last_income' => $lastIncome
        ];
    }

    /**
     * Get yearly percentage
     *
     * @return array
     */
    public function yearlyPercentage(): array
    {
        $firstIncome = $this->income->whereYear('pay_date', Carbon::now()->startOfYear()->subYear()->format('Y'))->whereNull('deleted_at')->sum('pay');
        $lastIncome = $this->income->whereYear('pay_date', Carbon::today()->format('Y'))->whereNull('deleted_at')->sum('pay');
        
        $result = $this->callculatePercentage($firstIncome, $lastIncome);

        return [
            'result' => $result,
            'text' => 'Tahun ini',
            'first_income' => $firstIncome,
            'last_income' => $lastIncome,
        ];
    }

    /**
     * Callculate percentage
     *
     * @see https://kamus.tokopedia.com/p/persentase-pertumbuhan/
     * 
     * @param integer|string $firstIncome
     * @param integer|string $lastIncome
     * @return integer
     */
    protected function callculatePercentage($firstIncome, $lastIncome): int
    {
        if ($firstIncome != 0 && $lastIncome != 0) {
            return ((int)$lastIncome - (int)$firstIncome) / (int)$firstIncome * 100;
        }

        return 0;
    }
}
