<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Progress extends Component
{
    public $id;
    public $max;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $max)
    {
        $this->id = $id;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.progress');
    }
}
