<?php

namespace App\View\Components\Apex;

use Illuminate\View\Component;

class LineChart extends Component
{
    public $chartId;

    public $chartData;

    public $chartCategory;

    public function __construct($chartId, $chartData, $chartCategory)
    {
        $this->chartId = $chartId;
        $this->chartData = $chartData;
        $this->chartCategory = $chartCategory;
    }

    public function render()
    {
        return view('components.apex.line-chart');
    }
}
