<?php

namespace Modules\GoenDataMaster\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Install validation attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name'             => 'Nama sekolah',
            'email'            => 'Email sekolah',
            'phone'            => 'Telpon sekolah',
            'fax'              => 'Fax sekolah',
            'code'             => 'Kode sekolah',
            'level'            => 'Tingkat sekolah',
            'principal'        => 'Kepala sekolah',
            'principal_number' => 'Nip',
            'province'         => 'Provinsi',
            'city'             => 'Kabupaten',
            'district'         => 'Kecamatan',
            'sub_district'     => 'Kelurahan',
            'expired_at'       => 'Plan',
            'module'           => 'Modul',
            'detail_address'   => 'Detail alamat',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'             => ['required', 'string', 'min:5'],
            'email'            => ['required', 'email', 'unique:settings'],
            'phone'            => ['required', 'string', 'min:8'],
            'fax'              => ['required', 'string', 'min:8'],
            'code'             => ['required', 'string', 'min:8'],
            'level'            => ['required', 'string'],
            'principal'        => ['required', 'string'],
            'principal_number' => ['required', 'min:8'],
            'province'         => ['required', 'string'],
            'city'             => ['required', 'string'],
            'district'         => ['required', 'string'],
            'sub_district'     => ['required', 'string'],
            'module'           => ['required', 'string'],
            'expired_at'       => ['required', 'string'],
            'detail_address'   => ['required', 'string', 'min:4'],
        ];
    }

    /**
     * Get the value from request
     *
     * @return array
     */
    public function data(): array
    {
        return [
            'name'             => $this->name,
            'email'            => $this->email,
            'phone'            => $this->phone,
            'fax'              => $this->fax,
            'code'             => $this->code,
            'level'            => $this->level,
            'principal'        => $this->principal,
            'principal_number' => $this->principal_number,
            'province'         => $this->province,
            'city'             => $this->city,
            'district'         => $this->district,
            'sub_district'     => $this->sub_district,
            'modules'           => $this->module,
            'expired_at'       => $this->expired_at,
            'detail_address'   => $this->detail_address,
        ];
    }
}
