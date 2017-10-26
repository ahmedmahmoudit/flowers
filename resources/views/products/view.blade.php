@extends('layouts.master')

@section('style')
    @parent
    <style>
        input::-webkit-input-placeholder {
            color: red !important;
        }

        input:-moz-placeholder { /* Firefox 18- */
            color: red !important;
        }

        input::-moz-placeholder { /* Firefox 19+ */
            color: red !important;
        }

        input:-ms-input-placeholder {
            color: red !important;
        }
    </style>
    <link href="/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('script')
    @parent
    <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="/js/datepicker.js" type="text/javascript"></script>

    <script>

      $(document).ready(function () {
        $('#delivery-time').hide();

        $('.select-time').on("click", function () {
          $("#time-picker-modal").trigger('click');
          var time = $(this).data("time");
          var value = $(this).data("value");
          $('input[name="delivery_time"]').val(time);
          $('#delivery-time-result').html(value).css('color', '#32c5d2');
          $('#delivery-time').show();
        })
      })
    </script>

@endsection
@section('content')

    @component('partials.breadcrumb',['title' => $product->name, 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('product.show',[$product->id,$product->slug]) }}">{{ ucfirst($product->name) }}</a>
        </li>
    @endcomponent
    {{Counter::count('product', $product->id)}}
    <div class="c-content-box c-size-md">

        <div class="container">

            @include('partials.notifications')

            <div class="c-shop-product-details-2 c-opt-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="c-product-gallery">
                            <div class="c-product-gallery-content">
                                <div class="c-zoom">
                                    <img src="{{ asset('uploads/products/'.$product->detail->main_image) }}"
                                         class="img img-responsive">
                                </div>
                                @if($product->productImages && $product->productImages->count())
                                    @foreach($product->productImages as $image)
                                        <div class="c-zoom">
                                            <img src="{{ asset('uploads/products/'.$image->image) }}"
                                                 class="img img-responsive"
                                            >
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="row c-product-gallery-thumbnail">

                                <div class="col-xs-3 c-product-thumb img img-responsive">
                                    <img src="{{ asset('uploads/products/'.$product->detail->main_image) }}"
                                         class="img img-responsive">
                                </div>
                                @if($product->productImages && $product->productImages->count())
                                    @foreach($product->productImages as $image)
                                        <div class="col-xs-3 c-product-thumb img img-responsive">
                                            <img src="{{ asset('uploads/products/'.$image->image) }}"
                                                 class="img img-responsive">
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="c-product-meta">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">{{ $product->name }}</h3>
                                <p class="c-font-bold">{{ __('Item Code') }} : <span
                                            style="font-weight: normal"> {{ $product->sku  }}</span></p>

                                <p class="hint">{{ __('Store') }}: <a
                                            href="{{route('search',['store'=>$product->store->slug])}}">{{ $product->store->name }}</a>
                                </p>
                                <div class="c-line-left"></div>

                            </div>

                            <div class="c-product-badge">
                                @if($product->detail->is_sale)
                                    <div class="c-product-sale">{{ __('Sale') }}</div>
                                @endif

                                @if($product->detail->in_stock)
                                    <div class="c-product-new">{{ __('In Stock') }}</div>
                                @else
                                    <div class="c-product-sale">{{ __('Out of Stock') }}</div>
                                @endif
                            </div>

                            <div class="c-product-price" style="clear: both;">
                                {{ $product->detail->getFinalPriceWithCurrency() }}
                                @if($product->detail->is_sale)
                                    <span class="c-font-18 c-font-line-through c-font-red">{{ $product->detail->getPriceWithCurrency() }}</span>
                                @endif
                            </div>

                            @if($product->natural)
                                <p><b><i class="fa fa-check c-font-green"></i> {{ __('Natural') }}</b></p>
                            @endif

                            {{-- <p class="c-product-meta-label c-font-bold">{{ __('Weight'). ' :  ' . $product->detail->weight }}</p>--}}
                            <p class="c-product-meta-label c-font-bold">{{ __('height'). ' :  ' . $product->detail->height . __('cm') }}</p>
                            <p class="c-product-meta-label c-font-bold">{{ __('width'). ' :  ' .  $product->detail->width . __('cm') }} </p>

                            <div class="row c-product-variant">
                                <div class="col-sm-12 col-xs-12">


                                    <p class="c-product-meta-label"
                                       style="padding-top:9px">{{ $product->userLikes->count() }} {{ __('Likes') }}:</p>
                                    <div class="btn-group" role="group" style="margin-bottom: 20px">
                                        <form method="POST" action="{{route('product.favorite',$product->id)}}">
                                            {{ csrf_field() }}

                                            <button type="submit"
                                                    class="btn  c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover  c-btn-product">
                                                @if(auth()->check() && $product->userLikes && $product->userLikes->contains('id',auth()->id()))
                                                    <i class="fa fa-heart" style="color: red;font-size: 2.0em"></i>
                                                @else
                                                    <i class="fa fa-heart-o" style="color: red;font-size: 2.0em"></i>
                                                @endif
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                            <div class="row c-product-variant">
                                <div class="col-sm-12 col-xs-12">
                                    <p class="c-product-meta-label c-product-margin-1  c-font-bold">{{ __('Description') }}
                                        :</p>
                                    <div class="btn-group" role="group" style="margin-bottom: 20px">
                                    </div>

                                </div>
                            </div>

                            <div class="c-product-short-desc">
                                {{ $product->detail->description }}
                            </div>

                            @if(in_array($product->id,$cartItems->keys()->toArray()))
                                <a href="{{ route('cart.item.remove',$product->id) }}"
                                   class="btn c-btn btn-lg c-btn-red c-btn-square c-font-white c-font-bold c-font-uppercase c-cart-float-l">{{ __('Remove from Cart') }}</a>
                            @else
                                @if($product->detail->in_stock)

                                    <form method="POST" action="{{route('cart.item.add')}}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="">
                                                        {{ __('Delivery Date') }}
                                                        <i class="fa fa-calendar"></i>
                                                    </label>

                                                    <div class="date date-picker" data-date-format="yyyy/mm/dd"
                                                         data-rtl="false">
                                                        <input type="text" class="" style="border:0;color:#32c5d2;"
                                                               name="delivery_date"
                                                               value="{{ old('delivery_date') ? old('delivery_date') :''}}"
                                                               placeholder="{{ __('Select Delivery Day')  }}"
                                                        >
                                                        <span class="input-group-btn">
										                    <button class="btn default c-btn-square" type="button"
                                                                    style="background: white;border: 0"></button>
										                </span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="">

                                                        {{ __('Delivery Time') }}
                                                        <i class="fa fa-clock-o"></i>
                                                    </label>

                                                    <button type="button" class="" data-toggle="modal"
                                                            data-target="#time-picker-modal"
                                                            id="delivery-time-result"
                                                            style="display: block;background: white; border:none;padding:0"

                                                    >
                                                        <span style="padding:0;margin:0">
                                                            @if(old('delivery_time'))
                                                                @foreach($deliveryTimes as $time)
                                                                    @if($time->id == old('delivery_time'))
                                                                        <span style="color:#32c5d2 ">{{ $time->name}}</span>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <span class="red">
                                                                    {{ __('Select Delivery Time') }}
                                                                </span>
                                                            @endif
                                                        </span>
                                                    </button>

                                                    <div class="modal fade" id="time-picker-modal" tabindex="-1"
                                                         role="dialog" aria-labelledby="myLargeModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-lg ">
                                                            <div class="modal-content c-square">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title"
                                                                        id="myLargeModalLabel">{{ __('Select Delivery Time') }}</h4>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <input type="hidden"
                                                                           value="{{ old('delivery_time') }}"
                                                                           name="delivery_time"/>
                                                                    <div style="margin: 0 auto">
                                                                        @foreach($deliveryTimes as $time)
                                                                            <a class="btn c-btn btn-lg c-font-bold c-font-white btn-warning c-btn-square c-font-uppercase select-time "
                                                                               data-time="{{$time->id}}"
                                                                               data-value="{{$time->name}}"
                                                                               style="margin-bottom:10px"
                                                                            @if(old('delivery_time') == $time->id ? 'active' : '') @endif
                                                                            >{{ $time->name }}</a>
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="product_id" value="{{ $product->id }}"/>

                                        <div class="c-product-add-cart c-margin-t-20">
                                            <div class="row">
                                                <div class="col-sm-4 col-xs-12">
                                                    <div class="c-input-group c-spinner">
                                                        <p class="c-product-meta-label c-product-margin-2 c-font-uppercase c-font-bold">{{ __('Quantity') }}</p>
                                                        <input name="quantity" type="text" class="form-control c-item-1"
                                                               value="1">
                                                        <div class="c-input-group-btn-vertical">
                                                            <button class="btn btn-default" type="button"
                                                                    data_input="c-item-1"><i class="fa fa-caret-up"></i>
                                                            </button>
                                                            <button class="btn btn-default" type="button"
                                                                    data_input="c-item-1"><i
                                                                        class="fa fa-caret-down"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xs-12 c-margin-t-20">
                                                    {{ csrf_field() }}
                                                    <button type="submit"
                                                            class="btn c-btn btn-lg c-font-bold c-font-white c-theme-btn c-btn-square c-font-uppercase">{{ __('Add to Cart') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <button type="submit"
                                            class="btn c-btn btn-lg c-btn-red c-btn-square c-font-white c-font-bold c-font-uppercase c-cart-float-l"
                                            disabled>{{ __('Out of Stock') }}</button>
                                @endif
                            @endif

                        </div>
                        <div style="padding-top:20px">
                            @if($product->store->minimum_delivery_days == '0')
                                {{ __('Same Day Delivery') }}
                            @else
                                {{ __('Minimum Delivery Days') }} {{ $product->store->minimum_delivery_days }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection