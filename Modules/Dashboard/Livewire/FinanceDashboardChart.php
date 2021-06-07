<?php

namespace Modules\Dashboard\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Modules\Utils\Month;
use Illuminate\Support\Facades\DB;

class FinanceDashboardChart extends Component
{
    public string $chartId = 'statistics';

    protected function income()
    {
        $sqlRaw = "SUM(`payments`.`pay`) as total_income";
        $sqlRaw .= ", MONTH(`payments`.`pay_date`) as month";

        return DB::table('payments')
            ->select(DB::raw($sqlRaw))
            ->groupBy(DB::raw('MONTH(payments.pay_date)'))
            ->whereYear('pay_date', Carbon::now()->format('Y'))
            ->whereNull('deleted_at')
            ->get();
    }

    protected function spending()
    {
        $sqlRaw = "SUM(`spendings`.`nominal`) as total_spending";
        $sqlRaw .= ", MONTH(`spendings`.`created_at`) as month";

        return DB::table('spendings')
            ->select(DB::raw($sqlRaw))
            ->groupBy(DB::raw('MONTH(spendings.created_at)'))
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->whereNull('deleted_at')
            ->get();
    }

    protected function formatData($query)
    {
        $tmp = [];
        foreach ($query as $result) {
            $key       = str_pad($result->month, 2, '0', STR_PAD_LEFT);
            $tmp[$key] = $result;
        }

        return $tmp;
    }

    public function query()
    {
        $income = $this->formatData($this->income());
        $spending = $this->formatData($this->spending());

        $incomes = [];
        $spendings = [];
        foreach (Month::number() as $m) {
            $incomes['name']   = "Pemasukan";
            $incomes['data'][] = isset($income[$m]) ? $income[$m]->total_income : 0;

            $spendings['name']   = "Pengeluaran";
            $spendings['data'][] = isset($spending[$m]) ? $spending[$m]->total_spending : 0;
        }

        return [$incomes, $spendings];
    }

    public function render()
    {
        $chartData = $this->query();

        return view('dashboard::livewire.payment-chart', [
            'id' => $this->chartId,
            'data' => json_encode($chartData),
            'categories' => json_encode(Month::prefixName()),
        ]);
    }
}
