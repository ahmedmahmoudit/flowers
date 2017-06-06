<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <div class="c-topbar c-topbar-light c-solid-bg">
        <div class="container">
            <nav class="c-top-menu c-pull-left">
                <ul class="c-icons c-theme-ul">
                    <li>
                        <a href="javascript:;" data-toggle="modal" data-target="#select-country-form" ><i class="icon-globe"></i>
                            @if($selectedArea)
                                {{ $selectedArea->name }},
                            @endif
                            {{ $selectedCountry->name }}
                        </a>
                    </li>
                </ul>
            </nav>
            <nav class="c-top-menu c-pull-right">

                <ul class="c-ext c-theme-ul">
                    @if(Auth::check())
                        <li>
                            <a href="javascript:;" data-toggle="modal" data-target="#login-form" >
                                {{ __('My Account') }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="javascript:;" data-toggle="modal" data-target="#login-form" >
                                {{ __('Login') }}
                            </a>
                        </li>
                    @endif

                    <li class="c-lang dropdown c-last">
                        <a href="#">en</a>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li class="active"><a href="#">English</a></li>
                            <li><a href="#">العربي</a></li>
                        </ul>
                    </li>
                    <li class="c-search hide">
                        <form action="#">
                            <input type="text" name="query" placeholder="{{__('search')}}" value="" class="form-control" autocomplete="off">
                            <i class="fa fa-search"></i>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="c-navbar">
        <div class="container">
            <div class="c-navbar-wrapper clearfix">
                <div class="c-brand c-pull-left">

                    <a href="{{ route('home') }}" class="c-logo">
                        <img src="/img/logo-3.png" alt="JANGO" class="c-desktop-logo">
                    </a>
                    <button class="c-topbar-toggler" type="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <button class="c-search-toggler" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                    <button class="c-cart-toggler" type="button">
                        <i class="icon-handbag"></i> <span class="c-cart-number c-theme-bg">2</span>
                    </button>
                </div>

                <form class="c-quick-search" action="#">
                    <input type="text" name="query" placeholder="Type to search..." value="" class="form-control" autocomplete="off">
                    <span class="c-theme-link">&times;</span>
                </form>

                <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                    <ul class="nav navbar-nav c-theme-nav">

                        <li class="c-search-toggler-wrapper">
                            <a  href="#" class="c-btn-icon c-search-toggler"><i class="fa fa-search fa-2x" style="font-size: 20px"></i></a>
                        </li>

                        <li class="c-cart-toggler-wrapper">
                            <a  href="#" class="c-btn-icon c-cart-toggler"><i class="icon-handbag c-cart-icon"></i> <span class="c-cart-number c-theme-bg">2</span></a>
                        </li>

                    </ul>
                </nav>

            </div>
            <div class="c-cart-menu">
                <div class="c-cart-menu-title">
                    <p class="c-cart-menu-float-l c-font-sbold">2 item(s)</p>
                    <p class="c-cart-menu-float-r c-theme-font c-font-sbold">$79.00</p>
                </div>
                <ul class="c-cart-menu-items">
                    <li>
                        <div class="c-cart-menu-close">
                            <a href="#" class="c-theme-link">×</a>
                        </div>
                        <img src="/base/img/content/shop2/24.jpg"/>
                        <div class="c-cart-menu-content">
                            <p>1 x <span class="c-item-price c-theme-font">$30</span></p>
                            <a href="shop-product-details-2.html" class="c-item-name c-font-sbold">Winter Coat</a>
                        </div>
                    </li>
                    <li>
                        <div class="c-cart-menu-close">
                            <a href="#" class="c-theme-link">×</a>
                        </div>
                        <img src="/base/img/content/shop2/12.jpg"/>
                        <div class="c-cart-menu-content">
                            <p>1 x <span class="c-item-price c-theme-font">$30</span></p>
                            <a href="shop-product-details.html" class="c-item-name c-font-sbold">Sports Wear</a>
                        </div>
                    </li>
                </ul>
                <div class="c-cart-menu-footer">
                    <a href="shop-cart.html" class="btn btn-md c-btn c-btn-square c-btn-grey-3 c-font-white c-font-bold c-center c-font-uppercase">View Cart</a>
                    <a href="shop-checkout.html" class="btn btn-md c-btn c-btn-square c-theme-btn c-font-white c-font-bold c-center c-font-uppercase">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</header>