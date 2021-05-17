<?php

namespace Modules\Payment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pay' => ['required'],
            'pay_date' => ['required'],
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
            'pay' => 'Nominal',
            'pay_date' => 'Tanggal bayar',
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
