<form class="" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group has-feedback">
        <input name="email" value="{{old('email')}}" type="email" class="form-control input-lg c-square" id="login-email" placeholder="{{ __('Email') }}">
        <span class="glyphicon glyphicon-user form-control-feedback c-font-grey"></span>
    </div>

    <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control input-lg c-square" id="login-password" placeholder="{{ __('Password') }}">
        <span class="glyphicon glyphicon-lock form-control-feedback c-font-grey"></span>
    </div>

    <div class="form-group">
        <div class="c-checkbox">
            <input name="remember" type="checkbox" id="login-rememberme" class="c-check">
            <label for="login-rememberme" class="c-font-thin c-font-17">
                <span></span>
                <span class="check"></span>
                <span class="box"></span>
                {{ __('Remember me') }}
            </label>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">{{ __('Login') }}</button>
        <a href="javascript:;" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot">{{ __('Forgot your Password ?') }}</a>
    </div>

</form>
