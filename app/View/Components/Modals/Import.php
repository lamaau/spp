<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class Import extends Component
{
    public $id;
    public $file;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, $file, string $title = null)
    {
        $this->id = $id;
        $this->file = $file;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.import');
    }
}
