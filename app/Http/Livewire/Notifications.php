<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    /** @var array */
    protected $listeners = ['load-more' => 'loadMore'];

    public int $perPage = 10;

    public function loadMore()
    {
        $this->perPage = $this->perPage + 6;
    }

    public function markAsReadAll()
    {
        Auth::user()->unreadNotifications->markAsRead();
    }

    public function readed(string $id)
    {
        $this->query($id)->update(['read_at' => now()]);
    }

    public function delete(string $id)
    {
        $this->query($id)->delete();
    }

    protected function query(string $id): object
    {
        return DB::table('notifications')->where('id', $id);
    }

    public function render()
    {
        return view('livewire.notifications', [
            'notifications' => Auth::user()->notifications()->paginate($this->perPage),
        ]);
    }
}
