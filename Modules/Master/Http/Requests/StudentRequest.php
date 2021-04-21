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
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'nisn' => ['required', 'string', 'min:4', Rule::unique('students')->ignore(request()->route('id'))],
            'sex' => ['required'],
            'email' => ['required', 'email', Rule::unique('students')->ignore(request()->route('id'))],
            'phone' => ['nullable', 'min:11', 'string'],
            'religion' => ['required', 'string'],
            'status' => ['required'],
            'force' => ['required'],
            'room_id' => ['required', 'string'],
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
            'nisn' => $this->nisn,
            'sex' => $this->sex,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'religion' => $this->religion,
            'room_id' => $this->room_id,
            'force' => $this->force,
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
