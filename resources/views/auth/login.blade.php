@extends('layouts.master')

@section('content')

    <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold">{{ __('Login') }}</h3>
            </div>
        </div>
    </div>

    <div class="c-content-box c-size-lg">
        <div class="container">
            @include('partials.notifications')
            <div class="row">
                <div class="col-md-6 c-padding-20 col-md-offset-3">
                    @include('auth.login_form')
                    <hr>
                    <div class="modal-footer c-no-border">
                        <span class="c-text-account">{{ __("Don't Have An Account Yet ?") }}</span>
                        <a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">{{ __('Signup!') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
