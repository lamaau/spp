<?php

namespace App\Datatables\Traits;

trait Checkbox
{
    /** @var string */
    public $checkbox_attribute = 'id';

    /** @var array */
    public $checkbox_values    = [];

    /** @var bool */
    public $checkbox_all = false;

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
     * Updating the checkbox all
     * 
     * @return void
     */
    public function updatingCheckboxAll(): void
    {
        $this->checkbox_values = [];
    }

    /**
     * Update the checkbox values
     * 
     * @return void
     */
    public function updatingCheckboxValues(): void
    {
        $this->checkbox_values = [];
    }

    /**
     * Updatedt the checkbox values
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
