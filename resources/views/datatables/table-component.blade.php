<div>
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="py-3 border-0 card-header d-flex align-items-center">
                    @include('datatable::includes.options')
                </div>

                <div class="p-0 card-body">
                    <table class="table mb-0 table-bordered">
                        <thead>
                            @include('datatable::includes.columns')
                        </thead>
                        <tbody>
                            @includeWhen($models->isEmpty(), 'datatable::includes.empty')
                            @includeWhen($models->isNotEmpty(), 'datatable::includes.data')
                        </tbody>
                    </table>
                </div>

                <div class="card-footer bg-whitesmoke d-flex align-items-center">
                    {{ $models->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
