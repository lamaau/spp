<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Widget extends Component
{
    public $title;

    public $value;

    public $icon;

    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $value, $icon, $type)
    {
        $this->title = $title;
        $this->value = $value;
        $this->icon  = $icon;
        $this->type  = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget');
    }
}
