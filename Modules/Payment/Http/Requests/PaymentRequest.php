<?php

namespace Modules\Payment\Http\Requests;

use Modules\Payment\Rules\PaySmaller;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /** @var string|null */
    protected $bill;
    protected $year;
    protected $student;
    protected $month;

    public function __construct(string $bill, string $year, string $student, ?string $month)
    {
        $this->bill = $bill;
        $this->year = $year;
        $this->student = $student;
        $this->month = $month;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pay' => ['required', new PaySmaller($this->bill, $this->year, $this->student, $this->month)],
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
            'pay_date' => 'Tanggal pembayaran',
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
