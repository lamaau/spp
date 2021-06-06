<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardIcon extends Component
{
    public string $type;
    public string $icon;
    public string $title;
    public string $linkText;
    public string $linkIcon;
    public string $linkRoute;
    public string $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $icon,
        string $title,
        string $linkText,
        string $linkRoute,
        string $description,
        string $type = 'primary',
        string $linkIcon = 'fas fa-chevron-right'
    ) {
        $this->type = $type;
        $this->icon = $icon;
        $this->title = $title;
        $this->linkText = $linkText;
        $this->linkIcon = $linkIcon;
        $this->linkRoute = $linkRoute;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-icon');
    }
}
