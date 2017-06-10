@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => $category->name, 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        @if($category->parent)
            <li><a href="{{ route('category.index',$category->parent->slug) }}">{{ ucfirst($category->parent->name) }}</a></li>
            <li>/</li>
        @endif
        <li class="c-active"><a href="{{ route('category.index',$category->slug) }}">{{ ucfirst($category->name) }}</a></li>
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">

            @include('products.search_form')
            <div class="clearfix"></div>
        </div>
        <div class="c-layout-sidebar-content ">
            <div class="c-shop-product-details-2 c-opt-1">
                <div class="row">
                    <div class="c-content-box c-size-lg c-bg-grey-1">
                        <div class="c-content-title-4">
                            <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">{{ $category->name }}</span></h3>
                        </div>
                        <div class="row">
                            @foreach($category->products as $product)
                                @include('products.item_grid',['cartItems'=>$cartItems,'cols'=>4])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection