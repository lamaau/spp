<div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form wire:submit.prevent='authenticate' class="needs-validation">
                <div class="form-group">
                    <x-inputs.text label="email" name="email" wire:model.lazy='email' />
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <div class="float-right">
                            <a href="#" class="text-small">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <x-inputs.password label="password" name="password" wire:model.lazy='password' />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
