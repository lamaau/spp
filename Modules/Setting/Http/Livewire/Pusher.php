<?php

namespace Modules\Setting\Http\Livewire;

use Livewire\Event;
use Livewire\Component;
use App\Datatables\Traits\Notify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Modules\Setting\Entities\Pusher as PusherModel;

class Pusher extends Component
{
    use Notify;

    /** @var null|string */
    public $app_id;
    public $app_key;
    public $app_secret;
    public $app_cluster;
    public bool $pusherConfigured;

    public function mount()
    {
        $query = PusherModel::first();
        if ($query) {
            $this->pusherConfigured = true;
            $this->app_id = $query->app_id;
            $this->app_key = $query->app_key;
            $this->app_secret = $query->app_secret;
            $this->app_cluster = $query->app_cluster;
        } else {
            $this->pusherConfigured = false;
        }
    }

    public function resetValue(): void
    {
        $this->app_id = null;
        $this->app_key = null;
        $this->app_secret = null;
        $this->app_cluster = null;
        Artisan::call('optimize:clear');
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
                $this->pusherConfigured = true;
                return $this->success('Berhasil!', 'Pusher berhasil diatur.');
            }

            return $this->error('Oops!', 'Terjadi kesalahan.');
        } catch (\Exception $e) {
            return $this->error('Oops!', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function delete(string $password)
    {
        if (Hash::check($password, Auth::user()->password)) {
            PusherModel::first()->delete();
            $this->resetValue();
            $this->pusherConfigured = false;
            return $this->success('Berhasil!', 'Konfigurasi berhasil dihapus.');
        }

        return $this->error('', 'Password yang anda masukan salah.');
    }

    public function render()
    {
        return view('setting::automation.livewire.pusher');
    }
}
