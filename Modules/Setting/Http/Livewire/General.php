<?php

namespace Modules\Setting\Http\Livewire;

use App\Datatables\Traits\Notify;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use Modules\Setting\Http\Requests\SettingRequest;

class General extends Component
{
    use WithFileUploads,
        Notify;

    public array $levels;
    public object $setting;

    public $name = null;
    public $level = null;
    public $email = null;
    public $phone = null;
    public $fax = null;
    public $code = null;
    public $logo = null;
    public $principal = null;
    public $principal_number = null;
    public $treasurer = null;
    public $treasurer_number = null;
    public $city_name = null;
    public $address = null;

    public function mount()
    {
        $this->setDefault();
    }

    public function updatedLogo()
    {
        $validator = Validator::make(['logo' => $this->logo], [
            'logo' => 'image|max:10000'
        ]);

        if ($validator->fails()) {
            $this->addError('logo', $validator->getMessageBag()->first());
            $this->logo = $this->setting->logo;

            return;
        }

        $this->logo = $this->logo->store('uploads/logo');
    }

    public function setDefault(): void
    {
        $this->name = $this->setting->name;
        $this->level = $this->setting->level;
        $this->email = $this->setting->email;
        $this->phone = $this->setting->phone;
        $this->fax = $this->setting->fax;
        $this->code = $this->setting->code;
        $this->logo = $this->setting->logo;
        $this->principal = $this->setting->principal;
        $this->principal_number = $this->setting->principal_number;
        $this->treasurer = $this->setting->treasurer;
        $this->treasurer_number = $this->setting->treasurer_number;
        $this->city_name = $this->setting->city_name;
        $this->address = $this->setting->address;
    }

    public function save()
    {
        $request = new SettingRequest();
        $validated = $this->validate($request->rules(), [], $request->attributes());
        $validated['logo'] = $this->logo;

        if (resolve(\Modules\Setting\Repository\SettingRepository::class)->saveOrUpdate('settings', $validated)) {
            return $this->success('Berhasil!', 'Berhasil menyimpan pengaturan');
        }
    }

    public function render()
    {
        return view('setting::general.livewire.index');
    }
}
