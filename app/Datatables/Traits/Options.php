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
     * Display add button
     *
     * @var boolean
     */
    public $optionComponentEnabled = true;

    /**
     * Display option component view
     *
     * @var string
     */
    public $optionComponentView = 'datatable::includes.component-action';

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
