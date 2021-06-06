<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class SelectConstant extends Component
{
    public string $name;
    public ?string $label;
    public ?string $value;
    public ?array $items;
    public bool $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        ?string $label = null,
        ?string $value = null,
        ?array $items = [],
        bool $required = false
    ) {
        $this->name = $name;
        $this->items = $items;
        $this->value = $value;
        $this->label = $label;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs.select-constant');
    }
}
