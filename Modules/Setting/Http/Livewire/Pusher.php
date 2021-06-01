<?php

namespace Modules\Setting\Http\Livewire;

use App\Datatables\Traits\Notify;
use Livewire\Component;
use Livewire\Event;
use Modules\Setting\Entities\Pusher as PusherModel;

class Pusher extends Component
{
    use Notify;

    /** @var null|string */
    public $app_id;
    public $app_key;
    public $app_secret;
    public $app_cluster;

    public function mount()
    {
        $query = PusherModel::first();
        if ($query) {
            $this->app_id = $query->app_id;
            $this->app_key = $query->app_key;
            $this->app_secret = $query->app_secret;
            $this->app_cluster = $query->app_cluster;
        }
    }

    public function save(): Event
    {
        $validated = $this->validate([
            'app_id' => ['required'],
            'app_key' => ['required'],
            'app_secret' => ['required'],
            'app_cluster' => ['required'],
        ]);

        try {
            if (resolve(\Modules\Setting\Repository\SettingRepository::class)->saveOrUpdate('pushers', $validated)) {
                return $this->success('Berhasil!', 'Pusher berhasil diatur.');
            }

            return $this->error('Oops!', 'Terjadi kesalahan.');
        } catch (\Exception $e) {
            return $this->error('Oops!', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('setting::automation.livewire.pusher');
    }
}
