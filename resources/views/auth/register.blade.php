@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Register an Account'), 'nav'=>true])
        <li class="c-active"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg">
        <div class="c-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-title-1">
                        <h3 class="c-font-34 c-font-center c-font-bold c-font-uppercase c-margin-b-30">
                            {{ __('Choose Registration Type') }}
                        </h3>
                        <div class="c-line-center c-theme-bg"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-tab-2 c-theme c-opt-1">
                        <ul class="nav c-tab-icon-stack c-font-sbold c-font-uppercase">
                            <li class="{{ old('role') ? old('role') == '3' ? 'active' : '' : 'active' }}">
                                <a href="#c-tab2-opt1-1" data-toggle="tab">
                                    <span class="fa fa-user" style="font-size: 100px"></span>
                                    <span class="c-title">{{ __('As an Individual') }}</span>
                                </a>
                                <div class="c-arrow"></div>
                            </li>
                            <li class="{{ old('role') && old('role') == '1' ? 'active' : ''  }}">
                                <a href="#c-tab2-opt1-2" data-toggle="tab">
                                    <span class="fa fa-newspaper-o" style="font-size: 100px"></span>
                                    <span class="c-title">{{ __('As a Company') }}</span>
                                </a>
                                <div class="c-arrow"></div>
                            </li>

                        </ul>


                        <div class="c-tab-content">
                            <div class="c-bg-img-center1" >
                                <div class="container">
                                    <div class="tab-content">

                                        @include('partials.notifications')

                                        <div class="tab-pane fade in {{ old('role') ? old('role') == '3' ? 'active' : '' : 'active' }} " id="c-tab2-opt1-1">
                                            <div class="c-tab-pane">

                                                <form class="c-form-register c-margin-t-20" method="post" action="{{ route('register') }}" >
                                                    <input type="hidden" value="3" name="role"/>

                                                    <div class="col-md-6 col-md-offset-3">

                                                        @include('auth.register_form')

                                                        <div class="form-group c-margin-t-40">
                                                            <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Register</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade in {{ old('role') && old('role') == '1' ? 'active' : ''  }} " id="c-tab2-opt1-2">
                                            <div class="c-tab-pane">
                                                <form class="c-form-register c-margin-t-20" method="post" action="{{ route('register') }}" >
                                                    <input type="hidden" value="1" name="role"/>
                                                    <div class="col-md-6 col-md-offset-3">

                                                        @include('auth.register_form')
                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Minimum Delivery Hours') }} <span class="red">*</span></label>
                                                            <input type="text" name="minimum_delivery_days" value="{{ old('minimum_delivery_days') }}" class="form-control c-square c-theme" placeholder="{{ __('ex: 1') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Start Week Day') }} <span class="red">*</span></label>
                                                            <input type="text" name="start_week_day" value="{{ old('start_week_day') }}" class="form-control c-square c-theme" placeholder="{{ __('Start Week Day') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('End Week Day') }} <span class="red">*</span></label>
                                                            <input type="text" name="end_week_day" value="{{ old('end_week_day') }}" class="form-control c-square c-theme" placeholder="{{ __('End Week Day') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Instagram Username') }} </label>
                                                            <input type="text" name="instagram_username" value="{{ old('instagram_username') }}" class="form-control c-square c-theme" placeholder="{{ __('Full Name') }}">
                                                        </div>
                                                        <div class="form-group c-margin-t-40">
                                                            <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Register</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
