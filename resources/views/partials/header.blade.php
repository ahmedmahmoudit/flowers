@include('auth.login_modal')
@include('auth.register_modal')
@include('auth.forgot_password_modal')
@include('partials.select_country_modal')

<header class="c-layout-header c-layout-header-dark c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <div class="c-topbar c-topbar-light">
        <div class="container">
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
            <nav class="c-top-menu c-pull-right">
                <ul class="c-links c-theme-ul">

                    @if(Auth::check())
                        <li>
                            <a href="{{ route('profile') }}" >
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
                        <a href="#">{{ $locale === 'en' ? 'en' : 'ع' }}</a>
                        <ul class="dropdown-menu pull-right" role="menu" style="text-align: center">
                            <li class="{{ $locale === 'en' ? 'active' : '' }}"><a href="{{ route('locale.set','en') }}">English</a></li>
                            <li class="{{ $locale === 'ar' ? 'active' : '' }}"><a href="{{ route('locale.set','ar') }}">العربي</a></li>
                        </ul>
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
                        {{--<img src="/img/logo.png" class="c-desktop-logo">--}}
                        {{--<img src="/img/logo.png" class="c-desktop-logo-inverse">--}}
                        {{--<img src="/img/logo.png" class="c-mobile-logo">--}}
                        <span class="site-title c-desktop-logo">Vazzat</span>
                        <span class="site-title c-desktop-logo-inverse">Vazzat</span>
                        <span class="site-title c-mobile-logo">Vazzat</span>
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
                        <i class="icon-handbag"></i> <span class="c-cart-number c-theme-bg">{{ $cart->items->count() }}</span>
                    </button>
                </div>

                <form class="c-quick-search" role="form" method="GET" action="{{ route('search') }}">
                    {{ csrf_field() }}
                    <input type="text" name="term" placeholder="Type to search..." value="{{ $searchTerm }}" class="form-control" autocomplete="off">
                    <button type="submit" class="text-center c-font-uppercase btn btn-sm c-btn-green  c-btn-border-1x" style="{{ app()->getLocale() == 'en' ? 'position:absolute;top:35%;right:50px' : 'position:absolute;top:35%;left:50px' }}">{{ __('Search') }}</button>
                    <span class="c-theme-link">&times;</span>
                </form>

                <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                    <ul class="nav navbar-nav c-theme-nav">

                        <li class="c-active ">
                            <a href="{{ route('products.index') }}" class="c-link dropdown-toggle">Products  <span class="c-arrow c-toggler"></span>  </a>

                            <ul class="dropdown-menu c-menu-type-mega c-menu-type-fullwidth" style="min-width: auto">
                                @foreach($parentCategories as $parentCategory)
                                    <li>
                                        <ul class="dropdown-menu c-menu-type-inline c-mega-menu-offers-mobile">
                                            <li class="">
                                                <h3>
                                                    <a href="{{ route('category.index',$parentCategory->slug) }}"
                                                       style="color: whitesmoke"
                                                    >
                                                        {{ $parentCategory->name }}
                                                    </a>
                                                </h3>
                                            </li>
                                            @foreach($parentCategory->children as $childCategory)
                                                <li class="c-mega-menu-offers-mobile">
                                                    <a href="{{ route('category.show',$childCategory->slug) }}">
                                                        {{ $childCategory->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li >
                            <a href="{{ route('stores.index') }}" class="c-link dropdown-toggle">{{ __('Store') }}</a>
                        </li>


                        <li class="c-search-toggler-wrapper">
                            <a  href="#" class="c-btn-icon c-search-toggler"><i class="fa fa-search" style="font-size: 16px"></i></a>
                        </li>

                        <li class="c-cart-toggler-wrapper">
                            <a  href="#" class="c-btn-icon c-cart-toggler"><i class="icon-handbag c-cart-icon"></i> <span class="c-cart-number c-theme-bg">{{ $cart->items->count() }}</span></a>
                        </li>

                    </ul>
                </nav>

            </div>

            @include('cart.cart_modal')

        </div>
    </div>
</header>
