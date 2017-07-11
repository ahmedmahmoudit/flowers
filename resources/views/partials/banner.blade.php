<div class="banner">
    <div class="slideshow white-bg">
        <div class="slider-banner-container">
            <div class="slider-banner-3">
                <ul>
                    @foreach($sliderImages as $sliderImage)
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on" >
                            <img src="/img/slider{{rand(1,3)}}.jpg"  alt="slide1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            <div class="tp-caption very_large_text sfl tp-resizeme"
                                 data-x="center"
                                 data-y="70"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600"
                            >
                                Up To 50% Off

                            </div>

                            <div class="tp-caption tp-resizeme sfl"
                                 data-x="center"
                                 data-y="300"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600">
                                <a href="{{ $sliderImage->link }}" class="btn btn-default btn-lg">{{ __('View Offer') }}<i class="fa fa-angle-double-right pl-10"></i></a>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>