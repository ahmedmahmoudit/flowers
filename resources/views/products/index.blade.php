@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Products'), 'nav'=>true])
        <li class="c-active"><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
    @endcomponent


    <div class="c-content-box c-size-lg c-bg-white-1">
        <div class="container">
            @foreach($parentCategories as $category)

                <div class="row">
                    <div class="col-xs-6">
                        <div class="c-content-title-3 c-theme-border">
                            <h3 class="c-left c-font-uppercase">{{ $category->name }}</h3>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="c-content-title-3 c-border-pink c-right">
                            <h3 class="c-right c-font-uppercase">
                                <a href="{{ route('category.show',$category->slug) }}" class="c-font-uppercase btn btn-xs c-btn-green c-btn-circle c-btn-border-1x">{{ __('View All') }}</a>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="c-content-box  c-bg-grey-1 c-padding-10">
                    <div class="row equal">
                        @include('products.item_grid',['products'=>$category->products,'cartItems'=>$cartItems])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection