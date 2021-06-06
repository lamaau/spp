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
     * Card header form table component
     *
     * @var boolean
     */
    public $cardHeaderForm = false;
    
    /**
     * Card header action table component
     * 
     * @var boolean
     */
    public $cardHeaderAction = false;
}
