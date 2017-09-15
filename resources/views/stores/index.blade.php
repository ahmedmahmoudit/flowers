@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Stores'), 'nav'=>true])
        <li class="c-active"><a href="{{ route('stores.index') }}">{{ __('Stores') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold ">{{ __('Stores in ') . $country['name_'.app()->getLocale()]  }}</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>

            <div class="c-padding-10">
                <a href="{{ route('stores.index',['type'=>$viewType == 'list' ? 'grid' : 'list']) }}"  class="cbp-l-grid-masonry-projects-title">
                    <i class="fa {{ $viewType == 'list' ? 'fa-th-large' : 'fa-list' }} pull-right" style="font-size: 28px; color:#32c5d2" > </i>
                </a>
            </div>

            <hr>

            @if($viewType == 'list')
                <ul class="c-content-list-1 c-theme">
                    @foreach($stores as $store)
                        <li class="col-md-4 c-bg-before-red">
                            <a class="" href="{{route('search',['store'=>$store->slug])}}">
                                {{ $store->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="clearfix"></div>

            @else

                <div class="cbp-panel">
                    <div class="c-content-latest-works cbp cbp-l-grid-masonry-projects">

                        @foreach($stores as $store)
                            <div class="cbp-item web-design logos " data-wow-delay="0.2s">
                                <div class="cbp-caption">
                                    <a href="{{ route('search',['store'=>$store->slug]) }}">
                                        <img src="{{ asset('uploads/stores/'.$store->image) }}" class="img img-responsive" style="height: 340px">
                                    </a>
                                </div>
                                <a href="{{ route('search',['store'=>$store->slug]) }}" class="cbp-l-grid-masonry-projects-title">
                                    {{ $store->name }}
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif

            <div class="text-center" style="padding:50px 0">
                {{ $stores->appends(request()->except('page'))->links('partials.pagination') }}
            </div>
        </div>
    </div>
@endsection