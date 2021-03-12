<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Header extends Component
{
    protected $listeners = ['changeState'];

    public $state = false;

    /**
     * Change sidebar state using listeners
     *
     * @param bool $state
     * @return void
     */
    public function changeState(bool $state)
    {
        $this->state = $state;
    }

    /**
     * Execute when property state is updated
     *
     * @return void
     */
    public function updatedState()
    {
        $this->emit('changeState', $this->state);
    }

    public function render()
    {
        return view('livewire.layouts.header');
    }
}
