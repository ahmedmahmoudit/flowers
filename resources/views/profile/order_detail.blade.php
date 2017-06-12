@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Welcome, ') . $user->name, 'nav'=>true, 'sub'=>__('Your order history')])
        <li class=""><a href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
        <li>/</li>
        <li ><a href="{{ route('profile.orders') }}">{{ __('Orders') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('profile.orders.show',$order->id) }}">{{ $order->invoice_id }}</a></li>
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <div class="c-sidebar-menu-toggler">
                <h3 class="c-title c-font-uppercase c-font-bold">{{ __('Welcome, '), $user->name }}</h3>
                <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                    <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
                </a>
            </div>
            @include('profile.sidebar',['active'=>'orders'])
        </div>
        <div class="c-layout-sidebar-content ">
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">{{ __('My Order History') }}</h3>
                <div class="c-line-left"></div>
            </div>
            <div class="row c-margin-b-40 c-order-history-2">

                {{--@foreach($user->orders as $order)--}}

                    <div class="row c-cart-table-row">
                        <h2 class="c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title c-cart-item-first">Item 5</h2>
                        <div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
                            <img src="/img/9.jpg" style="height: 90px;width: 120px" class="img img-responsive"/>
                        </div>
                        <div class="col-md-1 col-sm-3 col-xs-6 c-cart-ref">
                            <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Order</p>
                            <p>#1136</p>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-6 c-cart-desc">
                            <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Description</p>
{{--                            <p><a href="{{ route('products.show',$order->product->id) }}" class="c-font-bold c-theme-link c-font-dark">{{ $order->product->name }}</a></p>--}}
                            <p><a href="#" class="c-font-bold c-theme-link c-font-dark"> Winter Jacker</a></p>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 c-cart-price">
                            <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Price</p>
                            <p class="c-cart-price c-font-bold">$135.00</p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 c-cart-total">
                            <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Payment Method</p>
                            <p class="c-cart-price c-font-bold">Credit Cart (Visa)</p>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 c-cart-qty">
                            <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Date</p>
                            <p>10 Sep 2015</p>
                        </div>
                    </div>
                {{--@endforeach--}}

            </div>
        </div>
    </div>

@endsection