@extends('layouts.master')

@section('script')
    @parent
    {{--<script src="/js/masonry-portfolio.js" type="text/javascript"></script>--}}
@endsection

@section('content')

    @component('partials.breadcrumb',['title' => __('Stores'), 'nav'=>true])
        <li class=""><a href="{{ route('stores.index') }}">{{ __('Stores') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('stores.show',[$store->id,$store->slug]) }}">{{ $store->name }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-md c-bg-white">
        <div class="container"></div>
    </div>
@endsection