@extends('layouts.master')

@section('content')
    @component('partials.breadcrumb',['title' => 'Checkout', 'nav'=>true])
        <li ><a href="{{ route('cart.index') }}">{{ __('Cart') }}</a></li>
        <li >/</li>
        <li class="c-active"><a href="{{ route('checkout') }}">{{ __('Checkout') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg">
        <div class="container">
            @include('partials.notifications')

            <form class="c-shop-form-1" method="POST" action="{{ route('checkout') }}">

                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-7 c-padding-20">
                        <h3 class="c-font-bold c-font-uppercase c-font-24">{{ __('Shipping Address') }}</h3>

                        @if($hasAddress)
                            {{ $shippingAddress->firstname . ' ' . $shippingAddress->lastname }}, <br>
                            {{ __('Block') . ' ' . $shippingAddress->block }},
                            {{ __('Street') . ' ' . $shippingAddress->street }},
                            @if($shippingAddress->house)
                                {{ __('House') . ' ' . $shippingAddress->house }},
                            @endif
                            <br>
                            {{ $shippingAddress->area->name }},
                            {{ $shippingAddress->country->name }}
                            <br>
                            {{ $shippingAddress->mobile }}
                            @if($shippingAddress->phone)
                                , {{ $shippingAddress->phone }},
                            @endif
                        @else
                            <div class="c-shipping-address">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">{{ __('Country') }} <span class="red">*</span> </label>
                                                <select name="country_id" class="form-control c-square c-theme">
                                                    <option value="{{ $selectedCountry['id'] }}">{{ $selectedCountry['name_'.app()->getLocale()] }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">{{ __('Area') }} <span class="red">*</span> </label>
                                                <select name="area_id" class="form-control c-square c-theme">
                                                    @foreach($selectedCountry['areas'] as $area)
                                                        <option value="{{ $area['id']  }}"
                                                                {{ old('area_id') == $area['id'] ? "selected": ($selectedArea['id'] == $area['id']) ? 'selected' : '' }}
                                                        >{{ $area['name_'.app()->getLocale()] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">{{ __('First Name') }} <span class="red">*</span></label>
                                                        <input name="firstname" type="text" value="{{old('firstname')}}" class="form-control c-square c-theme" placeholder="{{ __('First Name') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">{{ __('Last Name') }} <span class="red">*</span></label>
                                                        <input name="lastname" type="text" value="{{old('lastname')}}" class="form-control c-square c-theme" placeholder="{{ __('Last Name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">{{ __('Block') }} <span class="red">*</span></label>
                                                        <input name="block" type="text" value="{{old('block')}}" class="form-control c-square c-theme" placeholder="{{ __('Block') }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">{{ __('Street') }} <span class="red">*</span></label>
                                                        <input name="street" type="text" value="{{old('street')}}" class="form-control c-square c-theme" placeholder="{{ __('Street') }}">
                                                    </div><div class="col-md-4">
                                                        <label class="control-label">{{ __('House / Apartment') }} </label>
                                                        <input name="house" type="text" value="{{old('house')}}" class="form-control c-square c-theme" placeholder="{{ __('house') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">{{ __('Mobile') }} <span class="red">*</span></label>
                                                        <input name="mobile" type="tel" value="{{old('mobile')}}" class="form-control c-square c-theme" placeholder="{{ __('Mobile') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">{{ __('Phone') }} </label>
                                                        <input name="phone" type="tel" value="{{old('phone')}}" class="form-control c-square c-theme" placeholder="{{ __('Phone') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- END: ADDRESS FORM -->
                    <!-- BEGIN: ORDER FORM -->
                    <div class="col-md-5">
                        <div class="c-content-bar-1 c-align-left c-bordered c-theme-border c-shadow">
                            <h1 class="c-font-bold c-font-uppercase c-font-24">Your Order</h1>
                            <ul class="c-order list-unstyled">
                                <li class="row c-margin-b-15">
                                    <div class="col-md-6 c-font-20"><h2>{{ __('Product') }}</h2></div>
                                    <div class="col-md-6 c-font-20"><h2>{{ __('Total') }}</h2></div>
                                </li>
                                <li class="row c-border-bottom"></li>
                                @foreach($cart->items as $product)
                                    <li class="row c-margin-b-15 c-margin-t-15">
                                        <div class="col-md-6 c-font-20"><a href="{{ route('product.show',[$product->id,$product->slug])}}" class="c-theme-link">{{ $product->name }} x {{ $product->quantity }}</a></div>
                                        <div class="col-md-6 c-font-20">
                                            <p class="">{{ $product->detail->getPriceWithCurrency() }}</p>
                                        </div>
                                    </li>
                                @endforeach

                                <li class="row c-border-top c-margin-b-15"></li>
                                <li class="row c-margin-b-15 c-margin-t-15">
                                    <div class="col-md-6 c-font-20">
                                        <p class="c-font-30">Total</p>
                                    </div>
                                    <div class="col-md-6 c-font-20">
                                        <p class="c-font-bold c-font-30">KD<span class="c-shipping-total">{{ $cart->subTotal }}</span></p>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-md-12">
                                        <div class="c-radio-list">
                                            <div class="c-radio">
                                                <input type="radio" id="radio3" class="c-radio" name="payment" checked="">
                                                <label for="radio3" class="c-font-bold c-font-20">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    Knet / Visa
                                                </label>
                                                <img class="img-responsive" width="250" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png" />
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="row">
                                    <div class="form-group col-md-12" role="group">
                                        <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">{{ __('Continue to Payment') }}</button>
                                        <button type="submit" class="btn btn-lg btn-default c-btn-square c-btn-uppercase c-btn-bold">{{ __('Cancel') }}</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection