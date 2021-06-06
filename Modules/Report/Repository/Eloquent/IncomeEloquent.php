<?php

namespace Modules\Report\Repository\Eloquent;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Payment\Entities\Payment;
use Modules\Report\Repository\IncomeRepository;

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
        return $this->income->query()->select('pay')->sum('pay');
    }

    /**
     * Get total income where given bill
     *
     * @param string $id bill id
     * @return object|null
     */
    public function incomeWhereBill(string $id): ?object
    {
        $query = DB::table('bills')
            ->selectRaw('`bills`.`name` AS bill_name, SUM(`payments`.`pay`) AS total_income')
            ->where('payments.bill_id', $id)->leftJoin('payments', 'bills.id', 'payments.bill_id')
            ->whereNull(['bills.deleted_at', 'payments.deleted_at'])
            ->first();

        if (is_null($query->total_income)) $query->total_income = 0;

        return $query;
    }

    /**
     * Get total spending where given bill
     *
     * @param string $id
     * @return object|null
     */
    public function spendingWhereBill(string $id): ?object
    {
        $query = DB::table('bills')
            ->selectRaw('`bills`.`name` AS bill_name, SUM(`spendings`.`nominal`) AS total_spending')
            ->where('spendings.bill_id', $id)->leftJoin('spendings', 'bills.id', 'spendings.bill_id')
            ->whereNull(['bills.deleted_at', 'spendings.deleted_at'])
            ->first();

        if (is_null($query->total_spending)) $query->total_spending = 0;

        return $query;
    }

    /**
     * Get daily percentage
     *
     * @return array
     */
    public function dailyPercentage(): array
    {
        $firstIncome = $this->income->where('pay_date', Carbon::yesterday()->toDateString())->sum('pay');
        $lastIncome = $this->income->where('pay_date', Carbon::today()->toDateString())->sum('pay');

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

        $firstIncome = $this->income->whereBetween('pay_date', [$twoWeekAgo, $oneWeekAgo])->sum('pay');
        $lastIncome = $this->income->whereBetween('pay_date', [$oneWeekAgo, Carbon::today()->toDateString()])->sum('pay');

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

        $firstIncome = $this->income->whereBetween('pay_date', [$oneMonthAgoStartDate, $oneMonthAgoEndDate])->sum('pay');
        $lastIncome = $this->income->whereBetween('pay_date', [$currentMonthStartDate, $currentMonthEndDate])->sum('pay');

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
        $firstIncome = $this->income->whereYear('pay_date', Carbon::now()->startOfYear()->subYear()->format('Y'))->sum('pay');
        $lastIncome = $this->income->whereYear('pay_date', Carbon::today()->format('Y'))->sum('pay');

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
