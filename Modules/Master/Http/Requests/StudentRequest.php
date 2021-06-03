<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StudentRequest extends FormRequest
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'nis' => 'Nomor induk siswa',
            'nisn' => 'Nomor induk siswa nasional',
            'sex' => 'Jenis Kelamin',
            'email' => 'Alamat email',
            'phone' => 'Nomor HP',
            'religion' => 'Agama',
            'room_id' => 'Kelas',
            'force' => 'Angkatan',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($id = null): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'nis' => ['nullable', 'min:11', Rule::unique('students')->ignore($id)],
            'nisn' => ['nullable', 'min:11', Rule::unique('students')->ignore($id)],
            'sex' => ['required'],
            'email' => ['nullable', 'email', Rule::unique('students')->ignore($id)],
            'phone' => ['nullable', 'min:11'],
            'religion' => ['required'],
            'room_id' => ['required'],
        ];
    }

    /**
     * Get the data
     *
     * @return array
     */
    public function data(): array
    {
        return [
            'name' => $this->name,
            'nis' => $this->nis,
            'nisn' => $this->nisn,
            'sex' => $this->sex,
            'email' => $this->email,
            'phone' => $this->phone,
            'religion' => $this->religion,
            'room_id' => $this->room_id,
            'created_by' => Auth::id(),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }
}
