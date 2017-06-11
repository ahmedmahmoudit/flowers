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

    <div class="c-layout-footer-6 c-bg-white">
        <div class="container">
            <div class="c-prefooter c-bg-grey-1">
                <div class="c-content-title-2">
                    <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="">{{ __('Best Sellers') }}</span></h3>
                    <div class="c-line c-dot c-theme-bg c-theme-bg-after"></div>
                </div>
                <div class="row">
                    @foreach($bestSellers as $product)
                        @include('products.item_grid')
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection