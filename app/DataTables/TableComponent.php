<?php

namespace App\DataTables;

use App\DataTables\Traits\ThanksYajra;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

abstract class TableComponent extends Component
{
    use WithPagination, ThanksYajra;

    /** pool / autorefresh */
    public $pool      = false;
    public $pool_time = 750;

    /** @var string search && table class */
    public $search = '';
    public $table_id;
    public $thead_class;
    public $table_class;

    /** @var string sorting table */
    public $per_page       = 10;
    public $sort_attribute = 'created_at';
    public $sort_direction = 'desc';

    /** @var checkbox */
    public $checkbox_attribute = 'id';
    public $checkbox_values    = [];
    public $checkbox           = false;
    public $checkbox_all       = false;

    /** @var string paginate theme */
    protected $paginationTheme = 'tailwind';

    /**
     * Override the search method
     *
     * @return mixed
     */
    abstract public function search($models);

    /**
     * Sorting table
     *
     * @return array
     */
    public function sorting(): array
    {
        return [
            'per_page'  => $this->per_page,
            'attribute' => $this->sort_attribute,
            'direction' => $this->sort_direction,
        ];
    }

    /**
     * Eloquent simple sortable
     *
     * @return Builder
     */
    public function models(): Builder
    {
        $models = $this->query();

        if ($this->search) {
            $this->search($models);
        }

        if (Str::contains($this->sort_attribute, '.')) {
            $relationship   = $this->relationship($this->sort_attribute);
            $sort_attribute = $this->attribute($models, $relationship->name, $relationship->attribute);
        } else {
            $sort_attribute = $this->sort_attribute;
        }

        if (($column = $this->getColumnByAttribute($this->sort_attribute)) !== null && is_callable($column->sortCallback)) {
            return app()->call($column->sortCallback, ['models' => $models, 'sort_attribute' => $sort_attribute, 'sort_direction' => $this->sort_direction]);
        }

        return $models->orderBy($sort_attribute, $this->sort_direction);
    }

    /**
     * Mount table properties
     *
     * @return void
     */
    public function mount(): void
    {
        $this->setTableProperties();
    }

    /**
     * Set Table properties
     *
     * @return void
     */
    public function setTableProperties(): void
    {
        foreach (['table_class', 'thead_class', 'checkbox', 'per_page'] as $property) {
            $this->$property = $this->$property;
        }
    }

    /**
     * Update page when search
     *
     * @return void
     */
    public function updatedSearch()
    {
        $this->gotoPage(1);
    }

    /**
     * Update page when value in per page is changed
     *
     * @return void
     */
    public function updatedPerPage()
    {
        $this->gotoPage(1);
    }

    /**
     * Get column attributes
     *
     * @param  string $attribute
     * @return null|App\Http\Livewire\LiveTable\Column
     */
    protected function getColumnByAttribute(string $attribute)
    {
        foreach ($this->columns() as $col) {
            if ($col->attribute === $attribute) {
                return $col;
            }
        }

        return null;
    }

    /**
     * Sortable
     * 
     * @param  string $attribute
     * @return void
     */
    public function sort($attribute): void
    {
        if ($this->sort_attribute != $attribute) {
            $this->sort_direction = 'asc';
        } else {
            $this->sort_direction = $this->sort_direction == 'asc' ? 'desc' : 'asc';
        }

        $this->sort_attribute = $attribute;
    }
}
