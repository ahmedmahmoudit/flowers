@extends('layouts.master')

@section('script')
    @parent
    <script>

      $(document).ready(function() {
        $('#apply_coupon').click(submit_search);
        $('#coupon-form').find('input').keydown(keypressed);
      });

      function submit_search(event) {
        event.preventDefault();
        var couponCode = $('#coupon').val();
        if (couponCode) {
          do_submit(couponCode);
        }
        return false;
      }

      //      function addCoupon() {
      //        $('form#add-coupon').submit();
      //      };

      function keypressed(event) {
        var charcode = (event.which) ? event.which : window.event.keyCode;
        if (charcode === 13) {
          return submit_search(event);
        }
        return true;
      }

      function do_submit(code) {
        var form = $(document.createElement('form'));
        $(form).attr("action", "/cart/coupon/apply");
        $(form).attr("method", "POST");

        var csrfToken = $("<input>")
          .attr("type", "hidden")
          .attr("name", "_token")
          .val('{{ csrf_token() }}');

        var coupon = $("<input>")
          .attr("type", "text")
          .attr("name", "coupon")
          .val(code );

        $(form).append(coupon);
        $(form).append(csrfToken);

        form.appendTo( document.body );

        $(form).submit();

      }

    </script>
@endsection

@section('content')

    @component('partials.breadcrumb',['title' => 'Cart', 'nav'=>true])
        <li class="c-active"><a href="{{ route('cart.index') }}">{{ __('Cart') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg">
        <div class="container">

            @include('partials.notifications')

            @if(!$cart->items->count() > 0)
                @include('cart.empty')
            @else
                <form method="POST" action="{{ route('cart.update') }}" >
                    {{ csrf_field() }}

                    <div class="c-shop-cart-page-1">
                        <div class="row c-cart-table-title">
                            <div class="col-md-2 c-cart-image">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">{{ __('Image') }}</h3>
                            </div>
                            <div class="col-md-5 c-cart-desc">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">{{ __('Description') }}</h3>
                            </div>
                            <div class="col-md-1 c-cart-qty">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">{{ __('Qty') }}</h3>
                            </div>
                            <div class="col-md-2 c-cart-price">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">{{ __('Unit Price') }}</h3>
                            </div>
                            <div class="col-md-1 c-cart-total">
                                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">{{ __('Total') }}</h3>
                            </div>
                            <div class="col-md-1 c-cart-remove"></div>
                        </div>
                        @foreach($cart->items as $product)
                            <div class="row c-cart-table-row">
                                <div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
                                    <img src="/img/{{ rand(1,7) }}.jpg"/>
                                </div>
                                <div class="col-md-5 col-sm-9 col-xs-7 c-cart-desc">
                                    <h3><a href="{{ route('product.show',[$product->id,$product->slug]) }}" class="c-font-bold c-theme-link c-font-22 c-font-dark">{{ $product->name }}</a></h3>
                                </div>

                                <div class="col-md-1 col-sm-3 col-xs-6 c-cart-qty">
                                    <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">{{ __('QTY') }}</p>
                                    <div class="c-input-group c-spinner">
                                        <input type="text" name="quantity_{{$product->id}}" class="form-control c-item-{{$product->id}}" value="{{ $product->quantity }}">
                                        <div class="c-input-group-btn-vertical">
                                            <button class="btn btn-default" type="button" data_input="c-item-{{$product->id}}" data-maximum="10"><i class="fa fa-caret-up"></i></button>
                                            <button class="btn btn-default" type="button" data_input="c-item-{{$product->id}}"><i class="fa fa-caret-down"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-6 c-cart-price">
                                    <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">{{ __('Unit Price') }}</p>
                                    <p class="c-cart-price c-font-bold">{{ $product->detail->getFinalPriceWithCurrency()  }}
                                        @if($product->detail->is_sale)
                                            &nbsp;<span class="c-font-line-through c-font-red">{{ $product->detail->getPriceWithCurrency() }}</span>
                                        @endif
                                    </p>

                                </div>
                                <div class="col-md-1 col-sm-3 col-xs-6 c-cart-total">
                                    <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">{{ __('Total') }}</p>
                                    <p class="c-cart-price c-font-bold">{{ $product->grandTotal . ' ' . $selectedCountry['currency_'.app()->getLocale()] }}</p>
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

                            <div class="c-margin-t-20">
                                <div class="col-sm-6">
                                    <h3 class="c-title c-font-30 c-font-uppercase c-font-bold">{{ __('Have Coupon ?') }}</h3>
                                </div>
                                <div class="col-sm-6">
                                    <div id="coupon-form" class="input-group input-group-lg">
                                        <input type="text" name="coupon"  id="coupon" class="form-control input-lg" placeholder="{{ __('Coupon Code') }}">
                                        <span class="input-group-btn">
								        <button id="apply_coupon" type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-sbold c-btn-square">{{ __('Apply') }}</button>
							        </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        @if($cart->subTotal != $cart->actualAmount)
                            <div class="row">
                                <div class="c-cart-subtotal-row ">
                                    <div class="col-md-2 col-md-offset-9 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                        <h3 class="c-font-uppercase c-font-bold c-right c-font-16 c-font-grey-2">{{ __('Actual amount') }}</h3>
                                    </div>
                                    <div class="col-md-1 col-sm-6 col-xs-6 c-cart-subtotal-border">

                                        <h3 class="c-font-bold c-font-16 c-font-line-through c-font-red">
                                            {{ $cart->actualAmount . ' ' . $selectedCountry['currency_'.app()->getLocale()] }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="c-cart-subtotal-row">
                                <div class="col-md-2 col-md-offset-9 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                    <h3 class="c-font-uppercase c-font-bold c-right c-font-16 c-font-grey-2">{{ __('Sub total') }}</h3>
                                </div>
                                <div class="col-md-1 col-sm-6 col-xs-6 c-cart-subtotal-border">

                                    <h3 class="c-font-bold c-font-16">
                                        {{ $cart->subTotal . ' ' . $selectedCountry['currency_'.app()->getLocale()] }}
                                    </h3>
                                </div>
                            </div>
                        </div>

                        @if($cart->coupon)
                            <div class="row">
                                <div class="c-cart-subtotal-row">
                                    <div class="col-md-2 col-md-offset-9 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                        <h3 class="c-font-uppercase c-font-bold c-right c-font-16 c-font-grey-2">{{ __('Coupon') }}</h3>
                                    </div>
                                    <div class="col-md-1 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                        <h3 class="c-font-bold c-font-16">{{ $cart->coupon->percentage }} %</h3>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="c-cart-subtotal-row">
                                <div class="col-md-2 col-md-offset-9 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                    <h3 class="c-font-uppercase c-font-bold c-right c-font-16 c-font-grey-2">Grand Total</h3>
                                </div>
                                <div class="col-md-1 col-sm-6 col-xs-6 c-cart-subtotal-border">
                                    <h3 class="c-font-bold c-font-16">{{ $cart->grandTotal . ' ' . $selectedCountry['currency_'.app()->getLocale()] }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="c-cart-buttons">
                            <button type="submit" class="btn c-btn btn-lg c-btn-red c-btn-square c-font-white c-font-bold c-font-uppercase c-cart-float-l">Update Cart</button>
                            <a href="{{ route('checkout') }}" class="btn c-btn btn-lg c-theme-btn c-btn-square c-font-white c-font-bold c-font-uppercase c-cart-float-r">Checkout</a>
                        </div>
                    </div>
                </form>
            @endif

        </div>
    </div>
@endsection