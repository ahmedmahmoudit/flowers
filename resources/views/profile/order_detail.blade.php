@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Welcome') . ' ' . $user->name, 'nav'=>true, 'sub'=>__('Order History')])
        <li class=""><a href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
        <li>/</li>
        <li ><a href="{{ route('profile.orders') }}">{{ __('Orders') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('profile.orders.show',$order->id) }}">{{ $order->invoice_id }}</a></li>
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <div class="c-sidebar-menu-toggler">
                <h3 class="c-title c-font-uppercase c-font-bold">{{ __('Welcome') .' '. $user->name }}</h3>
                <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                    <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
                </a>
            </div>
            @include('profile.sidebar',['active'=>'orders'])
        </div>
        <div class="c-layout-sidebar-content ">
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">{{ __('Order History') }}</h3>
                <div class="c-line-left"></div>
            </div>
            <div class="row c-margin-b-40 c-order-history-2">

                @foreach($order->orderDetails as $orderDetail)

                    <div class="row c-cart-table-row">
                        <h2 class="c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title c-cart-item-first">{{ $orderDetail->id }}</h2>
                        <div class="col-md-2 col-sm-2 col-xs-6 c-cart-image">
                            <img src="{{ asset('uploads/products/'.$orderDetail->product->detail->main_image) }}" style="height: 90px;width: 120px" class="img img-responsive"/>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-6 c-cart-desc">
                            <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Description</p>
                            <p><a href="{{ route('product.show',[$orderDetail->product->id,$orderDetail->product->slug]) }}" class="c-font-bold c-theme-link c-font-dark">{{ $orderDetail->product->name }}</a></p>
                        </div>



                        <div class="col-md-2 col-sm-2 col-xs-6 c-cart-price">
                            <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">{{ __('Price') }}</p>
                            <p class="c-cart-price c-font-bold">{{$orderDetail->sale_price}} {{ __('KD') }}</p>
                        </div>
                        @if($orderDetail->price !== $orderDetail->sale_price)
                            <div class="col-md-2 col-sm-2 col-xs-6 c-cart-desc">
                                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">{{ __('Actual Price') }}</p>
                                <p class="c-font-red c-font-line-through ">{{$orderDetail->price}} {{ __('KD') }}</p>
                            </div>
                        @endif

                        <div class="col-md-2 col-sm-4 col-xs-6 c-cart-desc">
                            <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">{{ __('Quantity') }}</p>
                            <p class="c-cart-price c-font-bold">{{$orderDetail->quantity}}</p>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection