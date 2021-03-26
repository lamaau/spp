<?php

namespace Modules\GoenDataMaster\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'code' => ['required', 'string', 'min:2'],
            'name' => ['required', 'string', 'min:2'],
            'level_id' => ['required', 'string'],
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
            'level_id' => $this->level_id,
            'description' => $this->description,
        ];
    }
}
