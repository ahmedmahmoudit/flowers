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

    @component('partials.breadcrumb',['title' => 'Search', 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('search') }}">{{ __('Search') }}</a></li>
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            @include('products.search_form')
            <div class="clearfix"></div>
        </div>
        <div class="c-layout-sidebar-content ">
            <div class="c-shop-product-details-2 c-opt-1">
                <div class="row">
                    <div class="c-content-box c-size-lg c-bg-grey-1">
                        <div>
                            <div class="c-content-title-4">
                                <h3 class="c-font-uppercase c-center c-font-bold c-line-strike">
                                    <span class="c-bg-grey-1">{{ __('Search') }}</span>
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection