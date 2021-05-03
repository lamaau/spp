<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'monthly' => ['nullable'],
            'nominal' => ['required', 'integer'],
            'description' => ['nullable', 'min:3', 'string']
        ];
    }

    /**
     * Field attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'monthly' => 'Bulanan',
            'description' => 'Keterangan'
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
