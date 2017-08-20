<div class="modal fade c-content-login-form" id="login-form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">{{ __('Login') }}</h3>
                @include('auth.login_form')
            </div>
            <div class="modal-footer c-no-border">
                <span class="c-text-account">{{ __("Dont Have An Account Yet ?") }}</span>
                <a href="{{ route('register') }}" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">{{ __('Signup') }}</a>
            </div>
        </div>
    </div>
</div>