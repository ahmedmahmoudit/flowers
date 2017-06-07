@extends('layouts.master')

@section('script')
    @parent
@endsection

@section('content')

        {{--@include('partials.banner')--}}

    <div class="c-content-box c-size-lg c-bg-grey-1">

        <div class="container">
            <div class="c-content-title-4">
                <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">{{ __('Best Sellers') }}</span></h3>
            </div>
            <div class="row">
                @foreach($bestSellers as $product)
                    <div class="col-md-3 col-sm-6 c-margin-b-20">
                        <div class="c-content-product-2 c-bg-white">
                            <div class="c-content-overlay">
                                <div class="c-overlay-wrapper">
                                    <div class="c-overlay-content">
                                        <a href="{{ route('product.show',[$product->id,$product->slug]) }}" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Explore</a>
                                    </div>
                                </div>
                                <div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 270px; background-image: url(/img/{{rand(1,6)}}.jpg);"></div>
                            </div>
                            <div class="c-info">
                                <p class="c-title c-font-18 c-font-slim">{{ $product->name }}</p>
                                <p class="c-price c-font-16 c-font-slim">{{ $product->getPrice() }} &nbsp;
                                </p>
                            </div>
                            <div class="btn-group btn-group-justified" role="group">
                                <div class="btn-group c-border-top" role="group">
                                    <a href="shop-product-wishlist.html" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Wishlist</a>
                                </div>
                                <div class="btn-group c-border-left c-border-top" role="group">
                                    <a href="shop-cart.html" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection