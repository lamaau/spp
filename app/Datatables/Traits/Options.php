<?php

namespace App\Datatables\Traits;

/**
 * Trait Options.
 */
trait Options
{
    /**
     * Display loading when request
     *
     * @var boolean
     */
    public $loadingEnabled = true;

    /**
     * Left table component
     *
     * @var boolean
     */
    public $leftTableComponent = false;

    /**
     * Right table component
     * 
     * @var boolean
     */
    public $rightTableComponent = false;

    /**
     * Default cog list
     *
     * @var array
     */
    public $defaultCogLists = [
        'import',
        'download pdf',
        'download excel',
        'download format',
    ];
}
