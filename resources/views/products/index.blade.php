@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Products'), 'nav'=>true])
        <li class="c-active"><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg c-bg-grey-1">
        <div class="container">
            @foreach($parentCategories as $category)
                <div class="c-content-title-2" style="">
                    <h3 class="pull-left c-font-uppercase">{{ $category->name }}</h3>
                    <a href="{{ route('category.show',$category->slug) }}" class=" pull-right c-font-uppercase btn btn-lg c-btn-green c-btn-circle c-btn-border-1x">{{ __('View All') }}</a>
                    <div class="clearfix"></div>
                    <div class="c-line c-dot   c-theme-bg c-theme-bg-after"></div>
                </div>
                <div class="row" style="margin-bottom:100px">
                    @foreach($category->products as $product)
                        @include('products.item_grid',['cartItems'=>$cartItems])
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection