<?php

namespace App\Datatables\Traits;

trait Checkbox
{

    /** @var checkbox */
    public $checkbox_attribute = 'id';
    public $checkbox_values    = [];
    public $checkbox           = false;
    public $checkbox_all       = false;

    /**
     * Reset the checkbox
     * 
     * @return void
     */
    public function resetCheckbox(): void
    {
        $this->checkbox_all = false;
        $this->checkbox_values = [];
    }

    /**
     * Updated the checkbox values
     * 
     * @return void
     */
    public function updatedCheckboxAll(): void
    {
        $this->checkbox_values = [];

        if ($this->checkbox_all) {
            $this->models()->each(function ($model) {
                $this->checkbox_values[] = (string) $model->{$this->checkbox_attribute};
            });
        }
    }
}
