<div class="c-cart-menu">
    <div class="c-cart-menu-title">
        <p class="c-cart-menu-float-l c-font-sbold">{{ $cartItemsCount }} {{ __('Items') }}</p>
        <p class="c-cart-menu-float-r c-theme-font c-font-sbold">$79.00</p>
    </div>
    <ul class="c-cart-menu-items">
        @foreach($cartItems as $product)
            <li>
                <div class="c-cart-menu-close">
                    <a href="#" class="c-theme-link">×</a>
                </div>
                <img src="/img/2.jpg"/>
                <div class="c-cart-menu-content">
                    <p>1 x <span class="c-item-price c-theme-font">{{ $product->getPriceWithCurrency() }}</span></p>
                    <a href="shop-product-details-2.html" class="c-item-name c-font-sbold">{{ $product->name }}</a>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="c-cart-menu-footer">
        <a href="shop-cart.html" class="btn btn-md c-btn c-btn-square c-btn-grey-3 c-font-white c-font-bold c-center c-font-uppercase">View Cart</a>
        <a href="shop-checkout.html" class="btn btn-md c-btn c-btn-square c-theme-btn c-font-white c-font-bold c-center c-font-uppercase">Checkout</a>
    </div>
</div>