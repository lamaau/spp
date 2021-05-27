<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Constants\SchoolLevel;
use Modules\Master\Entities\Setting;
use App\Http\Livewire\Traits\Regional;

class Install extends Component
{
    use Regional;

    /** @var null|string */
    public $name;
    public $code;
    public $email;
    public $phone;
    public $fax;
    public $level;
    public $principal;
    public $principal_number;
    public $treasurer;
    public $treasurer_number;

    public int $totalStep = 3;
    public int $currentStep = 1;

    public array $validated;

    public function mount()
    {
        $this->provinces = $this->getRegional('provinces');
    }

    public function firstStepSubmit()
    {
        $validated = $this->validated = $this->validate([
            'name' => ['required'],
            'code' => ['required', 'unique:settings'],
            'email' => ['required', 'email', 'unique:settings'],
            'phone' => ['required'],
            'fax' => ['required'],
            'level' => ['required']
        ]);

        $this->validated = array_merge($this->validated, $validated);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validated = $this->validate([
            'province' => ['required'],
            'city' => ['required'],
            'district' => ['required'],
            'subdistrict' => ['required'],
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

        Setting::create($validated);
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
