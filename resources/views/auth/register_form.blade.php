
{{ csrf_field() }}

<div class="form-group">
    <label class="control-label">{{ __('Full Name') }} <span class="red">*</span></label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control c-square c-theme" placeholder="{{ __('Full Name') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('Email') }} <span class="red">*</span></label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control c-square c-theme" placeholder="{{ __('Email') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('Password') }} <span class="red">*</span></label>
    <input type="password" name="password"  class="form-control c-square c-theme" placeholder="{{ __('Password') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('Confirm Password') }} <span class="red">*</span></label>
    <input type="password" name="password_confirmation" class="form-control c-square c-theme" placeholder="{{ __('Confirm Password') }}">
</div>


