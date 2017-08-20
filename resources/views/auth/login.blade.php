@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Login'), 'nav'=>true])
        <li class="c-active"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg">
        <div class="container">
            @include('partials.notifications')
            <div class="row">
                <div class="col-md-6 c-padding-20 col-md-offset-3">
                    <div class="panel panel-default c-panel">
                        <div class="panel-body c-panel-body">
                            <div class="c-content-title-1">
                                <h3 class="c-left"><i class="icon-user"></i> {{ __('Login to your account') }}</h3>
                            </div>
                            <div class="c-form-register c-margin-t-20">
                                @include('auth.login_form')
                            </div>
                            <hr>
                            <div class="modal-footer c-no-border">
                                <span class="c-text-account">{{ __("Dont Have An Account Yet ?") }}</span>
                                <a href="{{ route('register') }}" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">{{ __('Signup') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
