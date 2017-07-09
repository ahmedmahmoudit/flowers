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
                            <li class="{{ old('role') ? old('role') == '1' ? 'active' : '' : 'active' }}">
                                <a href="#c-tab2-opt1-1" data-toggle="tab">
                                    <span class="fa fa-user-secret" style="font-size: 100px"></span>
                                    <span class="c-title">{{ __('As an Individual') }}</span>
                                </a>
                                <div class="c-arrow"></div>
                            </li>
                            <li class="{{ old('role') && old('role') == '2' ? 'active' : ''  }}">
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


                                        <div class="tab-pane fade in {{ old('role') ? old('role') == '1' ? 'active' : '' : 'active' }} " id="c-tab2-opt1-1">
                                            <div class="c-tab-pane">

                                                <form class="c-form-register c-margin-t-20" method="post" action="{{ route('register') }}" >
                                                    <input type="hidden" value="1" name="role"/>
                                                    @include('auth.register_form')
                                                </form>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade in {{ old('role') && old('role') == '2' ? 'active' : ''  }} " id="c-tab2-opt1-2">
                                            <div class="c-tab-pane">
                                                <form class="c-form-register c-margin-t-20" method="post" action="{{ route('register') }}" >
                                                    <input type="hidden" value="2" name="role"/>
                                                    @include('auth.register_form')
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
