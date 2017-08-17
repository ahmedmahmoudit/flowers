<div class="c-cart-menu">
    <div class="c-cart-menu-title">
        <p class="c-cart-menu-float-l c-font-sbold">{{ $cart->items->count() }} {{ __('Items') }}</p>
        <p class="c-cart-menu-float-r c-theme-font c-font-sbold">{{ $cart->grandTotal . ' ' . $selectedCountry['currency_'.$locale] }}</p>
    </div>
    <ul class="c-cart-menu-items">
        @foreach($cart->items as $product)
            <li>
                <div class="c-cart-menu-close">

                    <a href="{{ route('cart.item.remove',$product->id) }}" class="c-theme-link ">
                        ×
                    </a>
                </div>

                <img src="{{ asset('uploads/products/'.$product->detail->main_image) }}" class="img img-responsive" />

                <div class="c-cart-menu-content">
                    <p>{{ $product->quantity }} x <span class="c-item-price c-theme-font">{{ $product->detail->getFinalPriceWithCurrency() }}</span></p>
                    <a href="{{ route('product.show',[$product->id,$product->slug]) }}" class="c-item-name c-font-sbold">{{ $product->name }}</a>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="c-cart-menu-footer">
        <a href="{{ route('cart.index') }}" class="btn btn-md c-btn c-btn-square c-btn-grey-3 c-font-white c-font-bold c-center c-font-uppercase">{{ __('View Cart') }}</a>
        <a href="{{ route('checkout') }}" class="btn btn-md c-btn c-btn-square c-theme-btn c-font-white c-font-bold c-center c-font-uppercase">{{ __('Checkout') }}</a>
    </div>
</div>