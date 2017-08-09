@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Welcome, ') . $user->name, 'nav'=>true, 'sub'=>__('Your order history')])
        <li class=""><a href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('profile.orders') }}">{{ __('Orders') }}</a></li>
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
                <h3 class="c-font-uppercase c-font-bold">{{ __('Order History') }}</h3>
                <div class="c-line-left"></div>
            </div>

            @foreach($user->orders as $order)
                <div class="row c-margin-b-40">
                    <div class="c-content-product-2 c-bg-white">
                        <div class="col-md-4">
                            <div class="c-content-overlay">
                                <a href="{{ route('profile.orders.show',[$order->invoice_id]) }}">
                                    <img src="{{ $order->detailExcerpt->product->detail->main_image }}" class="img img-responsive" style="height:200px" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="c-info-list">
                                <h3 class="c-title c-font-bold c-font-22 c-font-dark">
                                    <p class="c-font-14 c-font-thin">{{ __('Order') }} #: {{ $order->invoice_id }}</p>
                                    <a class="c-theme-link" href="{{ route('profile.orders.show',1) }}">
                                        {{ $order->created_at->format('d M,Y') }}
                                    </a>
                                </h3>
                                <span style="font-weight: bold">{{ __('status') }} :<span class="c-order-date c-font-14 c-font-thin c-theme-font"> {{$order->orderStatusCast($order->order_status)}}</span></span>
                                <p class="c-price c-font-26 c-font-thin">{{ $order->net_amount }} KWD</p>
                                <p class="c-payment-type c-font-14 c-font-bold">via ({{ $order->payment_method }})</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection