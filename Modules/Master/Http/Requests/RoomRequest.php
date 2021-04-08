<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    /**
     * Request attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama Kelas',
            'code' => 'Kode Kelas',
            'description' => 'Keterangan',
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
            'name' => ['required', 'unique:rooms', 'string'],
            'code' => ['required', 'unique:rooms', 'string'],
            'description' => ['nullable', 'min:5'],
        ];
    }

    public function data(): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
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
