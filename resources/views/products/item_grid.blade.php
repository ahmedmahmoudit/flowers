<div class="col-md-{{ isset($cols) ? $cols : '3' }} col-sm-6 c-margin-b-20">
    <div class="c-content-product-2 c-bg-white">
        <div class="c-content-overlay">
            @if($product->detail->is_sale)
                <div class="c-label c-bg-red c-font-uppercase c-font-white c-font-14 c-font-bold">Sale</div>
            @endif
            <div class="c-overlay-wrapper">
                <div class="c-overlay-content">
                    <a href="{{ route('product.show',[$product->id,$product->slug]) }}" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Explore</a>
                </div>
            </div>
            <div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 270px; background-image: url(/img/{{rand(1,7)}}.jpg);"></div>
        </div>
        <div class="c-info">
            <p class="c-desc c-font-18 c-font-thin text-center">{{ $product->name }}</p>
            <p class="c-price c-font-18 c-font-slim text-center">
                {{ $product->detail->getFinalPriceWithCurrency() }} &nbsp;
                @if($product->detail->is_sale)
                    <span class="c-font-18 c-font-line-through c-font-red">{{ $product->detail->getPriceWithCurrency() }}</span>
                @endif
            </p>

        </div>
        <div class="btn-group btn-group-justified" role="group">
            <div class="btn-group c-border-top" role="group">
                <form method="POST" action="{{route('product.favorite',$product->id)}}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover  c-btn-product">
                        @if(auth()->check() && $product->userLikes->contains('id',auth()->id()))
                            <i class="fa fa-heart" style="color: red;font-size: 1.6em" ></i>
                        @else
                            <i class="fa fa-heart-o" style="color: red;font-size: 1.6em" ></i>
                        @endif
                    </button>
                </form>
            </div>
            <div class="btn-group c-border-left c-border-top" role="group">
                @if(in_array($product->id,$cartItems->keys()->toArray()))
                    <a href="{{ route('cart.item.remove',$product->id) }}" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">{{ __('Remove from Cart') }}</a>
                @else
                    <form method="POST" action="{{route('cart.item.add')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <input type="hidden" name="quantity" value="1" />
                        <button type="submit" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">
                            {{ __('Add to Cart') }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>