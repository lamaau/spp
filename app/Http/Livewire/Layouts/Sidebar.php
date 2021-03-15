<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = ['changeState'];

    public $state = false;

    public $active = false;

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

    public function is_active($url)
    {
        if (call_user_func_array('Request::is', (array) $url)) {
            return [
                'state' => true,
                'class' => 'flex items-center px-6 py-2 mt-1 text-gray-100 duration-200 bg-gray-600 bg-opacity-25 border-l-4 border-gray-100',
            ];
        }

        return [
            'state' => false,
            'class' => 'flex items-center px-6 py-2 mt-1 text-gray-500 duration-200 border-l-4 border-gray-900 hover:bg-gray-600 hover:bg-opacity-25 hover:border-l-4 hover:border-gray-100 hover:text-gray-100',
        ];
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
        return view('livewire.layouts.sidebar');
    }
}
