<?php

namespace App\Http\Livewire\Location;

use Livewire\Component;

class Province extends Component
{
    public $state = false;
    
    public function render()
    {
        return view('livewire.location.province');
    }
}
