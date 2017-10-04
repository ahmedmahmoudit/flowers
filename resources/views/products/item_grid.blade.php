@foreach($products as $product)

    <div class="col-md-{{ isset($cols) ? $cols : '3' }} col-sm-6 c-margin-b-20 ">

        <div class="c-content-product-2 c-bg-white">
            <div class="">
                @if($product->detail->is_sale)
                    <div class="c-label c-bg-red c-font-uppercase c-font-white c-font-14 c-font-bold">{{ __('Sale') }}</div>
                @endif

                <a href="{{ route('product.show',[$product->id,$product->slug]) }}">
                    <img src="{{ asset('uploads/products/'.$product->detail->main_image) }}"
                         class="img img-responsive"
                         style="width:100%;height: auto"
                    />
                </a>

            </div>
            <div class="c-info">
                <a href="{{ route('product.show',[$product->id,$product->slug]) }}">
                    <p class="c-desc c-font-18 c-font-thin text-center">{{ $product->name }}</p>
                </a>
                <p class="c-price c-font-18 c-font-slim text-center">
                    {{ $product->detail->getFinalPriceWithCurrency() }} &nbsp;
                    @if($product->detail->is_sale)
                        <span class="c-font-18 c-font-line-through c-font-red">{{ $product->detail ? $product->detail->getPriceWithCurrency() : '' }}</span>
                    @endif
                </p>

            </div>
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group c-border-top" role="group">
                    <form method="POST" action="{{route('product.favorite',$product->id)}}">
                        {{ csrf_field() }}
                        <button type="submit"
                                class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover  c-btn-product">
                            @if(auth()->check() && $product->userLikes && $product->userLikes->contains('id',auth()->id()))
                                <i class="fa fa-heart" style="color: red;font-size: 1.6em"></i>
                            @else
                                <i class="fa fa-heart-o" style="color: red;font-size: 1.6em"></i>
                            @endif
                        </button>
                    </form>
                </div>
                <div class="btn-group c-border-left c-border-top" role="group">
                    @if(in_array($product->id,$cartItems->keys()->toArray()))
                        <a href="{{ route('cart.item.remove',$product->id) }}"
                           class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product"
                           style="padding-left: 0;padding-right:0;text-align: center"
                        >{{ __('Remove') }}</a>
                    @else
                        <a href="{{ route('product.show',[$product->id,$product->slug]) }}"
                           class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product"
                           style="padding-left: 0;padding-right:0;text-align: center"
                        >
                            {{ __('Add to Cart') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach