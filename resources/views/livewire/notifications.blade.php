<div>
    <div class="row">
        <div class="col-12">
            <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-body p-0">
                    @foreach ($notifications as $notification)
                        <div
                            class="p-3 d-flex align-items-center border-bottom osahan-post-header {{ is_null($notification->read_at) ? 'bg-light' : '' }}">
                            <div class="dropdown-list-icon mr-3 text-white {{ $notification->data['background'] }}">
                                <i class="{{ $notification->data['icon'] }}"></i>
                            </div>
                            <div class="font-weight-bold mr-3">
                                <div class="text-truncate">{{ $notification->data['title'] }}</div>
                                @if ($notification->type === 'App\Notifications\ImportFailedNotification')
                                    @php
                                        $collection = collect($notification->data['message'])->first();
                                    @endphp
                                    <span class="small">{{ $collection['errors'][0] }}</span>
                                    <span class="small d-block">Value: {{ $collection['values'][0] }}</span>
                                @endif

                                @if ($notification->type === 'App\Notifications\ImportSuccessNotification')
                                    <span class="small">Nama file:
                                        {{ document_filename($notification->data['message']['filename']) }}</span>
                                @endif

                                <small
                                    class="text-muted pt-1 d-block">{{ $notification->created_at->diffForHumans() }}
                                </small>
                            </div>
                            <span class="ml-auto mb-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button wire:click.prevent='delete("{{ $notification->id }}")'
                                            class="dropdown-item" type="button">
                                            Hapus
                                        </button>
                                        <button wire:click.prevent='readed("{{ $notification->id }}")'
                                            class="dropdown-item" type="button">
                                            Tandai dibaca
                                        </button>
                                    </div>
                                </div>
                                <br />
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
