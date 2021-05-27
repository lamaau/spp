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
            'logo' => 'Logo Sekolah',
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
            'level' => ['required', 'string'],
            'fax' => ['required', 'min:3', 'string'],
            'principal' => ['required', 'min:5', 'string'],
            'principal_number' => ['required', 'min:17', 'string'],
            'logo' => ['required', 'max:10000', 'mimes:png,jpg,jpeg'],
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
