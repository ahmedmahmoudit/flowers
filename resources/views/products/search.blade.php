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

            <div class="row">
                <form class="c-shop-advanced-search-1" method="get" action="{{ route('search' ) }}" name="sort-form" id="sort-form">
                    @foreach(request()->all() as $key => $value)
                        @if($key != 'sort')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}" />
                        @endif
                    @endforeach
                    <div class="col-md-3 pull-right">
                        <div class="form-group">
                            <label class="control-label pull-right">Sort By</label>
                            <select class="form-control c-square c-theme input-lg" name="sort" id="sort">
                                <option value="" {{ $sort == '' ? 'selected' : '' }} >{{ __('Relevance') }}</option>
                                <option value="price-l-h" {{ $sort == 'price-l-h' ? 'selected' : '' }}>{{ __('Price (Low &gt; High)') }}</option>
                                <option value="price-h-l" {{ $sort == 'price-h-l' ? 'selected' : '' }}>{{ __('Price (High &gt; Low)') }}</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="c-shop-product-details-2 c-opt-1">
                {{--<div class="c-content-title-1">--}}
                {{--<h3 class="c-center c-font-uppercase c-font-bold">{{ __('Search Results') }}</h3>--}}
                {{--<div class="c-line-center c-theme-bg"></div>--}}
                {{--</div>--}}
                <div class=" c-size-lg c-bg-grey-1">
                    @if($products->count())
                        <div class="row c-padding-10">
                            <div style="padding:10px">
                                @include('products.item_grid',['products'=>$products,'cartItems'=>$cartItems,'cols'=>4])
                            </div>
                        </div>
                        <div class="c-content-box c-size-sm c-bg-white text-center">
                            {{ $products->links('partials.pagination') }}
                        </div>
                    @else
                        <div class="c-shop-cart-page-1 c-center c-padding-10">
                            <i class="fa fa-frown-o c-font-dark c-font-50 c-font-thin "></i>
                            <h2 class="c-font-thin c-center">{{ __('No Results') }}</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection