@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Welcome, ') . $user->name, 'nav'=>true, 'sub'=>__('Your favorites list')])
        <li class=""><a href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('profile.favorites') }}">{{ __('Favorites') }}</a></li>
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <div class="c-sidebar-menu-toggler">
                <h3 class="c-title c-font-uppercase c-font-bold">{{ __('Welcome, '), $user->name }}</h3>
                <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                    <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
                </a>
            </div>
            @include('profile.sidebar',['active'=>'favorites'])
        </div>
        <div class="c-layout-sidebar-content ">
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">{{ __('My Favorites') }}</h3>
                <div class="c-line-left"></div>
            </div>

            <div class="c-shop-wishlist-1">
                <div class="c-border-bottom hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-md-3">
                            <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">Product</h3>
                        </div>
                        <div class="col-md-5">
                            <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">Description</h3>
                        </div>
                        <div class="col-md-2">
                            <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">Stock</h3>
                        </div>
                        <div class="col-md-2">
                            <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">Price</h3>
                        </div>
                    </div>
                </div>
                <div class="c-row-item">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="c-content-overlay">
                                <div class="c-overlay-wrapper">
                                    <div class="c-overlay-content">
                                        <a href="shop-product-details.html" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Explore</a>
                                    </div>
                                </div>
                                <div class="c-bg-img-top-center c-overlay-object" data-height="height">
                                    <img width="100%" class="img-responsive" src="/img/1.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-8">
                            <ul class="c-list list-unstyled">
                                <li class="c-margin-b-25"><a href="shop-product-details.html" class="c-font-bold c-font-22 c-theme-link">Sports Wear</a></li>
                                <li class="c-margin-b-10">Color: Blue</li>
                                <li>Size: S</li>
                                <li class="c-margin-t-30">
                                    <div class="form-group" role="group">
                                        <button type="submit" class="btn btn-sm c-theme-btn c-btn-square c-btn-uppercase c-btn-bold"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                        <button type="submit" class="btn btn-sm btn-default c-btn-square c-btn-uppercase c-btn-bold">{{ __('Remove From Favorites') }}</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">Stock</p>
                            <p class="c-font-sbold c-font-18">In Stock</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">Unit Price</p>
                            <p class="c-font-sbold c-font-uppercase c-font-18">$15.00</p>
                        </div>
                    </div>
                </div>
                <!-- END: PRODUCT ITEM ROW -->
            </div>

        </div>
    </div>

@endsection