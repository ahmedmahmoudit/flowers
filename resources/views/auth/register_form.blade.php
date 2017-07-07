<div class="col-md-6 col-md-offset-3">

    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label">{{ __('Full Name') }}</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control c-square c-theme" placeholder="{{ __('Full Name') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Email Address') }}</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control c-square c-theme" placeholder="{{ __('Email Address') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Password') }}</label>
        <input type="password" name="password"  class="form-control c-square c-theme" placeholder="{{ __('Password') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Confirm Password') }}</label>
        <input type="password" name="password_confirmation" class="form-control c-square c-theme" placeholder="{{ __('Confirm Password') }}">
    </div>

    <div class="form-group c-margin-t-40">
        <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Register</button>
    </div>
</div>
