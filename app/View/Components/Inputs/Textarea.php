<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Textarea extends Component
{
    public string $name;
    public string $label;
    public ?string $value;
    public bool $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label,
        ?string $value = null,
        bool $required = false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs.textarea');
    }
}
