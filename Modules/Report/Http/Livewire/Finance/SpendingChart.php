<?php

namespace Modules\Report\Http\Livewire\Finance;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SpendingChart extends Component
{
    public int $filterSpending = 1;
    public string $series;
    public string $categories;
    public string $chartId = "spending-chart";

    protected function query()
    {
        $sqlRaw = 'SUM(`spendings`.`nominal`) as total';
        $sqlRaw .= ', `bills`.`name`, `spendings`.`spending_date`';

        return DB::table('bills')
            ->select(DB::raw($sqlRaw))
            ->leftJoin('spendings', 'bills.id', '=', 'spendings.bill_id')
            ->whereNull('bills.deleted_at')
            ->whereNull('spendings.deleted_at')
            ->groupBy('bills.id')
            ->orderBy('total');
    }

    public function render()
    {
        $query = $this->query();

        if ($this->filterSpending) {
            $query->whereBetween('spendings.spending_date', [
                Carbon::today()->subDay(7)->toDateString(),
                Carbon::today()->toDateString()
            ]);
        } else {
            $query->whereMonth('spendings.spending_date', Carbon::today()->subMonth()->month);
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

        return view('report::finance.livewire.spending-chart');
    }
}
