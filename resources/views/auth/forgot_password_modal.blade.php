<div class="modal fade c-content-login-form" id="forget-password-form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Password Recovery</h3>
                <p>{{ __('To recover your password please fill in your email address') }}</p>
                <form>
                    <div class="form-group">
                        <label for="forget-email" class="hide">Email</label>
                        <input type="email" class="form-control input-lg c-square" id="forget-email" placeholder="{{ __('Email') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">{{ __('Submit') }}</button>
                        <a href="javascript:;" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">{{ __('Back To Login') }}</a>
                    </div>
                </form>
            </div>
            <div class="modal-footer c-no-border">
                <span class="c-text-account">{{ __('Don\'t Have An Account Yet ?') }}</span>
                <a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">{{ __('Signup!') }}</a>
            </div>
        </div>
    </div>
</div>