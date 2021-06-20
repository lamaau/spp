<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Constants\SchoolLevel;
use Livewire\WithFileUploads;

class Install extends Component
{
    use WithFileUploads;

    /** @var null|string */
    public $name;
    public $code;
    public $email;
    public $phone;
    public $fax;
    public $level;
    public $logo;
    public $principal;
    public $principal_number;
    public $treasurer;
    public $treasurer_number;
    public $city_name;
    public $address;

    public int $totalStep = 3;
    public int $currentStep = 1;

    public array $validated;

    public array $title = [
        1 => 'Informasi Sekolah',
        2 => 'Alamat Sekolah',
        3 => 'Kepala Sekolah dan Bendahara'
    ];

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'image|max:1024',
        ]);
    }

    public function firstStepSubmit()
    {
        $validated = $this->validated = $this->validate([
            'name' => ['required'],
            'code' => ['required', 'unique:settings'],
            'email' => ['required', 'email', 'unique:settings'],
            'phone' => ['required'],
            'fax' => ['required'],
            'level' => ['required'],
            'logo' => ['required']
        ]);

        $this->validated = array_merge($this->validated, $validated);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validated = $this->validate([
            'city_name' => ['required'],
            'address' => ['required'],
        ]);

        $this->validated = array_merge($this->validated, $validated);

        $this->currentStep = 3;
    }

    public function submitForm()
    {
        $validated = $this->validate([
            'principal' => ['required'],
            'principal_number' => ['required'],
            'treasurer' => ['required'],
            'treasurer_number' => ['nullable'],
        ]);

        $validated = array_merge($this->validated, $validated);

        $logo = $validated['logo']->store('uploads/logo');
        $validated['logo'] = $logo;

        if (resolve(\Modules\Setting\Repository\SettingRepository::class)->saveOrUpdate('settings', $validated)) {
            return redirect()->route('dashboard');
        }

        return $this->emit('error');
    }

    public function prevStep()
    {
        $this->currentStep--;
    }

    public function nextStep()
    {
        if ($this->currentStep < $this->totalStep) {
            $this->currentStep++;
        }
    }

    public function changeStep(int $step)
    {
        $this->currentStep = $step;
    }

    public function render()
    {
        return view('livewire.auth.install', [
            'levels' => SchoolLevel::labels(),
        ])->extends('layouts.auth', ['title' => 'Atur Aplikasi Anda']);
    }
}
