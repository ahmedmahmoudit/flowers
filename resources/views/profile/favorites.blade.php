@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Welcome') . ' ' . $user->name, 'nav'=>true, 'sub'=>__('Favorites')])
        <li class=""><a href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('profile.favorites') }}">{{ __('Favorites') }}</a></li>
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <div class="c-sidebar-menu-toggler">
                <h3 class="c-title c-font-uppercase c-font-bold">{{ __('Welcome') . ' ' . $user->name }}</h3>
                <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                    <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
                </a>
            </div>
            @include('profile.sidebar',['active'=>'favorites'])
        </div>
        <div class="c-layout-sidebar-content ">
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">{{ __('Favorites') }}</h3>
                <div class="c-line-left"></div>
            </div>

            <div class="c-shop-wishlist-1">
                <div class="c-border-bottom hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-md-3">
                            <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Product') }}</h3>
                        </div>
                        <div class="col-md-5">
                            <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Description') }}</h3>
                        </div>
                        <div class="col-md-2">
                            <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Stock') }}</h3>
                        </div>
                        <div class="col-md-2">
                            <h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">{{ __('Price') }}</h3>
                        </div>
                    </div>
                </div>
                @foreach($user->productLikes as $product)
                    <div class="c-row-item">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="c-content-overlay">
                                    <div class="c-overlay-wrapper">
                                        <div class="c-overlay-content">
                                            <a href="{{ route('product.show',[$product->id,$product->slug]) }}" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">
                                                {{ __('View') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="c-bg-img-top-center c-overlay-object" data-height="height">
                                        <img style="width:100%;height:150px" class="img-responsive" src="{{ asset('uploads/products/'.$product->detail->main_image) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-8">
                                <ul class="c-list list-unstyled">
                                    <li class="c-margin-b-25"><a href="{{ route('product.show',[$product->id,$product->slug]) }}" class="c-font-bold c-font-22 c-theme-link">{{ $product->name }}</a></li>

                                    <li class="c-margin-t-10">
                                        <form method="POST" action="{{route('product.favorite',$product->id)}}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm c-btn-white c-btn-square c-btn-uppercase c-btn-bold">
                                                @if(auth()->check() && $product->userLikes->contains('id',$user->id))
                                                    <i class="fa fa-heart" style="color: red;font-size: 1.6em" ></i>

                                                @else
                                                    <i class="fa fa-heart-o" style="color: red;font-size: 1.6em" ></i>
                                                @endif
                                            </button>
                                        </form>
                                    </li>

                                    <li class="c-margin-t-30">

                                        @if(in_array($product->id,$cartItems->keys()->toArray()))
                                            <a href="{{ route('cart.item.remove',$product->id) }}" class="btn btn-sm c-btn-green c-btn-square c-btn-uppercase c-btn-bold">{{ __('Remove from Cart') }}</a>
                                        @else
                                            <a href="{{ route('product.show',[$product->id,$product->slug]) }}" class="btn btn-sm c-btn-green c-btn-square c-btn-uppercase c-btn-bold">
                                                <i class="fa fa-shopping-cart"></i> {{ __('Add to Cart') }}
                                            </a>
                                        @endif

                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">Stock</p>
                                @if($product->detail->in_stock)
                                    <p class="c-font-sbold c-font-18 ">{{ __('In Stock') }}</p>
                                @else
                                    <p class="c-font-sbold c-font-18 c-font-red-1">{{  __('Out of Stock') }}</p>
                                @endif
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">{{ __('Unit Price') }}</p>
                                <p class="c-font-sbold c-font-uppercase c-font-18">{{ $product->detail->sale_price }} {{ __('KD') }}</p>
                            </div>
                        </div>
                    </div>
            @endforeach
            <!-- END: PRODUCT ITEM ROW -->
            </div>

        </div>
    </div>

@endsection