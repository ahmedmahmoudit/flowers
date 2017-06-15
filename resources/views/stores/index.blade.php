@extends('layouts.master')

@section('script')
    @parent
    {{--<script src="/js/masonry-portfolio.js" type="text/javascript"></script>--}}
@endsection

@section('content')

    @component('partials.breadcrumb',['title' => __('Stores'), 'nav'=>true])
        <li class="c-active"><a href="{{ route('stores.index') }}">{{ __('Stores') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">{{ __('Stores near ') . $area['name_'.app()->getLocale()]  }}</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>
            <div class="cbp-panel">
                <div class="c-content-latest-works cbp cbp-l-grid-masonry-projects">

                    @foreach($stores as $store)
                        <div class="cbp-item web-design logos " data-wow-delay="0.2s">
                            <div class="cbp-caption">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="/img/{{rand(1,9).'.jpg'}}" alt="" class="img img-responsive" style="height: 340px">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="c-masonry-border"></div>
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <a href="{{ route('search',['store'=>$store->slug]) }}" class=" cbp-l-caption-buttonLeft btn c-btn-square c-btn-border-1x c-btn-white c-btn-bold c-btn-uppercase">{{ __('explore') }}</a>
                                            <a href="/img/{{ rand(1,9).'.jpg' }}" class="cbp-lightbox cbp-l-caption-buttonRight btn c-btn-square c-btn-border-1x c-btn-white c-btn-bold c-btn-uppercase" data-title="{{ $store->name }}">{{ __('zoom') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection