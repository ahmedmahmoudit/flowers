@include('auth.login_modal')
@include('auth.register_modal')
@include('auth.forgot_password_modal')
@include('partials.select_country_modal')

<header class="c-layout-header c-layout-header-dark c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <div class="c-topbar c-topbar-light">
        <div class="container">
            <!-- BEGIN: INLINE NAV -->
            <nav class="c-top-menu c-pull-left">
                <ul class="c-icons c-theme-ul">
                    <li>
                        <a href="javascript:;" data-toggle="modal" data-target="#select-country-form" ><i class="icon-globe"></i>
                            @if($selectedArea)
                                {{ $selectedArea['name_'.$locale] }},
                            @endif
                            {{ $selectedCountry['name_'.$locale] }}
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: INLINE NAV -->
            <!-- BEGIN: INLINE NAV -->
            <nav class="c-top-menu c-pull-right">
                <ul class="c-links c-theme-ul">

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

                    <li class="c-divider">|</li>
                </ul>
                <ul class="c-ext c-theme-ul">
                    <li class="c-lang dropdown c-last">
                        <a href="#">en</a>
                        <ul class="dropdown-menu pull-right" role="menu" style="text-align: center">
                            <li class="{{ $locale === 'en' ? 'active' : '' }}"><a href="{{ route('locale.set','en') }}">English</a></li>
                            <li class="{{ $locale === 'ar' ? 'active' : '' }}"><a href="{{ route('locale.set','ar') }}">العربي</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- END: INLINE NAV -->
        </div>
    </div>
    <div class="c-navbar">
        <div class="container">
            <!-- BEGIN: BRAND -->
            <div class="c-navbar-wrapper clearfix">
                <div class="c-brand c-pull-left">
                    <a href="{{ route('home') }}" class="c-logo">
                        <img src="/img/logo.png" class="c-desktop-logo">
                        <img src="/img/logo.png" class="c-desktop-logo-inverse">
                        <img src="/img/logo.png" class="c-mobile-logo">
                    </a>
                    <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                    </button>
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

                        <li class="c-active ">
                            <a href="javascript:;" class="c-link dropdown-toggle">Products  <span class="c-arrow c-toggler"></span>  </a>

                            <ul class="dropdown-menu c-menu-type-mega c-menu-type-fullwidth" style="min-width: auto">
                                @foreach($parentCategories as $parentCategory)
                                    <li>
                                        <ul class="dropdown-menu c-menu-type-inline c-mega-menu-offers-mobile">
                                            <li class="">
                                                <h3>{{ $parentCategory->name }}</h3>
                                            </li>
                                            @foreach($parentCategory->children as $childCategory)
                                                <li class="c-mega-menu-offers-mobile">
                                                    <a href="javascript:;">{{ $childCategory->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li >
                            <a href="javascript:;" class="c-link dropdown-toggle">Store<span class="c-arrow c-toggler"></span></a>
                        </li>


                        <li class="c-search-toggler-wrapper">
                            <a  href="#" class="c-btn-icon c-search-toggler"><i class="fa fa-search" style="font-size: 16px"></i></a>
                        </li>

                        <li class="c-cart-toggler-wrapper">
                            <a  href="#" class="c-btn-icon c-cart-toggler"><i class="icon-handbag c-cart-icon"></i> <span class="c-cart-number c-theme-bg">{{ $cartItemsCount }}</span></a>
                        </li>

                    </ul>
                </nav>

            </div>

            @include('cart.cart_modal')

        </div>
    </div>
</header>
