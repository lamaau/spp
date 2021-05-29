<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    protected function query(string $id): object
    {
        return DB::table('notifications')->where('id', $id);
    }

    public function readed(string $id)
    {
        $this->query($id)->update(['read_at' => now()]);
    }

    public function delete(string $id)
    {
        $this->query($id)->delete();
    }

    public function render()
    {
        return view('livewire.notifications', [
            'notifications' => Auth::user()->notifications,
        ]);
    }
}
