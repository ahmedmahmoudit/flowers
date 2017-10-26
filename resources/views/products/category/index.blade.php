@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => $category->name, 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('category.index',[$category->id,$category->slug]) }}">{{ ucfirst($category->name) }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg c-bg-white-1">
        <div class="container">

            <div class="row">
                <div class="col-xs-6">
                    <div class="c-content-title-3 c-theme-border">
                        <h3 class="c-left c-font-uppercase">{{ $category->name }}</h3>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="c-content-title-3 c-border-pink c-right">
                        <h3 class="c-right c-font-uppercase">
                            <a href="{{ route('category.show',[$category->id,$category->slug]) }}" class="c-font-uppercase btn btn-xs c-btn-green c-btn-circle c-btn-border-1x">{{ __('View All') }}</a>
                        </h3>
                    </div>
                </div>
            </div>

            <hr>

            @if($isParent)
                @foreach($category->children as $childCategory)
                    <div  style="margin: 10px 0">
                        <div class="c-content-box c-size-lg c-bg-grey-1" style="margin: 0;padding: 20px 0">
                            <div class="col-xs-6">
                                <div class="c-content-title-2">
                                    <h3 class="c-left c-font-uppercase">{{ $childCategory->name }}</h3>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="c-content-title-2 c-right">
                                    <h3 class="c-right c-font-uppercase">
                                        <a href="{{ route('category.show',[$category->id,$category->slug]) }}" class="c-font-uppercase btn btn-xs c-btn-green c-btn-circle c-btn-border-1x">{{ __('View All') }}</a>
                                    </h3>
                                </div>
                            </div>
                            @include('products.item_grid',['products'=>$childCategory->products,'cartItems'=>$cartItems])
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach

            @else
                @include('products.item_grid',['products'=>$category->products,'cartItems'=>$cartItems])
            @endif
        </div>
    </div>
    </div>
@endsection