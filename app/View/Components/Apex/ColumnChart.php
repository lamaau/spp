<?php

namespace App\View\Components\Apex;

use Illuminate\View\Component;

class ColumnChart extends Component
{
    public string $chartId;
    public string $chartData;
    public string $chartCategory;

    public function __construct(
        string $chartId,
        string $chartData,
        string $chartCategory
    ) {
        $this->chartId = $chartId;
        $this->chartData = $chartData;
        $this->chartCategory = $chartCategory;
    }

    public function render()
    {
        return view('components.apex.column-chart');
    }
}
