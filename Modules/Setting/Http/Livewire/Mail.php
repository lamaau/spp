<?php

namespace Modules\Setting\Http\Livewire;

use Livewire\Component;
use App\Datatables\Traits\Notify;
use Modules\Setting\Entities\Mail as MailModel;

class Mail extends Component
{
    use Notify;

    /** @var null|string */
    public $driver;
    public $host;
    public $port;
    public $username;
    public $password;
    public $from_name;
    public $from_address;

    public function mount()
    {
        $mail = MailModel::first();
        if ($mail) {
            $this->driver = $mail->driver;
            $this->host = $mail->host;
            $this->port = $mail->port;
            $this->username = $mail->username;
            $this->password = $mail->password;
            $this->from_name = $mail->from_name;
            $this->from_address = $mail->from_address;
        }
    }

    public function save()
    {
        $validated = $this->validate([
            'driver' => ['required'],
            'host' => ['required'],
            'port' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'from_name' => ['required'],
            'from_address' => ['required'],
        ]);

        try {
            if (resolve(\Modules\Setting\Repository\SettingRepository::class)->saveOrUpdate('mails', $validated)) {
                return $this->success('Berhasil!', 'Mail berhasil diatur.');
            }

            return $this->error('Oops!', 'Terjadi kesalahan.');
        } catch (\Exception $e) {
            return $this->error('Oops!', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('setting::automation.livewire.mail');
    }
}
