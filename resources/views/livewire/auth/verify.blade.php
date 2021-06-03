<div>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <x-logo />
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Verifikasi Akun</h4>
                        </div>

                        <div class="card-body">
                            <div class="alert alert-primary alert-has-icon" style="display: none;">
                                <div class="alert-body">
                                    Email verifikasi telah dikirim, harap periksa folder spam.
                                </div>
                            </div>

                            <p>Tautan baru telah dikirim ke alamat email anda.</p>
                            <p class="mt-3">
                                Jika anda tidak menerima email, <a href="#" wire:click.prevent="resend"
                                    class="text-info">klik
                                    disini</a> untuk mendapatkan email baru.
                            </p>
                        </div>
                    </div>
                    <div wire:loading wire:loading.flex>
                        Loading..
                    </div>
                </div>
            </div>
        </div>
    </section>
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
