@extends('layouts.master')

@section('style')
    @parent
    <style>
        @media print {
            @page { margin: 0; }

            body * {
                visibility: hidden;
            }
            #content, #content * {
                visibility: visible;
            }
            #content {
                /*position: absolute;*/
                /*left: 0;*/
                /*top: 0;*/
            }
        }
    </style>
@endsection

@section('content')
    @component('partials.breadcrumb',['title' => __('Payment Success'), 'nav'=>true])
        <li class="c-active">{{ __('Payment') }}</li>
    @endcomponent

    <div id="content" class="c-content-box c-size-lg c-overflow-hide c-bg-white">
        <div class="container">
            <div class="c-shop-order-complete-1 c-content-bar-1 c-align-left c-bordered c-theme-border c-shadow">
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold">{{ __('Order Completed') }}</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>
                <div class="c-theme-bg">
                    <p class="c-message c-center c-font-white c-font-20 c-font-sbold">
                        <i class="fa fa-check"></i> {{ __(' Thank you. Your order has been received.') }}
                    </p>
                </div>
                <div class="row c-order-summary c-center">
                    <ul class="c-list-inline list-inline">
                        <li>
                            <h3>{{ __('Order Number') }}</h3>
                            <p>{{ $order->invoice_id }}</p>
                        </li>
                        <li>
                            <h3>{{ __('Amount Paid') }}</h3>
                            <p>{{ $order->sale_amount }} KD</p>
                        </li>
                        <li>
                            <h3>Payment Method</h3>
                            <p>{{ $order->payment_method }}</p>
                        </li>
                    </ul>
                </div>
                <div class="c-bank-details c-margin-t-30 c-margin-b-30">
                    <p class="c-margin-b-20">
                        {{ __('Your Item(s) are ready for Shipping. Please use your Order Number as the payment reference.') }}
                    </p>
                </div>
                <div class="c-order-details">
                    <div class="c-border-bottom hidden-sm hidden-xs">
                        <div class="row">
                            <div class="col-md-2">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Product') }}</h3>
                            </div>
                            <div class="col-md-4">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Description') }}</h3>
                            </div>
                            <div class="col-md-2">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Unit Price') }}</h3>
                            </div>
                            <div class="col-md-2">
                                <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Quantity') }}</h3>
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
                                                <a href="{{ route('product.show',[$orderDetail->product->id,$orderDetail->product->slug]) }}" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Explore</a>
                                            </div>
                                        </div>
                                        <div class="c-bg-img-top-center c-overlay-object" data-height="height">
                                            <img width="100%" class="img img-responsive" src="{{ asset('uploads/products/'.$orderDetail->product->detail->main_image) }}" style="height: 100px;width: 100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-8">
                                    <ul class="c-list list-unstyled">
                                        <li class="c-margin-b-25"><a href="{{ route('product.show',[$orderDetail->product->id,$orderDetail->product->slug]) }}" class="c-font-bold c-font-22 c-theme-link">{{$orderDetail->product->name}}</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">{{ __('Unit Price') }}</p>
                                    <p class="c-font-sbold c-font-uppercase c-font-18">{{$orderDetail->product->detail->getFinalPriceWithCurrency() }}
                                        @if($orderDetail->product->detail->is_sale)
                                            &nbsp;<span class="c-font-line-through c-font-red">{{ $orderDetail->product->detail->getPriceWithCurrency() }}</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">{{ __('Quantity') }}</p>
                                    <p class="c-font-sbold c-font-uppercase c-font-18">{{$orderDetail->quantity }}</p>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">Total</p>
                                    <p class="c-font-sbold c-font-18">{{ ($orderDetail->quantity * $orderDetail->product->detail->final_price) . ' ' . $selectedCountry['currency_'.app()->getLocale()] }}
                                        {{--@if($orderDetail->product->detail->is_sale)--}}
                                            {{--&nbsp;<span class="c-font-line-through c-font-red">{{ ($orderDetail->quantity * $orderDetail->product->detail->price) . ' ' . $selectedCountry['currency_'.app()->getLocale()] }}</span>--}}
                                        {{--@endif--}}
                                    </p>

                                </div>
                            </div>
                        </div>

                    @endforeach
                    <div class="c-row-item c-row-total c-right">
                        <ul class="c-list list-unstyled">
                            <li>
                                <h3 class="c-font-regular c-font-22">{{ __('Subtotal') }} : &nbsp;
                                    &nbsp;<span class="c-font-line-through c-font-red">{{$order->net_amount . ' ' . $selectedCountry['currency_'.app()->getLocale()] }}</span>
                                </h3>
                            </li>
                            <li>
                                <h3 class="c-font-regular c-font-22">{{ __('Grand Total') }} : &nbsp;
                                    <span class="c-font-dark c-font-bold c-font-22">{{$order->sale_amount . ' ' . $selectedCountry['currency_'.app()->getLocale()]}}</span>
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
                                <li>Email: <a href="mailto:{{$order->email}}" class="c-theme-color">{{$order->email}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 c-margin-t-20">
                        <div data-height="height">
                            <h3 class=" c-margin-b-20 c-font-uppercase c-font-22 c-font-bold">{{ __('Billing Address') }}</h3>
                            <ul class="list-unstyled">
                                <li>{{ $order->recipient_firstname . ' ' . $order->recipient_lastname  }}</li>
                                <li>
                                    {{ __('Block') . ' ' . $order->block }},
                                    {{ __('Street') . ' ' . $order->street }}
                                    <br>
                                    {{ $order->area->name }},
                                    {{ $order->country->name }}
                                    <br>
                                    {{ $order->mobile }}
                                    @if($order->phone)
                                        , {{ $order->phone }},
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button onclick="window.print();" class="btn btn-print btn-group btn-default btn-sm"><i class="fa fa-print pr-10 pl-5"></i> {{ __('Print') }}</button>
                </div>

            </div>
        </div>
    </div>

@endsection