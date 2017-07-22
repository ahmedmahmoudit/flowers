@extends('layouts.master')

@section('script')
    @parent
    <script>
      $('.slider-banner-container .slider-banner-3').show().revolution({
        delay: 10000,
        autoHeight: 'off',
        gridheight:500,
        spinner: "spinner3",
        hideNavDelayOnMobile: 1500,
        hideThumbsUnderResolution: 0,
        onHoverStop: "off",
        touchenabled:"on"
      });
    </script>
@endsection

@section('content')

    @include('partials.banner')

    <div style="margin-top:50px">
        <div class="container">
            @include('partials.ads')
        </div>
    </div>

    <div class="c-layout-footer-6 c-bg-white" style="margin-top:50px;background: url(/img/best-seller-background.jpg);">
        <div class="container">
            @include('partials.notifications')
            <div class="c-content-title-1" style="padding-top:20px">
                <h3 class="c-center c-font-uppercase c-font-bold">{{ __('Best Sellers') }}</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>
            <div class="c-prefooter c-bg-grey-1">
                <div class="row equal">
                    @include('products.item_grid',['products'=>$bestSellers])
                </div>
            </div>
            <div class="c-content-title-1" style="padding-top:20px">
                <h3 class="c-center c-font-uppercase c-font-bold">
                    <a href="{{ route('products.top') }}" class="text-center c-font-uppercase btn btn-lg c-btn-green c-btn-circle c-btn-border-1x">{{ __('View All Best Selling Products') }}</a>
                </h3>
            </div>
        </div>
    </div>

    <div class="c-layout-footer-6 c-bg-white">
        <div class="container">
            <div class="c-content-title-1" style="padding-top:20px">
                <h3 class="c-center c-font-uppercase c-font-bold">{{ __('Latest Flowers') }}</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>

            <div class="c-prefooter c-bg-grey-1">
                <div class="row equal">
                    @include('products.item_grid',['products'=>$products])
                </div>
            </div>
            <div class="c-content-title-1" style="padding-top:20px">
                <h3 class="c-center c-font-uppercase c-font-bold">
                    <a href="{{ route('products.index') }}" class="text-center c-font-uppercase btn btn-lg c-btn-green c-btn-circle c-btn-border-1x" >{{ __('View All Flowers') }}</a>
                </h3>
            </div>
        </div>
    </div>

@endsection