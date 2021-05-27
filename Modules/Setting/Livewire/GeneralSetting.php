<?php

namespace Modules\Setting\Livewire;

use Livewire\Component;
use Modules\Setting\Http\Requests\SettingRequest;

class GeneralSetting extends Component
{
    public array $levels;
    public object $setting;

    public string $name;
    public string $level;
    public string $email;
    public string $phone;
    public string $fax;
    public string $code;
    public string $logo;
    public string $principal;
    public string $principal_number;
    public string $address;

    public function mount()
    {
        $this->setDefault();
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
        $this->address = $this->setting->address;
    }

    public function save()
    {
        $request = new SettingRequest();
        $validated = $this->validate($request->rules(), [], $request->attributes());

        dd($validated);
    }

    public function render()
    {
        return view('setting::livewire.general-setting');
    }
}
