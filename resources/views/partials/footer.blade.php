<a name="footer"></a>

<footer class="c-layout-footer c-layout-footer-6 c-bg-grey-1">

    <div class="container">

        <div class="c-prefooter c-bg-white">

            <div class="c-body">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <ul class="c-links c-theme-ul">
                            <li><a href="{{ route('contact') }}">{{ __('Contact Us') }}</a></li>
                            <li><a href="{{ route('page',['about']) }}">{{ __('About Us') }}</a></li>
                            <li><a href="{{ route('page',['terms']) }}">{{ __('Terms & Conditions') }}</a></li>
                        </ul>

                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
                        <div class="c-content-title-1 c-title-md">
                            <h3 class="c-title c-font-uppercase c-font-bold">{{ __('Contact Us') }}</h3>
                            <div class="c-line-left hide"></div>
                        </div>
                        <p class="c-address c-font-16">
                            <i class="fa fa-mail-forward"></i>&nbsp;<span class="c-theme-color">info@vazzat.com</span>
                            <br>
                            <i class="fa fa-instagram"></i>&nbsp;<span class="c-theme-color">@vazzat</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="c-line"></div>

            <div class="c-foot">
                <div class="row">
                    {{--<div class="col-md-7">--}}
                        {{--<div class="c-content-title-1 c-title-md">--}}
                            {{--<h3 class="c-font-uppercase c-font-bold">{{ __('About') }} <span class="c-theme-font">Vazzat</span></h3>--}}
                            {{--<div class="c-line-left hide"></div>--}}
                        {{--</div>--}}
                        {{--<p class="c-text c-font-16 c-font-regular"></p>--}}
                    {{--</div>--}}
                    <div class="col-md-5">

                        <div class="c-content-title-1 c-title-md">
                            <h3 class="c-font-uppercase c-font-bold">{{ __('Subscribe to Newsletter') }}</h3>
                            <div class="c-line-left hide"></div>
                        </div>

                        <div class="c-line-left hide"></div>
                        <form action="{{route('newsletter.subscribe')}}" method="POST">
                            {!! csrf_field() !!}
                            <div class="input-group input-group-lg c-square">
                                <input type="text" name="email" class="form-control c-square c-font-grey-3 c-border-grey c-theme" placeholder="{{ __('Email') }}"/>
                                <span class="input-group-btn">
					            	<button type="submit" class="btn c-theme-btn c-theme-border c-btn-square c-btn-uppercase c-font-16" type="button">{{ __('Subscribe') }}</button>
					        	</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="c-postfooter c-bg-dark-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 c-col">
                    <p class="c-copyright c-font-grey" >Vazzat.com {{ date('Y') }} &copy;  All Rights Reserved
                        <br><span class="c-font-grey-3" style="padding-bottom: 30px">Developed by IdeasOwners</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>