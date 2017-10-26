@extends('layouts.master')

@section('script')
    @parent
    <script>
      $('.slider-banner-container .slider-banner-3').show().revolution({
        delay: 10000,
        autoHeight: 'off',
        gridheight: 500,
        spinner: "spinner3",
        hideNavDelayOnMobile: 1500,
        hideThumbsUnderResolution: 0,
        onHoverStop: "off",
        touchenabled: "on",
      });

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