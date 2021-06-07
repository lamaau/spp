<?php

namespace Modules\Setting\Http\Livewire;

use Livewire\Component;
use App\Datatables\Traits\Notify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Modules\Setting\Entities\Mail as MailModel;
use Modules\Setting\Constants\EncryptionConstant;

class Mail extends Component
{
    use Notify;

    /** @var null|string */
    public $driver;
    public $host;
    public $port;
    public $username;
    public $password;
    public $encryption;
    public $from_name;
    public $from_address;
    public bool $mailConfigured = false;

    public function mount()
    {
        $mail = MailModel::first();
        if ($mail) {
            $this->mailConfigured = true;
            $this->driver = $mail->driver;
            $this->host = $mail->host;
            $this->port = $mail->port;
            $this->username = $mail->username;
            $this->password = $mail->password;
            $this->encryption = $mail->encryption;
            $this->from_name = $mail->from_name;
            $this->from_address = $mail->from_address;
        } else {
            $this->mailConfigured = false;
        }
    }

    public function resetValue(): void
    {
        $this->driver = null;
        $this->host = null;
        $this->port = null;
        $this->username = null;
        $this->password = null;
        $this->encryption = null;
        $this->from_name = null;
        $this->from_address = null;
        Artisan::call('optimize:clear');
    }

    public function save()
    {
        $validated = $this->validate([
            'driver' => ['required'],
            'host' => ['required'],
            'port' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'encryption' => ['required'],
            'from_name' => ['required'],
            'from_address' => ['required'],
        ]);

        try {
            if (resolve(\Modules\Setting\Repository\SettingRepository::class)->saveOrUpdate('mails', $validated)) {
                $this->mailConfigured = true;
                return $this->success('Berhasil!', 'Mail berhasil diatur.');
            }

            return $this->error('Oops!', 'Terjadi kesalahan.');
        } catch (\Exception $e) {
            return $this->error('Oops!', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function delete(string $password)
    {
        if (Hash::check($password, Auth::user()->password)) {
            MailModel::first()->delete();
            $this->resetValue();
            $this->mailConfigured = false;
            return $this->success('Berhasil!', 'Konfigurasi berhasil dihapus.');
        }

        return $this->error('', 'Password yang anda masukan salah.');
    }

    public function render()
    {
        return view('setting::automation.livewire.mail', [
            'encryptions' => EncryptionConstant::labels(),
        ]);
    }
}
