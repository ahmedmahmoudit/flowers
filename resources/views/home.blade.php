@extends('layouts.master')

@section('script')
    @parent
    <script>
      $('.slider-banner-container .slider-banner-3').show().revolution({
        delay: 10000,
        autoHeight: 'off',
        spinner: "spinner3",
        hideNavDelayOnMobile: 1500,
        hideThumbsUnderResolution: 0,
        onHoverStop: "off",
        touchenabled: "on",
      });

//      var slider = $('.slider-banner-container .slider-banner-3');
//      var height = (App.getViewPort().width < App.getBreakpoint('md') ? 1 : 1);
//
//      var api = slider.show().revolution({
//        sliderType: "standard",
//        sliderLayout: "fullwidth",
//        delay: 15000,
//        autoHeight: 'off',
//        gridheight: height,
//
//        navigation: {
//          keyboardNavigation: "off",
//          keyboard_direction: "horizontal",
//          mouseScrollNavigation: "off",
//          onHoverStop: "on",
//          arrows: {
//            style: "circle",
//            enable: true,
//            hide_onmobile: false,
//            hide_onleave: false,
//            tmp: '',
//            left: {
//              h_align: "left",
//              v_align: "center",
//              h_offset: 30,
//              v_offset: 0
//            },
//            right: {
//              h_align: "right",
//              v_align: "center",
//              h_offset: 30,
//              v_offset: 0
//            }
//          },
//          touch: {
//            touchenabled: "on",
//            swipe_threshold: 75,
//            swipe_min_touches: 1,
//            swipe_direction: "horizontal",
//            drag_block_vertical: false
//          },
//        },
//        viewPort: {
//          enable: true,
//          outof: "pause",
//          visible_area: "80%"
//        },
//
//        shadow: 0,
//
//        spinner: "spinner2",
//
//        disableProgressBar: "on",
//
//        fullScreenOffsetContainer: '.tp-banner-container',
//
//        hideThumbsOnMobile: "on",
//        hideNavDelayOnMobile: 1500,
//        hideBulletsOnMobile: "on",
//        hideArrowsOnMobile: "on",
//        hideThumbsUnderResolution: 0,
//
//      });

      $(document).ready(function(){

        var showPopup = '{{ empty(session()->get('selectedArea')) ? true : false }}';

        if(showPopup) {
            $('#select-country-form').modal('show');
        }
      });

    </script>
@endsection

@section('content')

    @include('partials.banner')

    @include('partials.ads')

    <div class="c-content-box c-size-sm c-bg-grey-1" style="margin-top:20px">
        <div class="container">

            @include('partials.notifications')

            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">{{ __('Best Sellers') }}</h3>
            </div>
            <div class="row equal">
                @include('products.item_grid',['products'=>$bestSellers])
            </div>
            <hr>
            <h3 class="c-center c-font-uppercase c-font-bold">
                <a href="{{ route('products.top') }}"
                   class="text-center c-font-uppercase btn btn-lg c-btn-green c-btn-circle c-btn-border-1x">{{ __('View All Best Selling Products') }}</a>
            </h3>
        </div>
    </div>

    <div class="c-content-box c-size-sm c-bg-white" style="margin-top:50px">
        <div class="container">

            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">{{ __('Latest Flowers') }}</h3>
            </div>

            <div class="row equal">
                <div class="c-bg-grey" style="padding-top:20px">
                    @include('products.item_grid',['products'=>$products])
                </div>
            </div>

            <div class="c-content-title-1" style="padding-top:20px">
                <h3 class="c-center c-font-uppercase c-font-bold">
                    <a href="{{ route('search') }}"
                       class="text-center c-font-uppercase btn btn-lg c-btn-green c-btn-circle c-btn-border-1x">{{ __('View All') }}</a>
                </h3>
            </div>

        </div>
    </div>

@endsection