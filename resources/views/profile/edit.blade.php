@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Welcome, ') . $user->name, 'nav'=>true, 'sub'=>__('Edit your profile')])
        <li class=""><a href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('profile.edit') }}">{{ __('Edit Profile') }}</a></li>
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <div class="c-sidebar-menu-toggler">
                <h3 class="c-title c-font-uppercase c-font-bold">{{ __('Welcome, '), $user->name }}</h3>
                <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                    <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
                </a>
            </div>
            @include('profile.sidebar',['active'=>'edit'])
        </div>
        <div class="c-layout-sidebar-content ">
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">{{ __('Edit Profile') }}</h3>
                <div class="c-line-left"></div>
            </div>

            <form class="c-shop-form-1">
                <!-- BEGIN: ADDRESS FORM -->
                <div class="">
                    <!-- BEGIN: BILLING ADDRESS -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Country</label>
                            <select class="form-control c-square c-theme">
                                <option value="1">Malaysia</option>
                                <option value="2">Singapore</option>
                                <option value="3">Indonesia</option>
                                <option value="4">Thailand</option>
                                <option value="5">China</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">First Name</label>
                                    <input type="text" class="form-control c-square c-theme" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" class="form-control c-square c-theme" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Address</label>
                            <input type="text" class="form-control c-square c-theme" placeholder="Street Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control c-square c-theme" placeholder="Apartment, suite, unit etc. (optional)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Town / City</label>
                            <input type="text" class="form-control c-square c-theme" placeholder="Town / City">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">State / County</label> <select class="form-control c-square c-theme">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
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
                        </div>
                    </div>
                    <!-- END: BILLING ADDRESS -->
                    <!-- BEGIN: PASSWORD -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Change Password</label>
                            <input type="password" class="form-control c-square c-theme" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Repeat Password</label>
                            <input type="password" class="form-control c-square c-theme" placeholder="Password">
                            <p class="help-block">Hint: The password should be at least six characters long. <br />
                                To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & ).</p>
                        </div>
                    </div>
                    <!-- END: PASSWORD -->
                    <div class="row c-margin-t-30">
                        <div class="form-group col-md-12" role="group">
                            <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Submit</button>
                            <button type="submit" class="btn btn-lg btn-default c-btn-square c-btn-uppercase c-btn-bold">Cancel</button>
                        </div>
                    </div>
                </div>
                <!-- END: ADDRESS FORM -->
            </form>
        </div>
    </div>

@endsection