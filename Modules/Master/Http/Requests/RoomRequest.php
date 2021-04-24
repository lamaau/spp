<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Validation\Rule;
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
            'description' => 'Keterangan',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(string $id = null): array
    {
        return [
            'name' => ['required', Rule::unique('rooms')->ignore($id)],
            'description' => ['nullable', 'min:5'],
        ];
    }

    public function data(): array
    {
        return [
            'name' => $this->name,
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
