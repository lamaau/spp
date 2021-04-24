<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SchoolYearRequest extends FormRequest
{
    /**
     * Field attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'year' => 'Tahun ajaran',
            'description' => 'Keterangan'
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
            'year' => ['required', Rule::unique('school_years')->ignore($id)->whereNull('deleted_at')],
            'description' => ['nullable', 'min:3']
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
