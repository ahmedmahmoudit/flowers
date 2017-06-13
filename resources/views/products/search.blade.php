@extends('layouts.master')

@section('script')
    @parent
    <script>
      $(document).ready(function() {
        var mySlider = $('.c-price-slider').slider();
        mySlider.on('slideStop',function(q){
          $('.price-display').html('Price: '+q.value[0]+' - '+q.value[1]+' ');
          $('#pricefrom').attr('value',q.value[0]);
          $('#priceto').attr('value',q.value[1]);
        });
      });
    </script>
@endsection

@section('content')

    @component('partials.breadcrumb',['title' => __('Search Results'), 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('search') }}">{{ __('Search') }}</a></li>
    @endcomponent

    <div class="container">

        <div class="c-layout-sidebar-menu c-theme ">
            @include('products.search_form')
            <div class="clearfix"></div>
        </div>

        <div class="c-layout-sidebar-content">
            <div class="c-shop-product-details-2 c-opt-1">
                {{--<div class="c-content-title-1">--}}
                    {{--<h3 class="c-center c-font-uppercase c-font-bold">{{ __('Search Results') }}</h3>--}}
                    {{--<div class="c-line-center c-theme-bg"></div>--}}
                {{--</div>--}}
                <div class=" c-size-lg c-bg-grey-1">
                    <div class="row">
                        <div style="padding:10px">
                            @foreach($products as $product)
                                @include('products.item_grid',['cartItems'=>$cartItems,'cols'=>4])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection