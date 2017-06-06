<div class="modal fade c-content-login-form" id="signup-form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Create An Account</h3>
                <p><span class="red">*</span> are required</p>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="signup-email" class="label">Email<span class="red">*</span></label>
                        <input name="email" type="email" class="form-control input-lg c-square" id="signup-email" placeholder="{{ __('Email') }}">
                    </div>

                    <div class="form-group">
                        <label for="signup-fullname" class="label">Fullname<span class="red">*</span></label>
                        <input name="name" type="email" class="form-control input-lg c-square" id="signup-fullname" placeholder="{{ __('Full Name') }}">
                    </div>

                    <div class="form-group">
                        <label for="login-password" class="label">{{ __('Password') }}<span class="red">*</span></label>
                        <input name="password" type="password" class="form-control input-lg c-square" id="login-password" placeholder="{{ __('Password') }}">
                    </div>

                    <div class="form-group">
                        <label for="login-password" class="label">{{ __('Confirm Password') }}</label>
                        <input name="password_confirmation" type="password" class="form-control input-lg c-square" id="login-password" placeholder="{{ __('Confirm Password') }}">
                    </div>

                    <div class="form-group">
                        <label for="signup-country" class="label">Country</label>
                        <select class="form-control input-lg c-square" id="signup-country">
                            <option value="">{{__('Select Country')}}</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}"
                                        @if($selectedCountry->id === $country->id)
                                        selected
                                        @endif
                                >{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Signup</button>
                        <a href="javascript:;" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">Back To Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>