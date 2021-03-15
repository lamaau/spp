<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => ['required', 'string', 'min:1', Rule::unique('levels')->ignore(request()->route('id'))],
            'name' => ['required', 'string', 'min:1', Rule::unique('levels')->ignore(request()->route('id'))],
            'description' => ['required', 'string', 'min:5'],
        ];
    }

    /**
     * Get data from request
     *
     * @return array
     */
    public function data(): array
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
