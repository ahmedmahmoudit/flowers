@extends('layouts.master')

@section('script')
    @parent
    <script>
      if ($(".slider-banner-container").length>0) {

        $(".tp-bannertimer").show();

        $('.slider-banner-container .slider-banner-3').show().revolution({
          sliderType:"standard",
          sliderLayout:"fullwidth",
          delay: 10000,
          autoHeight: 'off',
          gridheight:500,
          shadow: 0,
          spinner: "spinner3",
          disableProgressBar:"on",
          hideThumbsOnMobile: "on",
          hideNavDelayOnMobile: 1500,
          hideBulletsOnMobile: "on",
          hideBullets: "on",
          hideArrowsOnMobile: "on",
          hideThumbsUnderResolution: 0,
          navigationArrows:"solo",
          onHoverStop: "off",
          touchenabled:"on",
        });

      }

    </script>
@endsection

@section('content')

    @include('partials.banner')

    <div class="c-content-box c-size-lg c-bg-grey-1">

        <div class="container">
            <div class="c-content-title-4">
                <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">{{ __('Best Sellers') }}</span></h3>
            </div>
            <div class="row">

                @foreach($bestSellers as $product)
                    @include('products.item_grid')
                @endforeach

            </div>
        </div>
    </div>
@endsection