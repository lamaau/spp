<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function attributes(): array
    {
        return [
            'name' => 'Nama Sekolah',
            'code' => 'Kode Sekolah',
            'level' => 'Tingkat Sekolah',
            'fax' => 'Fax Sekolah',
            'principal' => 'Kepala Sekolah',
            'principal_number' => 'NIP Kepala Sekolah',
            'address' => 'Alamat',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'string'],
            'code' => ['required', 'min:3', 'string'],
            'level' => ['required'],
            'fax' => ['required', 'min:3', 'string'],
            'principal' => ['required', 'min:5', 'string'],
            'principal_number' => ['required', 'min:9', 'string'],
            'treasurer' => ['required', 'min:5', 'string'],
            'treasurer_number' => ['nullable', 'min:9', 'string'],
            'city_name' => ['required', 'min:3', 'string'],
            'address' => ['required', 'min:3', 'string'],
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
