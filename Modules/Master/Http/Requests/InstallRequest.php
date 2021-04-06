<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallRequest extends FormRequest
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

    public function data(): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
            'level' => $this->level,
            'fax' => $this->fax,
            'principal' => $this->principal,
            'principal_number' => $this->principal_number,
            'logo' => $this->logo,
            'address' => $this->address,
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
