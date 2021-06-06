<?php

namespace App\Datatables\Traits;

trait Search
{
    /**
     * Initial search
     *
     * @var null
     */
    public $searchModel = null;

    /**
     * Whethever or not searching is enabled
     *
     * @var boolean
     */
    public $searchEnabled = true;

    /**
     * false = disabled
     * int = Amount of time in ms to wait to send the search query and refresh the table.
     *
     * @var int
     */
    public $searchDebounce = 750;

    /**
     * https://laravel-livewire.com/docs/pagination
     * Resetting Pagination After Filtering Data.
     */
    public function updatingSearchModel(): void
    {
        $this->resetPage();

        // if (property_exists($this, 'checkbox_all') && property_exists($this, 'checkbox_values')) {
        //     $this->checkbox_all = false;
        //     $this->checkbox_values = [];
        // }
    }
}
