<div class="banner">
    <div class="slideshow white-bg">
        <div class="slider-banner-container">
            <div class="slider-banner-3">
                <ul>
                    @foreach($sliderImages as $slider)
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on" >
                            {{--<img src="{{ asset('uploads/slides/'.$slider->image) }}"  alt="slide1" data-bgposition="center top" data-bgfit="100% 100%" data-bgrepeat="no-repeat">--}}
                            <img src="{{asset('uploads/slides/'.$slider->image) }}"  alt="slide1" data-bgposition="center top" data-bgrepeat="no-repeat" data-bgfit="cover">
                            @if($slider->description)
                                <div class="tp-caption very_large_text sfl tp-resizeme"
                                     data-x="center"
                                     data-y="70"
                                     data-speed="600"
                                     data-start="0"
                                     data-end="10000"
                                     data-endspeed="600"
                                >
                                    {{$slider->description}}
                                </div>
                            @endif

                            <div class="tp-caption tp-resizeme sfl"
                                 data-x="center"
                                 data-y="300"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600">
                                @if($slider->store)
                                    <a href="{{ route('search',['store'=>$slider->store->slug]) }}" class="btn btn-default btn-lg"> {{  $slider->store->name  }}<i class="fa fa-angle-double-right pl-10"></i></a>
                                @endif
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>