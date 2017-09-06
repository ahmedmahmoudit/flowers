@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Contact'), 'nav'=>true])
        <li class="c-active">{{ __('Contact') }}</li>
    @endcomponent

    <div class="c-content-box c-size-lg c-bg-white-1">
        <div class="container">
            @include('partials.notifications')
            <div class="row">
                <div class="col-sm-12 col-sm-offset-3">
                    <div class="row">

                        <div class="col-sm-6 inner-right-sm">

                            <form id="contactform" class="forms" action="{{ route('contact.post') }}" method="post">
                                {!! csrf_field() !!}
                                <div class="c-contact">
                                    <div class="c-content-title-1">
                                        <h3 class="c-font-uppercase c-font-bold">{{ __('Contact Us') }}</h3>
                                        <div class="c-line-left"></div>
                                    </div>
                                        <div class="form-group">
                                            <input type="text" value="{{ old('name') }}" name="name" placeholder="{{ __('Name') }}" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="{{ old('mobile') }}" name="email" placeholder="{{ __('Email') }}" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="8" name="body" placeholder="{{ __('Comment') }}" class="form-control c-theme c-square input-lg">
                                                {{ old('body') }}
                                            </textarea>
                                        </div>

                                        <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">{{ __('Send') }}</button>
                                </div>

                            </form>

                            <div id="response"></div>

                        </div><!-- ./col -->


                    </div><!-- /.row -->
                </div><!-- /.col -->
            </div>
        </div>
    </div>

@endsection