@extends('layouts.master')

@section('content')
    <div class="c-content-box c-size-lg">
        <div class="container">

            <!-- BEGIN: SHOPPING CART ITEM ROW -->
            @if(!$cart->items->count() > 0)
                @include('cart.empty')
            @else
                <form method="POST" action="{{ route('cart.update') }}" >
                    {{ csrf_field() }}

                    <div class="c-shop-cart-page-1">
                        <div class="row c-cart-table-title">
                            <div class="col-md-2 c-cart-image">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Image</h3>
                            </div>
                            <div class="col-md-5 c-cart-desc">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Description</h3>
                            </div>
                            <div class="col-md-1 c-cart-qty">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Qty</h3>
                            </div>
                            <div class="col-md-2 c-cart-price">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Unit Price</h3>
                            </div>
                            <div class="col-md-1 c-cart-total">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Total</h3>
                            </div>
                            <div class="col-md-1 c-cart-remove"></div>
                        </div>
                        @foreach($cart->items as $product)
                            <div class="row c-cart-table-row">
                                <h2 class="c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title c-cart-item-first">Item 1</h2>
                                <div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
                                    <img src="/img/{{ rand(1,6) }}.jpg"/>
                                </div>
                                <div class="col-md-5 col-sm-9 col-xs-7 c-cart-desc">
                                    <h3><a href="shop-product-details-2.html" class="c-font-bold c-theme-link c-font-22 c-font-dark">{{ $product->name }}</a></h3>
                                    <p>Color: Blue</p>
                                    <p>Size: S</p>
                                </div>

                                <div class="col-md-1 col-sm-3 col-xs-6 c-cart-qty">
                                    <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">QTY</p>
                                    <div class="c-input-group c-spinner">
                                        <input type="text" name="quantity_{{$product->id}}" class="form-control c-item-{{$product->id}}" value="{{ $product->quantity }}">
                                        <div class="c-input-group-btn-vertical">
                                            <button class="btn btn-default" type="button" data_input="c-item-{{$product->id}}" data-maximum="10"><i class="fa fa-caret-up"></i></button>
                                            <button class="btn btn-default" type="button" data_input="c-item-{{$product->id}}"><i class="fa fa-caret-down"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-6 c-cart-price">
                                    <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Unit Price</p>
                                    <p class="c-cart-price c-font-bold">{{ $product->getPriceWithCurrency() }}</p>
                                </div>
                                <div class="col-md-1 col-sm-3 col-xs-6 c-cart-total">
                                    <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Total</p>
                                    <p class="c-cart-price c-font-bold">{{ $product->subTotal }}</p>
                                </div>
                                <div class="col-md-1 col-sm-12 c-cart-remove">
                                    <a href="{{ route('cart.item.remove',$product->id) }}" class="c-theme-link c-cart-remove-desktop">
                                        ×
                                    </a>
                                    <a href="{{ route('cart.item.remove',$product->id) }}" class="c-cart-remove-mobile btn c-btn c-btn-md c-btn-square c-btn-red c-btn-border-1x c-font-uppercase">
                                        {{ __('Remove item from Cart') }}
                                    </a>
                                </div>
                            </div>
                        @endforeach


                        <div class="row">
                            <div class="c-cart-subtotal-row c-margin-t-20">
                                <div class="col-md-2 col-md-offset-9 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                    <h3 class="c-font-uppercase c-font-bold c-right c-font-16 c-font-grey-2">Subtotal</h3>
                                </div>
                                <div class="col-md-1 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                    <h3 class="c-font-bold c-font-16">{{ $cart->subTotal }}</h3>
                                </div>
                            </div>
                        </div>
                        <!-- BEGIN: SUBTOTAL ITEM ROW -->
                        <div class="row">
                            <div class="c-cart-subtotal-row">
                                <div class="col-md-2 col-md-offset-9 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                    <h3 class="c-font-uppercase c-font-bold c-right c-font-16 c-font-grey-2">Grand Total</h3>
                                </div>
                                <div class="col-md-1 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                    <h3 class="c-font-bold c-font-16">{{ $cart->grandTotal }}</h3>
                                </div>
                            </div>
                        </div>
                        <!-- END: SUBTOTAL ITEM ROW -->
                        <div class="c-cart-buttons">
                            <button type="submit" class="btn c-btn btn-lg c-btn-red c-btn-square c-font-white c-font-bold c-font-uppercase c-cart-float-l">Update Cart</button>
                            <a href="#" class="btn c-btn btn-lg c-theme-btn c-btn-square c-font-white c-font-bold c-font-uppercase c-cart-float-r">Checkout</a>
                        </div>
                    </div>
                </form>
            @endif

        </div>
    </div>
@endsection