@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => $category->name, 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('category.index',$category->slug) }}">{{ ucfirst($category->name) }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg c-bg-grey-1">
        <div class="container">

            <div class="c-content-title-2">
                <h3 class="pull-left c-font-uppercase">{{ $category->name }}</h3>
                <a href="{{ route('category.show',$category->slug) }}" class=" pull-right c-font-uppercase btn btn-lg c-btn-green c-btn-circle c-btn-border-1x">{{ __('View All') }}</a>
                <div class="clearfix"></div>
                <div class="c-line c-dot   c-theme-bg c-theme-bg-after"></div>
            </div>
            <div class="row">
                @foreach($category->children as $childCategory)

                    <div class="c-content-title-2" style="padding: 15px 15px 0px 15px;margin-top:50px">
                        <h3 class="pull-left c-font-uppercase" style="font-size: 1.2em">{{ $childCategory->name }}</h3>
                        <a href="{{ route('category.index',$childCategory->slug) }}" class=" pull-right c-font-uppercase btn btn-lg c-btn-green c-btn-circle c-btn-border-1x"  style="font-size: .8em">{{ __('View All '.$childCategory->name) }}</a>
                        <div class="clearfix"></div>
                    </div>

                    @foreach($childCategory->products as $product)
                        @include('products.item_grid',['cartItems'=>$cartItems])
                    @endforeach
                    <div class="clearfix"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection