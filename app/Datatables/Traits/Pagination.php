<?php

namespace App\Datatables\Traits;

trait Pagination
{
    /**
     * Display per page
     *
     * @var boolean
     */
    public $perPageEnabled = true;
    
    /**
     * Displays per page and pagination links.
     *
     * @var bool
     */
    public $paginationEnabled = true;

    /**
     * The options to limit the amount of results per page.
     *
     * @var array
     */
    public $perPageOptions = [10, 25, 50];

    /**
     * Amount of items to show per page.
     *
     * @var integer
     */
    public $perPage = 10;

    /**
     * https://laravel-livewire.com/docs/pagination
     * Resetting Pagination After Changing the perPage.
     */
    public function updatingPerPage(): void
    {
        $this->resetPage();
    }
}
