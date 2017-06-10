@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => $category->name, 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('products.category.index',$category->slug) }}">{{ ucfirst($category->name) }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg c-bg-grey-1">
        <div class="container">
            <div class="c-content-title-4">
                <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">{{ $category->name }}</span></h3>
            </div>
            <div class="row">
                @foreach($category->products as $product)
                    @include('products.item_grid',['cartItems'=>$cartItems])
                @endforeach
            </div>
        </div>
    </div>
@endsection