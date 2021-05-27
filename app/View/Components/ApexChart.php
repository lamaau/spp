<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ApexChart extends Component
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
        return view('components.apex-chart');
    }
}
