<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Enums\Religion;
use Illuminate\Validation\Rule;
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
            'nis' => ['nullable'],
            'nisn' => ['nullable'],
            'email' => ['nullable', Rule::unique('students')->ignore($this->id)],
            'phone' => ['required'],
            'religion' => ['required', new Enum(Religion::class)],
            'gender' => ['required', new Enum(Gender::class)]
        ];
    }
}
