<div>
    <li class="dropdown dropdown-list-toggle">
        <a href="#" data-toggle="dropdown"
            class="nav-link notification-toggle nav-link-lg {{ count($notifications) >= 1 ? 'beep' : '' }}">
            <i class="far fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifikasi
                <div class="float-right">
                    <a href="#" wire:click.prevent='markAsRead'>
                        <span>Tandai Semua Telah Dibaca</span>
                    </a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons" style="overflow: hidden; outline: none;">
                @forelse ($notifications as $notification)
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="text-white dropdown-item-icon {{ $notification->data['background'] }}">
                            <i class="{{ $notification->data['icon'] }}"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <p class="text-capitalize">
                                {{ $notification->data['title'] }}
                                {{-- {{ strtoupper(document_filename($notification->data['uploaded']['filename'])) }} --}}
                            </p>
                            <div class="time text-primary">{{ $notification->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                @empty
                    <a href="#" class="dropdown-item" style="display: block!important; padding: 10px 0;">
                        <div class="dropdown-item-desc" style="text-align: center!important;">
                            <p class="text-capitalize">
                                Semua Telah Dibaca
                            </p>
                        </div>
                    </a>
                @endforelse
            </div>
            <div class="text-center dropdown-footer">
                <a href="{{ route('notifications') }}">Lihat Semua <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </li>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Pusher.logToConsole = true;
                Echo.private('Modules.Master.Entities.User.' + "{{ auth()->user()->id }}")
                    .notification((e) => {
                        Livewire.emit('broadcaster');
                    });
            });

        </script>
    @endpush
</div>
