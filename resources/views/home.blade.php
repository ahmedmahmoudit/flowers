@extends('layouts.master')

@section('script')
    @parent
    <script>
      if ($(".slider-banner-container").length>0) {

        $(".tp-bannertimer").show();

        $('.slider-banner-container .slider-banner-3').show().revolution({
          delay: 10000,
          startwidth: 1140,
          startheight: 520,
          dottedOverlay: "twoxtwo",

          parallax: "mouse",
          parallaxBgFreeze: "on",
          parallaxLevels: [3, 2, 1],

          navigationArrows: "solo",

          navigationStyle: "preview5",
          navigationHAlign: "center",
          navigationVAlign: "bottom",
          navigationHOffset: 0,
          navigationVOffset: 20,

          soloArrowLeftHalign: "left",
          soloArrowLeftValign: "center",
          soloArrowLeftHOffset: 20,
          soloArrowLeftVOffset: 0,

          soloArrowRightHalign: "right",
          soloArrowRightValign: "center",
          soloArrowRightHOffset: 20,
          soloArrowRightVOffset: 0,

          fullWidth: "on",

          spinner: "spinner0",

          stopLoop: "off",
          stopAfterLoops: -1,
          stopAtSlide: -1,
          onHoverStop: "off",

          shuffle: "off",

          autoHeight: "off",
          forceFullWidth: "off",

          hideThumbsOnMobile: "off",
          hideNavDelayOnMobile: 1500,
          hideBulletsOnMobile: "off",
          hideArrowsOnMobile: "off",
          hideThumbsUnderResolution: 0,

          hideSliderAtLimit: 0,
          hideCaptionAtLimit: 0,
          hideAllCaptionAtLilmit: 0,
          startWithSlide: 0
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