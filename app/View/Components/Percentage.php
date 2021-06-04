<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Percentage extends Component
{
    public array $result;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $result)
    {
        $this->result = $result;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.percentage');
    }
}
