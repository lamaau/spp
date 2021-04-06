<?php

namespace App\DataTables;

use Illuminate\Support\Str;

/**
 * @property string $heading
 * @property string $attribute
 * @property boolean $searchable
 * @property boolean $sortable
 * @property callable $sortCallback
 * @property string $view
 */
class Column
{
    protected $heading;
    protected $attribute;
    protected $searchable = false;
    protected $sortable   = false;
    protected $sortCallback;
    protected $view;

    public function __construct($heading, $attribute)
    {
        $this->heading   = $heading;
        $this->attribute = $attribute ?? Str::snake(Str::lower($heading));
    }

    /**
     * Get property
     *
     * @param string $property
     * @return void
     */
    public function __get($property)
    {
        return $this->$property;
    }

    /**
     * Make column
     *
     * @param string $heading
     * @param string $attribute
     * @return void
     */
    public static function make($heading = null, $attribute = null)
    {
        return new static($heading, $attribute);
    }

    /**
     * Searchable
     *
     * @return void
     */
    public function searchable()
    {
        $this->searchable = true;
        return $this;
    }

    /**
     * Sortable
     *
     * @return void
     */
    public function sortable()
    {
        $this->sortable = true;
        return $this;
    }

    /**
     * Sort using
     *
     * @param callable $callback
     * @return void
     */
    public function sortUsing(callable $callback)
    {
        $this->sortCallback = $callback;
        return $this;
    }

    /**
     * View
     *
     * @param [type] $view
     * @return void
     */
    public function view($view)
    {
        $this->view = $view;
        return $this;
    }
}
