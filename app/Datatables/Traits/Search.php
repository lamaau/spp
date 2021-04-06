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
     * Method to search by debounce or lazy
     *
     * @var string
     */
    public $searchUpdateMethod = 'debounce';

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
}
