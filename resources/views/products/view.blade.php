@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => $product->name, 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('category.index',$product->slug) }}">{{ ucfirst($product->name) }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-md">

        <div class="container">

            <div class="c-shop-product-details-2 c-opt-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="c-product-gallery">
                            <div class="c-product-gallery-content">
                                <div class="c-zoom">
                                    <img src="/img/1.jpg">
                                </div>
                                <div class="c-zoom">
                                    <img src="/img/2.jpg">
                                </div>
                                <div class="c-zoom">
                                    <img src="/img/3.jpg">
                                </div>
                                <div class="c-zoom">
                                    <img src="/img/4.jpg">
                                </div>
                            </div>
                            <div class="row c-product-gallery-thumbnail">
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="/img/1.jpg">
                                </div>
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="/img/2.jpg">
                                </div>
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="/img/3.jpg">
                                </div>
                                <div class="col-xs-3 c-product-thumb c-product-thumb-last">
                                    <img src="/img/4.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="c-product-meta">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">{{ $product->name }}</h3>
                                <div class="c-line-left"></div>
                            </div>
                            <div class="c-product-price" style="clear: both;">{{ $product->getPriceWithCurrency() }}</div>
                            <div class="c-product-short-desc">
                                {{ $product->detail->description }}
                            </div>
                            @if(in_array($product->id,$cartItems->keys()->toArray()))
                                <a href="{{ route('cart.item.remove',$product->id) }}" class="btn c-btn btn-lg c-btn-red c-btn-square c-font-white c-font-bold c-font-uppercase c-cart-float-l">{{ __('Remove from Cart') }}</a>

                            @else
                                <form method="POST" action="{{route('cart.item.add')}}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />

                                    <div class="c-product-add-cart c-margin-t-20">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="c-input-group c-spinner">
                                                    <p class="c-product-meta-label c-product-margin-2 c-font-uppercase c-font-bold">QTY:</p>
                                                    <input name="quantity" type="text" class="form-control c-item-1" value="1">
                                                    <div class="c-input-group-btn-vertical">
                                                        <button class="btn btn-default" type="button" data_input="c-item-1"><i class="fa fa-caret-up"></i></button>
                                                        <button class="btn btn-default" type="button" data_input="c-item-1"><i class="fa fa-caret-down"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 c-margin-t-20">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn c-btn btn-lg c-font-bold c-font-white c-theme-btn c-btn-square c-font-uppercase">{{ __('Add to Cart') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection