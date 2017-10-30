<div class="c-layout-revo-slider-desktop c-layout-revo-slider-4" dir="ltr">
    <div class="tp-banner-container c-theme">
        <div class="tp-banner rev_slider" data-version="5.0">
            <ul>
                @foreach($sliderImages as $slide)
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000">
                        <img src="{{ asset('uploads/slides/'.$slide->image) }}"
                                data-bgposition="center center"
                                data-bgfit="cover"
                                data-bgrepeat="no-repeat"
                        >
                        @if($slide->description)
                            <div class="tp-caption customin customout"
                                 data-x="center"
                                 data-y="center"
                                 data-hoffset=""
                                 data-voffset="-50"
                                 data-speed="500"
                                 data-start="1000"
                                 data-transform_idle="o:1;"
                                 data-transform_in="rX:0.5;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;"
                                 data-transform_out="rX:0.5;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.1"
                                 data-endelementdelay="0.1"
                                 data-endspeed="600"
                                 data-fontsize="['24', '24', '22', '18']" ,
                            >
                                <h3 class="c-main-title-circle c-font-48 c-font-bold c-font-center c-font-uppercase c-font-white c-block">
                                    {{ $slide->description }}
                                </h3>
                            </div>
                        @endif

                        @if($slide->store)

                            <div class="tp-caption lft"
                                 data-x="center"
                                 data-y="center"
                                 data-voffset="110"
                                 data-speed="900"
                                 data-start="2000"
                                 data-transform_idle="o:1;"
                                 data-transform_in="x:100;y:100;rX:120;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;"
                                 data-transform_out="x:100;y:100;rX:120;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;">
                                <a href="{{ route('search',['store'=>$slide->store->slug]) }}"
                                   class="c-action-btn btn btn-lg c-btn-square c-theme-btn c-btn-bold c-btn-uppercase">
                                    {{  $slide->store->name  }}<i
                                            class="fa fa-angle-double-right pl-10"></i>
                                </a>

                            </div>

                        @endif

                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


{{--<div class="banner">--}}
{{--<div class="slideshow white-bg">--}}
{{--<div class="slider-banner-container">--}}
{{--<div class="slider-banner-3">--}}
{{--<ul>--}}
{{--@foreach($sliderImages as $slider)--}}
{{--<li data-transition="fade" data-slotamount="7" data-masterspeed="1000"--}}
{{--data-saveperformance="on">--}}
{{--<img src="{{asset('uploads/slides/'.$slider->image) }}" alt="slide1"--}}
{{--data-bgposition="center top" data-bgrepeat="no-repeat" data-bgfit="contain">--}}
{{--@if($slider->description)--}}
{{--<div class="tp-caption very_large_text sfl tp-resizeme"--}}
{{--data-x="center"--}}
{{--data-y="70"--}}
{{--data-speed="600"--}}
{{--data-start="0"--}}
{{--data-end="10000"--}}
{{--data-endspeed="600"--}}
{{-->--}}
{{--{{$slider->description}}--}}
{{--</div>--}}
{{--@endif--}}

{{--<div class="tp-caption tp-resizeme sfl"--}}
{{--data-x="center"--}}
{{--data-y="300"--}}
{{--data-speed="600"--}}
{{--data-start="0"--}}
{{--data-end="10000"--}}
{{--data-endspeed="600">--}}
{{--@if($slider->store)--}}
{{--<a href="{{ route('search',['store'=>$slider->store->slug]) }}"--}}
{{--class="btn btn-default btn-lg"> {{  $slider->store->name  }}<i--}}
{{--class="fa fa-angle-double-right pl-10"></i></a>--}}
{{--@endif--}}
{{--</div>--}}

{{--</li>--}}
{{--@endforeach--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}