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
                                            <input type="text" placeholder="{{ __('Name') }}" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="{{ __('Email') }}" class="form-control c-square c-theme input-lg">
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="8" name="body" placeholder="{{ __('Comment') }}" class="form-control c-theme c-square input-lg"></textarea>
                                        </div>

                                        <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">{{ __('Send') }}</button>
                                </div>

                            </form>

                            <div id="response"></div>

                        </div><!-- ./col -->

                        {{--<div class="col-sm-6 inner-left-sm border-left">--}}

                        {{--<h2>No Problem Learning</h2>--}}
                        {{--<h3>Marketing is Managed by Ideas Owners Co</h3>--}}
                        {{--<ul class="contacts">--}}
                        {{--<li>--}}
                        {{--<p>--}}
                        {{--<i class="fa fa-map-marker"></i>--}}
                        {{--IdeasOwners Co.--}}
                        {{--Kuwait - Sharq - Khaled ibn Al-waleed Street--}}
                        {{--Sawaber6 Tower - Floor 3 - Office 6--}}
                        {{--</p>--}}
                        {{--</li>--}}
                        {{--<li><i class="fa fa-phone"></i>+965 97123253</li>--}}
                        {{--<li><i class="fa fa-envelope"></i><a href="info@ideasowners.com"> info@ideasowners.com</a></li>--}}
                        {{--</ul><!-- /.contacts -->--}}

                        {{--<div class="social-network">--}}
                        {{--<h3>Social</h3>--}}
                        {{--<h2>--}}
                        {{--<a href="https://ideasowners.net/" target="_blank"><i class="fa fa-globe"></i></a>--}}
                        {{--<a href="https://twitter.com/ideasowners" target="_blank"><i class="fa fa-twitter"></i></a>--}}
                        {{--<a href="https://instagram.com/ideasowners" target="_blank"><i class="fa fa-instagram"></i></a>--}}
                        {{--</h2>--}}
                        {{--</div><!-- /.social-network -->--}}

                        {{--</div><!-- /.col -->--}}

                    </div><!-- /.row -->
                </div><!-- /.col -->
            </div>
        </div>
    </div>

@endsection