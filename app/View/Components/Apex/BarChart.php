<?php

namespace App\View\Components\Apex;

use Illuminate\View\Component;

class BarChart extends Component
{
    public string $chartId;
    public string $chartData;
    public string $chartCategory;
    public $chartFill;

    public function __construct(
        string $chartId,
        string $chartData,
        string $chartCategory,
        $chartFill
    ) {
        $this->chartId = $chartId;
        $this->chartData = $chartData;
        $this->chartCategory = $chartCategory;
        $this->chartFill = $chartFill;
    }

    public function render()
    {
        return view('components.apex.bar-chart');
    }
}
