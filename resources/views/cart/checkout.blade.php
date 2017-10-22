@extends('layouts.master')

@section('content')
    @component('partials.breadcrumb',['title' => __('Checkout'), 'nav'=>true])
        <li><a href="{{ route('cart.index') }}">{{ __('Cart') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('checkout') }}">{{ __('Checkout') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg">
        <div class="container">
            @include('partials.notifications')

            @if($cart->items->count() <= 0)
                @include('cart.empty')
            @else
                <form class="c-shop-form-1" method="POST" action="{{ route('checkout') }}">

                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-7">

                            <h3 class="c-font-bold c-font-uppercase c-font-24">{{ __('Your Information') }}</h3>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label class="control-label">{{ __('First Name') }} <span
                                                        class="red">*</span></label>
                                            <input name="firstname" type="text"
                                                   value="{{ old('firstname') }}"
                                                   class="form-control c-square c-theme"
                                                   placeholder="{{ __('First Name') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">{{ __('Last Name') }} <span
                                                        class="red">*</span></label>
                                            <input name="lastname" type="text" value="{{ old('lastname') }}"
                                                   class="form-control c-square c-theme"
                                                   placeholder="{{ __('Last Name') }}">
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">{{ __('Email') }} <span
                                                                class="red">*</span></label>
                                                    <input name="email" type="text" value="{{ old('email') }}"
                                                           class="form-control c-square c-theme"
                                                           placeholder="{{ __('Email') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="control-label">{{ __('Mobile') }} <span
                                                                class="red">*</span></label>
                                                    <input name="mobile" type="tel" value="{{ old('mobile') }}"
                                                           class="form-control c-square c-theme"
                                                           placeholder="{{ __('Mobile') }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>

                            <h3 class="c-font-bold c-font-uppercase c-font-24">{{ __('Recipient Information') }}</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <label class="control-label">{{ __('First Name') }} <span
                                                        class="red">*</span></label>
                                            {{--<input name="recipient_firstname" type="text" value="{{old('firstname')}}" class="form-control c-square c-theme" placeholder="{{ __('First Name') }}">--}}
                                            <input name="recipient_firstname" type="text"
                                                   value="{{ old('recipient_firstname') }}"
                                                   class="form-control c-square c-theme"
                                                   placeholder="{{ __('First Name') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label">{{ __('Last Name') }} <span
                                                        class="red">*</span></label>
                                            {{--                                            <input name="recipient_lastname" type="text" value="{{old('lastname')}}" class="form-control c-square c-theme" placeholder="{{ __('Last Name') }}">--}}
                                            <input name="recipient_lastname" type="text"
                                                   value="{{ old('recipient_lastname') }}"
                                                   class="form-control c-square c-theme"
                                                   placeholder="{{ __('Last Name') }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="control-label">{{ __('Mobile') }} <span
                                                        class="red">*</span></label>
                                            {{--                                            <input name="recipient_mobile" type="tel" value="{{old('mobile')}}" class="form-control c-square c-theme" placeholder="{{ __('Mobile') }}">--}}
                                            <input name="recipient_mobile" type="tel"
                                                   value="{{ old('recipient_mobile') }}"
                                                   class="form-control c-square c-theme"
                                                   placeholder="{{ __('Mobile') }}">
                                        </div>

                                        <div style="padding-top:10px">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">{{ __('Card Notes') }}</label>
                                                <textarea name="card_notes" class="form-control c-square c-theme"
                                                          rows="3"
                                                          placeholder="{{ __('Special messages to be written on the card') }}">{{ old('card_notes') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <h3 class="c-font-bold c-font-uppercase c-font-24">{{ __('Shipping Address') }}</h3>

                            @if($user && $user->addresses->count())
                                @foreach( $user->addresses as $address)
                                    <div>

                                        <label>

                                            <div class="form-group">
                                                <input type="radio" value="{{ $address->id }}"
                                                       {{ old('address_id') ? $address->id == old('address_id') ? 'checked' : '' : $loop->first ? 'checked' :''  }}
                                                       name="address_id">
                                                <label>{{ $address->area->name }}</label>

                                                <br>
                                                {{ __('Block') . ' ' . $address->block }},
                                                {{ __('Street') . ' ' . $address->street }},
                                                @if($address->house)
                                                    {{ __('House') . ' ' . $address->house }},
                                                @endif
                                                <br>
                                                {{ $address->area->name }},
                                                {{ $address->country->name }}
                                                <br>
                                                {{ $address->mobile }}
                                                @if($address->phone)
                                                    , {{ $address->phone }}
                                                @endif

                                            </div>
                                        </label>

                                    </div>

                                @endforeach
                            @endif

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="c-checkbox-inline">
                                        <div class="c-checkbox c-toggle-hide" data-object-selector="c-shipping-address" data-animation-speed="600">
                                            <input type="checkbox" id="checkbox6-444" name="new_address" class="c-check">
                                            <label for="checkbox6-444">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Ship to different address?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="c-shipping-address">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label">{{ __('Area') }}
                                                </label>
                                                <select name="area_id" class="form-control c-square c-theme">
                                                    <option value="">{{ __('select') }}</option>
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
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">{{ __('Block') }}</label>
                                                        {{--                                                        <input name="block" type="text" value="{{old('block')}}" class="form-control c-square c-theme" placeholder="{{ __('Block') }}">--}}
                                                        <input name="block" type="text" value="{{ old('block') }}"
                                                               class="form-control c-square c-theme"
                                                               placeholder="{{ __('Block') }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">{{ __('Street') }} </label>
                                                        {{--                                                        <input name="street" type="text" value="{{old('street')}}" class="form-control c-square c-theme" placeholder="{{ __('Street') }}">--}}
                                                        <input name="street" type="text" value="{{ old('street') }}"
                                                               class="form-control c-square c-theme"
                                                               placeholder="{{ __('Street') }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">{{ __('House') }} </label>
                                                        <input name="house" type="text" value="{{old('house')}}"
                                                               class="form-control c-square c-theme"
                                                               placeholder="{{ __('House') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row" style="padding-top:10px">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">{{ __('Order Notes') }}</label>
                                                <textarea name="order_notes" class="form-control c-square c-theme"
                                                          rows="3"
                                                          placeholder="{{ __('Order Notes') }}">{{ old('order_notes') }}</textarea>
                                            </div>
                                        </div>


                                        <h5>{{ __('If you want the order to be delivered at specific time, please mentioned the time in the notes section above') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: ADDRESS FORM -->
                        <!-- BEGIN: ORDER FORM -->
                        <div class="col-md-5">
                            <div class="c-content-bar-1 c-align-left c-bordered c-theme-border c-shadow">
                                <h1 class="c-font-bold c-font-uppercase c-font-24">{{ __('Your Order') }}</h1>
                                <ul class="c-order list-unstyled">
                                    <li class="row c-margin-b-15">
                                        <div class="col-md-6 c-font-20"><h2>{{ __('Product') }}</h2></div>
                                        <div class="col-md-6 c-font-20"><h2>{{ __('Total') }}</h2></div>
                                    </li>
                                    <li class="row c-border-bottom"></li>
                                    @foreach($cart->items as $product)
                                        <li class="row c-margin-b-15 c-margin-t-15">
                                            <div class="col-md-6 c-font-20"><a
                                                        href="{{ route('product.show',[$product->id,$product->slug])}}"
                                                        class="c-theme-link">{{ $product->name }}
                                                    x {{ $product->quantity }}</a></div>
                                            <div class="col-md-6 c-font-20">
                                                <p class="">{{ $product->quantity * $product->detail->final_price . ' ' .$selectedCountry['currency_'.app()->getLocale()] }}</p>
                                            </div>
                                        </li>
                                    @endforeach

                                    <li class="row c-border-top c-margin-b-15"></li>
                                    <li class="row c-margin-b-15 c-margin-t-15">
                                        <div class="col-md-6 c-font-20">
                                            <p class="c-font-30">{{ __('Total') }}</p>
                                        </div>
                                        <div class="col-md-6 c-font-20">
                                            <p class="c-font-bold c-font-30"><span
                                                        class="c-shipping-total">{{ $cart->grandTotal . ' ' .$selectedCountry['currency_'.app()->getLocale()]}}</span>
                                            </p>
                                        </div>
                                    </li>


                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="c-radio-list">
                                                <div class="c-radio">
                                                    {!! Form::radio('payment_method','KNET',true,['class'=>'c-radio','id'=>'radio1']) !!}
                                                    <label for="radio1" class="c-font-bold c-font-20">
                                                        <img src="/img/knet.png" class="payment-icon"
                                                             style="width:50px"/>
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        {{ __('KNET') }}
                                                    </label>
                                                </div>
                                                <div class="c-radio">
                                                    {!! Form::radio('payment_method','VISA',false,['class'=>'c-radio','id'=>'radio2']) !!}

                                                    <label for="radio2" class="c-font-bold c-font-20">
                                                        <img src="/img/visa.png"
                                                             class="payment-icon"/>
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        {{ __('VISA') }}
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{--<li class="row">--}}
                                    {{--<div class="col-md-12">--}}
                                    {{--<div class="c-radio-list">--}}
                                    {{--<div class="c-radio">--}}
                                    {{--<input type="radio" id="radio3" class="c-radio" name="payment"--}}
                                    {{--checked="">--}}
                                    {{--<label for="radio3" class="c-font-bold c-font-20">--}}
                                    {{--<span class="inc"></span>--}}
                                    {{--<span class="check"></span>--}}
                                    {{--<span class="box"></span>--}}
                                    {{--{{ __('Knet / Visa') }}--}}
                                    {{--</label>--}}
                                    {{--<div>--}}
                                    {{--<span class="list-inline">--}}
                                    {{--<img class="img-responsive"--}}
                                    {{--width="150;height:60"--}}
                                    {{--style="width: 150px;height:50px"--}}
                                    {{--src="/img/payment-icon.png"/>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}

                                    <li class="row">
                                        <div class="form-group col-md-12" role="group">
                                            <button type="submit"
                                                    class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">{{ __('Continue to Payment') }}</button>
                                            <button type="submit"
                                                    class="btn btn-lg btn-default c-btn-square c-btn-uppercase c-btn-bold">{{ __('Cancel') }}</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection