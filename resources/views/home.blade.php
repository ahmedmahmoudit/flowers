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
                                <p class="c-price c-font-16 c-font-slim">{{ $product->getPriceWithCurrency() }} &nbsp;
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
                                        <a href="{{ route('cart.item.remove',$product->id) }}" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">
                                            {{ __('Remove from Cart') }}
                                        </a>
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
                @endforeach

            </div>
        </div>
    </div>
@endsection