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
                            <h4>Atur Ulang Kata Sandi</h4>
                        </div>

                        <div class="card-body">
                            @if ($emailSentMessage)
                                <div class="alert alert-primary alert-has-icon">
                                    <div class="alert-body">
                                        {{ $emailSentMessage }}
                                    </div>
                                </div>
                            @endif

                            <form wire:submit.prevent='sendResetPasswordLink' class="needs-validation">
                                <div class="form-group">
                                    <x-inputs.text required label="email" name="email" wire:model.defer='email' />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        <span wire:loading.remove>Kirim</span> <span wire:loading>Loading...</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
