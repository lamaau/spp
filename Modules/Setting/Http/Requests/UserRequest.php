<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'Nama',
            'passwordConfirmation' => 'Konfirmasi password',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($required = true, $id = null)
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($id)],
            'password' => $required ? ['required', 'min:6'] : ['nullable'],
            'passwordConfirmation' => [Rule::requiredIf($required), 'same:password'],
            'role' => ['required'],
            'status' => ['required'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
