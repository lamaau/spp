<div>
    <div class="alert alert-primary alert-has-icon" style="display: none;">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">Berhasil</div>
            Email verifikasi telah dikiri, harap periksa folder spam.
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-body">
            <p>Tautan baru telah dikirim ke alamat email anda.</p>
            <p class="mt-3">
                Jika anda tidak menerima email, <a href="#" wire:click.prevent="resend" class="text-info">klik
                    disini</a> untuk mendapatkan email baru.
            </p>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @endpush

    @push('scripts')
        <script type="text/javascript">
            Livewire.on('resent', () => {
                element = document.querySelector('.alert');
                element.style.display = 'block';

                setTimeout(function() {
                    element.style.display = 'none';
                }, 5000);
            });

        </script>
    @endpush
</div>
