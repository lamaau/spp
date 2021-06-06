<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class SelectTwo extends Component
{
    public string $name;
    public ?string $label;
    public ?array $items;
    public bool $required;
    public string $key;
    public string $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        ?string $label = null,
        ?array $items = [],
        string $key = 'id',
        string $text = 'name',
        bool $required = false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->items = $items;
        $this->key = $key;
        $this->text = $text;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs.select-two');
    }
}
