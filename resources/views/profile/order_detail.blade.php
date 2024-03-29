@extends('layouts.master')

@section('content')
    @component('partials.breadcrumb',['title' => __('Order Detail'), 'nav'=>true])
        <li class=""><a href="{{ route('profile.orders') }}">{{ __('Order Detail') }}</a></li>
        <li>/</li>
        <li class="c-active">{{ __('Order Detail') }}</li>
    @endcomponent

    <div id="content" class="c-content-box c-size-lg c-overflow-hide c-bg-white">
        <div class="container">
            <div class="c-shop-order-complete-1 c-content-bar-1 c-align-left c-bordered c-theme-border c-shadow">
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold">#{{ $order->invoice_id . ' ' . __('Order Detail') }}</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>

                <div class="c-order-details">
                    <div class="c-border-bottom hidden-sm hidden-xs">
                        <div class="row">
                            <div class="col-md-2">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Product') }}</h3>
                            </div>
                            <div class="col-md-2">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Description') }}</h3>
                            </div>
                            <div class="col-md-2">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Unit Price') }}</h3>
                            </div>
                            <div class="col-md-2">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Quantity') }}</h3>
                            </div>
                            <div class="col-md-2">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Delivery Date') }}</h3>
                            </div>
                            <div class="col-md-2">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Total') }}</h3>
                            </div>
                        </div>
                    </div>

                    @foreach($order->orderDetails as $orderDetail)
                        <div class="c-border-bottom c-row-item">
                            <div class="row">
                                <div class="col-md-2 col-sm-12 c-image">
                                    <div class="c-content-overlay">
                                        <div class="c-overlay-wrapper">
                                            <div class="c-overlay-content">
                                                <a href="{{ route('product.show',[$orderDetail->product->id,$orderDetail->product->slug]) }}"
                                                   class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Explore</a>
                                            </div>
                                        </div>
                                        <div class="c-bg-img-top-center c-overlay-object" data-height="height">
                                            <img width="100%" class="img img-responsive"
                                                 src="{{ asset('uploads/products/'.$orderDetail->product->detail->main_image) }}"
                                                 style="height: 100px;width: 100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <ul class="c-list list-unstyled">
                                        <li class="c-margin-b-25"><a
                                                    href="{{ route('product.show',[$orderDetail->product->id,$orderDetail->product->slug]) }}"
                                                    class="c-font-bold c-font-22 c-theme-link">{{$orderDetail->product->name}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-2">
                                    <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">{{ __('Unit Price') }}</p>
                                    <p class="c-font-sbold c-font-uppercase c-font-18">{{$orderDetail->product->detail->getFinalPriceWithCurrency() }}
                                        @if($orderDetail->product->detail->is_sale)
                                            &nbsp;<span
                                                    class="c-font-line-through c-font-red">{{ $orderDetail->product->detail->getPriceWithCurrency() }}</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">{{ __('Quantity') }}</p>
                                    <p class="c-font-sbold c-font-uppercase c-font-18">{{$orderDetail->quantity }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">{{ __('Delivery Date') }}</p>
                                    <p class="c-font-sbold c-font-uppercase c-font-18">
                                        {{$orderDetail->delivery_date }} {{ $orderDetail->deliveryTime ? $orderDetail->deliveryTime->name : '' }}

                                    </p>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">Total</p>
                                    <p class="c-font-sbold c-font-18">{{ ($orderDetail->quantity * $orderDetail->product->detail->final_price) . ' ' . $order->country->currency_en }}
                                    </p>

                                </div>
                            </div>
                        </div>

                    @endforeach
                    <div class="c-row-item c-row-total c-right">
                        <ul class="c-list list-unstyled">
                            <li>
                                <h3 class="c-font-regular c-font-22">{{ __('Sub Total') }} :
                                    &nbsp;<span
                                            class="c-font-line-through c-font-red">{{$order->net_amount . ' ' . $order->country->currency_en }}</span>
                                </h3>
                            </li>
                            <li>
                                <h3 class="c-font-regular c-font-22">{{ __('Grand Total') }} : &nbsp;
                                    <span class="c-font-dark c-font-bold c-font-22">{{$order->sale_amount . ' ' . $order->country->currency_en }}</span>
                                </h3>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="c-customer-details row" data-auto-height="true">
                    <div class="col-md-6 col-sm-6 c-margin-t-20">
                        <div data-height="height">
                            <h3 class=" c-margin-b-20 c-font-uppercase c-font-22 c-font-bold">{{ __('Customer Details') }}</h3>
                            <ul class="list-unstyled">
                                <li>{{ __('Customer Name') }}: {{ $order->firstname . ' ' .$order->lastname }}</li>
                                <li>Email: <a href="mailto:{{$order->email}}"
                                              class="c-theme-color">{{$order->email}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 c-margin-t-20">
                        <div data-height="height">
                            <h3 class=" c-margin-b-20 c-font-uppercase c-font-22 c-font-bold">{{ __('Billing Address') }}</h3>
                            <ul class="list-unstyled">
                                <li>{{ $order->recipient_firstname . ' ' . $order->recipient_lastname  }}</li>
                                @if($order->address)
                                    <li>
                                        {{ __('Block') . ' ' . $order->block }},
                                        {{ __('Street') . ' ' . $order->street }}
                                        <br>
                                        @if($order->address->area ? $order->address->area->name . ', ' : '')
                                            {{ $order->country ? $order->country->name : '' }}
                                        @endif
                                        <br>
                                        {{ __('Block') . ' ' . $order->address->block }}
                                        {{ __('Street') . ' ' . $order->address->street }}
                                        {{ __('House') . ' ' . $order->address->house }}

                                        <br>
                                        {{ $order->mobile }}
                                        @if($order->phone)
                                            , {{ $order->phone }},
                                        @endif
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection