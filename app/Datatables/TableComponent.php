<?php

namespace App\Datatables;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Datatables\Traits\Table;
use App\Datatables\Traits\Yajra;
use App\Datatables\Traits\Search;
use App\Datatables\Traits\Options;
use App\Datatables\Traits\Sorting;
use App\Datatables\Traits\Checkbox;
use App\Datatables\Traits\Pagination;
use Illuminate\Database\Eloquent\Builder;

abstract class TableComponent extends Component
{
    use WithPagination,
        Pagination,
        Checkbox,
        Sorting,
        Options,
        Search,
        Table,
        Yajra;

    /**
     * Table title
     *
     * @var null
     */
    public $title;

    /**
     * Default pagination theme
     *
     * @var string
     */
    public $paginationTheme = 'bootstrap';

    /**
     * Query for the table
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    abstract public function query(): Builder;

    /**
     * Table columns
     *
     * @return array
     */
    abstract public function columns(): array;

    /**
     * View of the table component
     *
     * @return string
     */
    public function view(): string
    {
        return 'datatable::table-component';
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view($this->view(), [
            'title'   => $this->title,
            'columns' => $this->columns(),
            'models'  => $this->paginationEnabled ? $this->models()->paginate($this->perPage) : $this->models()->get(),
        ]);
    }

    /**
     * @return Builder
     */
    public function models(): Builder
    {
        $builder = $this->query();

        if ($this->searchEnabled && !is_null($this->searchModel)) {
            $builder->where(function (Builder $builder) {
                foreach ($this->columns() as $column) {
                    if ($column->isSearchable()) {
                        if (is_callable($column->getSearchCallback())) {
                            $builder = app()->call($column->getSearchCallback(), ['builder' => $builder, 'term' => trim($this->searchModel)]);
                        } elseif (Str::contains($column->getAttribute(), '.')) {
                            $relationship = $this->relationship($column->getAttribute());

                            $builder->orWhereHas($relationship->name, function (Builder $builder) use ($relationship) {
                                $builder->where($relationship->attribute, 'like', '%' . trim($this->searchModel) . '%');
                            });
                        } else {
                            $builder->orWhere($builder->getModel()->getTable() . '.' . $column->getAttribute(), 'like', '%' . trim($this->searchModel) . '%');
                        }
                    }
                }
            });
        }

        if (($column = $this->getColumnByAttribute($this->sortField)) !== false && is_callable($column->getSortCallback())) {
            return app()->call($column->getSortCallback(), ['builder' => $builder, 'direction' => $this->sortDirection]);
        }

        return $builder->orderBy($this->getSortField($builder), $this->sortDirection);
    }
}
