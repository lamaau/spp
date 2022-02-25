<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Enums\Religion;
use App\Enums\UserStatus;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'nis' => ['required'],
            'nisn' => ['nullable'],
            'phone' => ['nullable'],
            'room' => ['required'],
            'gender' => ['required', new Enum(Gender::class)],
            'religion' => ['required', new Enum(Religion::class)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->id)],
        ];
    }

    public function getUserCredential(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->nis),
            'status' => UserStatus::ACTIVE(),
        ];
    }

    public function getStudentCredential(): array
    {
        return Arr::except($this->validated(), ['name', 'email']);
    }
}
