<div class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <form>
                        <div class="card-body mt-4">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group custom-select-icon" wire:ignore>
                                        <select class="custom-select" id="search-student" wire:model='student'>
                                            <option></option>
                                            @foreach ($students as $item)
                                                <option value="{{ $item->id }}">
                                                    @if ($item->nis)
                                                        {{ $item->name }} - {{ $item->nis }}
                                                    @else
                                                        {{ $item->name }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="form-group custom-select-icon" wire:ignore>
                                        <select class="custom-select" id="search-bill" wire:model='bill'>
                                            <option></option>
                                            @foreach ($bills as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <button wire:click.prevent='search' type="button" class="btn btn-primary"
                                        style="padding: 8px 30px;"
                                        {{ is_null($student) || is_null($bill) ? 'disabled' : '' }}>
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (!empty($this->results))
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Card Header</h4>
                        </div>
                        <div class="card-body">
                            <p>Card <code>.card-primary</code></p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#search-bill').select2({
                    placeholder: 'Cari tagihan...',
                });

                $('#search-student').select2({
                    placeholder: 'Cari siswa...',
                });

                $('#search-bill').on('change', (e) => {
                    @this.set('bill', e.target.value);
                });

                $('#search-student').on('change', (e) => {
                    @this.set('student', e.target.value);
                });
            });

            document.addEventListener("DOMContentLoaded", () => {
                Livewire.hook('message.processed', (message, component) => {
                    $('#seearch-bill').select2();
                    $('#seearch-student').select2();
                })
            });

        </script>
    @endpush
</div>
