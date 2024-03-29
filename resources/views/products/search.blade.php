@extends('layouts.master')

@section('script')
    @parent
    <script>
      $(document).ready(function () {
        var mySlider = $('.c-price-slider').slider();
        mySlider.on('slideStop', function (q) {
          $('.price-display').html('Price: ' + q.value[0] + ' - ' + q.value[1] + ' ');
          $('#pricefrom').attr('value', q.value[0]);
          $('#priceto').attr('value', q.value[1]);
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

                <div class="col-md-6 col-xs-12">
                    @if(isset($store))
                        <div style="padding-top:20px">
                            <span class="c-font-30 c-theme-font"> {{$store->name}}</span>
                            <br>
                            {{--@if($store->instagram_username)--}}
                            {{--<span class="fa fa-instagram ">&nbsp;{{$store->instagram_username}}</span>&nbsp;&nbsp;--}}
                            {{--@endif--}}
                            {{--|--}}
                            {{--<span class="fa fa-twitter">&nbsp;{{ __('Twitter Username') }}</span>--}}
                        </div>
                    @endif
                </div>

                <form class="c-shop-advanced-search-1" method="get" action="{{ route('search' ) }}" name="sort-form"
                      id="sort-form">
                    @foreach(request()->all() as $key => $value)
                        @if($key != 'sort')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}"/>
                        @endif
                    @endforeach

                    @include('products.sort_button')

                    <div class="col-md-3 col-xs-6 {{ app()->getLocale() == 'en' ? 'pull-right' : 'pull-left' }}">
                        <div class="form-group">
                            <label class="control-label c-font-uppercase c-font-bold
{{ app()->getLocale() == 'en' ? 'pull-right' : 'pull-left' }}
                                    ">{{ __('Category') }}</label>
                            <select name="category" class="form-control sort c-square c-theme input-lg">
                                <option value="">{{ __('All Category') }}</option>
                                @foreach($parentCategories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}"
                                            @if($selectedCategory === $parentCategory->id)
                                            selected
                                            @endif
                                    >{{$parentCategory->name}}</option>
                                    @foreach($parentCategory->children as $childCategory)
                                        <option value="{{ $childCategory->id }}"
                                                @if($selectedCategory === $childCategory->id)
                                                selected
                                                @endif
                                        >&nbsp;&nbsp; - {{$childCategory->name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>

            </div>

            <div class="c-shop-product-details-2 c-opt-1">
                <div class=" c-size-lg c-bg-grey-1">
                    @if($products->count())
                        <div class="row c-padding-10 ">
                            <div class="equal" style="padding:10px">
                                @include('products.item_grid',['products'=>$products,'cartItems'=>$cartItems,'cols'=>3])
                            </div>
                        </div>
                        <div class="c-content-box c-size-sm c-bg-white text-center">
                            {{ $products->appends(request()->except('pagex'))->links('partials.pagination') }}
                        </div>
                    @else
                        <div class="c-shop-cart-page-1 c-center c-padding-10">
                            {{--<i class="fa fa-frown-o c-font-dark c-font-50 c-font-thin "></i>--}}
                            <h2 class="c-font-thin c-center">{{ __('Coming Soon') }}</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection