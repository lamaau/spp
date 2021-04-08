<div>
    @include('datatable::includes.options')

    <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
            <table class="min-w-full leading-normal">
                @include('datatable::includes.thead')

                @if ($models->isEmpty())
                    @include('datatable::includes.empty')
                @else
                    @include('datatable::includes.data')
                @endif

                </tbody>
            </table>
            @includeWhen($paginationEnabled, 'datatable::includes.pagination')
        </div>
    </div>

</div>
