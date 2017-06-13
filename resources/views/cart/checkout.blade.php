@extends('layouts.master')

@section('content')
    @component('partials.breadcrumb',['title' => 'Checkout', 'nav'=>true])
        <li ><a href="{{ route('cart.index') }}">{{ __('Cart') }}</a></li>
        <li >/</li>
        <li class="c-active"><a href="{{ route('checkout') }}">{{ __('Checkout') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg">
        <div class="container">
            <form class="c-shop-form-1">
                <div class="row">
                    <div class="col-md-7 c-padding-20">
                        <h3 class="c-font-bold c-font-uppercase c-font-24">Billing Address</h3>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Country</label>
                                <select class="form-control c-square c-theme">
                                    <option value="1">Malaysia</option>
                                    <option value="2">Singapore</option>
                                    <option value="3">Indonesia</option>
                                    <option value="4">Thailand</option>
                                    <option value="5">China</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">First Name</label>
                                        <input type="text" class="form-control c-square c-theme" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" class="form-control c-square c-theme" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Company Name</label>
                                <input type="text" class="form-control c-square c-theme" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Address</label>
                                <input type="text" class="form-control c-square c-theme" placeholder="Street Address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control c-square c-theme" placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Town / City</label>
                                <input type="text" class="form-control c-square c-theme" placeholder="Town / City">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">State / County</label> <select class="form-control c-square c-theme">
                                            <option value="0">Select an option...</option>
                                            <option value="1">Malaysia</option>
                                            <option value="2">Singapore</option>
                                            <option value="3">Indonesia</option>
                                            <option value="4">Thailand</option>
                                            <option value="5">China</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Postcode / Zip</label>
                                        <input type="text" class="form-control c-square c-theme" placeholder="Postcode / Zip">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Email Address</label>
                                        <input type="email" class="form-control c-square c-theme" placeholder="Email Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Phone</label>
                                        <input type="tel" class="form-control c-square c-theme" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row c-margin-t-15">
                            <div class="form-group col-md-12">
                                <div class="c-checkbox c-toggle-hide" data-object-selector="c-account" data-animation-speed="600">
                                    <input type="checkbox" id="checkbox1-77" class="c-check">
                                    <label for="checkbox1-77">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Create an account?
                                    </label>
                                </div>
                                <p class="help-block">Create an account by entering the information below. If you are a returning customer please login.</p>
                            </div>
                        </div>
                        <div class="row c-account">
                            <div class="form-group col-md-12">
                                <label class="control-label">Account Password</label>
                                <input type="password" class="form-control c-square c-theme" placeholder="Password">
                            </div>
                        </div>
                        <!-- BILLING ADDRESS -->
                        <!-- SHIPPING ADDRESS -->
                        <h3 class="c-font-bold c-font-uppercase c-font-24">Shipping Address</h3>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="c-checkbox-inline">
                                    <div class="c-checkbox c-toggle-hide" data-object-selector="c-shipping-address" data-animation-speed="600">
                                        <input type="checkbox" id="checkbox6-444" class="c-check">
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
                                <div class="form-group col-md-12">
                                    <label class="control-label">Country</label> <select class="form-control c-square c-theme">
                                        <option value="1">Malaysia</option>
                                        <option value="2">Singapore</option>
                                        <option value="3">Indonesia</option>
                                        <option value="4">Thailand</option>
                                        <option value="5">China</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">First Name</label>
                                            <input type="text" class="form-control c-square c-theme" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" class="form-control c-square c-theme" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Company Name</label>
                                    <input type="text" class="form-control c-square c-theme" placeholder="Company Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Address</label>
                                    <input type="text" class="form-control c-square c-theme" placeholder="Street Address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control c-square c-theme" placeholder="Apartment, suite, unit etc. (optional)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Town / City</label>
                                    <input type="text" class="form-control c-square c-theme" placeholder="Town / City">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">State / County</label> <select class="form-control c-square c-theme">
                                                <option value="0">Select an option...</option>
                                                <option value="1">Malaysia</option>
                                                <option value="2">Singapore</option>
                                                <option value="3">Indonesia</option>
                                                <option value="4">Thailand</option>
                                                <option value="5">China</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Postcode / Zip</label>
                                            <input type="text" class="form-control c-square c-theme" placeholder="Postcode / Zip">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Email Address</label>
                                            <input type="email" class="form-control c-square c-theme" placeholder="Email Address">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Phone</label>
                                            <input type="tel" class="form-control c-square c-theme" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SHIPPING ADDRESS -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Order Notes</label>
                                <textarea class="form-control c-square c-theme" rows="3" placeholder="Note about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
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
                                            <p class="">{{ $product->getPriceWithCurrency() }}</p>
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
                                                <input type="radio" id="radio1" class="c-radio" name="payment" checked="">
                                                <label for="radio1" class="c-font-bold c-font-20">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    Direct Bank Transfer
                                                </label>
                                                <p class="help-block">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>

                                            <div class="c-radio">
                                                <input type="radio" id="radio3" class="c-radio" name="payment">
                                                <label for="radio3" class="c-font-bold c-font-20">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    Paypal
                                                </label>
                                                <img class="img-responsive" width="250" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png" />
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="row c-margin-b-15 c-margin-t-15">
                                    <div class="form-group col-md-12">
                                        <div class="c-checkbox">
                                            <input type="checkbox" id="checkbox1-11" class="c-check">
                                            <label for="checkbox1-11">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                I’ve read and accept the Terms & Conditions
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="form-group col-md-12" role="group">
                                        <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Submit</button>
                                        <button type="submit" class="btn btn-lg btn-default c-btn-square c-btn-uppercase c-btn-bold">Cancel</button>
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