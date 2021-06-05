<?php

namespace Modules\Report\Http\Livewire\Finance;

use Illuminate\Support\Arr;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Modules\Master\Entities\Bill;
use Illuminate\Support\Facades\DB;

class Income extends Component
{
    // 0 => last week
    // 1 => last month
    // 2 => last year
    public int $filter = 1;
    public string $chartId = "finance-chart";

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

        if ($this->filter) {
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

        $this->emit("refreshChart-{$this->chartId}", [
            'series' => $series,
            'categories' => $categories,
        ]);

        return view('report::livewire.income', [
            'series' => json_encode($series),
            'categories' => json_encode($categories),
        ]);
    }
}
