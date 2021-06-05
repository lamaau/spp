<?php

namespace Modules\Report\Http\Livewire\Finance;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IncomeChart extends Component
{
    public int $filterIncome = 1;
    public string $series;
    public string $categories;
    public string $chartId = "income-chart";

    protected function query()
    {
        $sqlRaw = 'SUM(`payments`.`pay`) as total';
        $sqlRaw .= ', `bills`.`name`, `payments`.`pay_date`';

        return DB::table('bills')
            ->select(DB::raw($sqlRaw))
            ->leftJoin('payments', 'bills.id', '=', 'payments.bill_id')
            ->whereNull('bills.deleted_at')
            ->whereNull('payments.deleted_at')
            ->groupBy('bills.id')
            ->orderBy('total');
    }

    public function render()
    {
        $query = $this->query();

        if ($this->filterIncome) {
            $query->whereBetween('payments.pay_date', [
                Carbon::today()->subDay(7)->toDateString(),
                Carbon::today()->toDateString()
            ]);
        } else {
            $query->whereMonth('payments.pay_date', Carbon::today()->subMonth()->month);
        }

        $series = [];
        $categories = [];
        foreach ($query->get() as $key => $item) {
            $categories[] = $item->name;
            $series[] = is_null($item->total) ? 0 : (int)$item->total;
        }

        $this->series = json_encode($series);
        $this->categories = json_encode($categories);

        $this->emit("refreshChart-{$this->chartId}", [
            'series' => $series,
            'categories' => $categories,
        ]);

        return view('report::finance.livewire.income-chart');
    }
}
