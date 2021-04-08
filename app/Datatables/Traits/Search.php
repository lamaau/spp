<?php

namespace App\Datatables\Traits;

trait Search
{
    /**
     * Initial search
     *
     * @var string
     */
    public $search = '';

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
    public $searchDebounce = 350;

    /**
     * https://laravel-livewire.com/docs/pagination
     * Resetting Pagination After Filtering Data.
     */
    public function updatingSearch(): void
    {
        $this->resetPage();
    }
}
