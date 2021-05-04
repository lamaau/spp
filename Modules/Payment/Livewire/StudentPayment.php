<?php

namespace Modules\Payment\Livewire;

use Livewire\Component;
use Modules\Master\Entities\Bill;
use Modules\Master\Entities\Student;

class StudentPayment extends Component
{
    /** @var object student object from controller */
    public $bills;
    public $students;

    /** @var string */
    public $bill = null;
    public $student = null;

    public $results = null;

    public function search()
    {
        $bill = Bill::query()->where('id', $this->bill)->first();
        $student = Student::query()->where('id', $this->student)->first();

        $this->results = ['bill' => $bill, 'student' => $student];
    }

    public function render()
    {
        return view('payment::livewire.payment');
    }
}
