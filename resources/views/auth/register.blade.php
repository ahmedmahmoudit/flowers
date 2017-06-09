@extends('layouts.master')


@section('content')
    @component('partials.breadcrumb',['title'=>__('Register')])

    @endcomponent
    <div class="c-content-box c-size-lg">
        <div class="container">
            @include('partials.notifications')
            <div class="row">
                <div class="col-md-6 c-padding-20 col-md-offset-3">
                    <div class="panel panel-default c-panel">
                        <div class="panel-body c-panel-body">
                            <div class="c-content-title-1">
                                <h3 class="c-left"><i class="icon-user"></i> {{ __('Don\'t have an account yet?') }}</h3>
                                <div class="c-line-left c-theme-bg"></div>
                                <p>{{ __('Join us and enjoy shopping online today.') }}</p>
                            </div>

                            <form class="c-form-register c-margin-t-20">
                                <div class="form-group">
                                    <label class="control-label">Country</label>
                                    <select name="country_id" class="form-control c-square c-theme">
                                        <option value="1">Malaysia</option>
                                        <option value="2">Singapore</option>
                                        <option value="3">Indonesia</option>
                                        <option value="4">Thailand</option>
                                        <option value="5">China</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('Full Name') }}</label>
                                    <input type="text" name="name" class="form-control c-square c-theme" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('Address') }}</label>
                                    <input type="text" class="form-control c-square c-theme" placeholder="Street Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control c-square c-theme" placeholder="Apartment, suite, unit etc. (optional)">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Town / City</label>
                                    <input type="text" class="form-control c-square c-theme" placeholder="Town / City">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">State / County</label>
                                        <select class="form-control c-square c-theme">
                                            <option value="0">Select an option...</option>
                                            <option value="1">Malaysia</option>
                                            <option value="2">Singapore</option>
                                            <option value="3">Indonesia</option>
                                            <option value="4">Thailand</option>
                                            <option value="5">China</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Postcode / Zip</label>
                                        <input type="text" class="form-control c-square c-theme" placeholder="Postcode / Zip">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Email Address</label>
                                        <input type="email" class="form-control c-square c-theme" placeholder="Email Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Phone</label>
                                        <input type="tel" class="form-control c-square c-theme" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Account Password</label>
                                    <input type="password" class="form-control c-square c-theme" placeholder="Password">
                                </div>
                                <div class="form-group c-margin-t-40">
                                    <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
