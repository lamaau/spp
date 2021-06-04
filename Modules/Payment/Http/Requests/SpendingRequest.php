<?php

namespace Modules\Payment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Payment\Rules\SpendingAboveIncome;

class SpendingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'nominal' => ['required', new SpendingAboveIncome()],
            'spending_date' => ['required'],
            'description' => ['nullable', 'min:5']
        ];
    }

    /**
     * Get validate attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'nominal' => 'Nominal',
            'spending_date' => 'Tanggal Pengeluaran',
            'description' => 'Keterangan'
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
}