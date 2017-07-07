@extends('layouts.master')
@section('content')

    @component('partials.breadcrumb',['title' => __('Best Sellers'), 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('products.top') }}">{{ __('Best Sellers') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg c-bg-grey-1">

        <div class="container">

            <div class="row">
                <form class="c-shop-advanced-search-1">
                    <div class="col-md-3 pull-right">
                        <div class="form-group">
                            <label class="control-label pull-right">Sort By</label>
                            <select class="form-control c-square c-theme input-lg">
                                <option value="/?sort=sort_order&amp;order=ASC" selected="selected">{{ __('Relevance') }}</option>
                                <option value="/?sort=price&amp;order=ASC">{{ __('Price (Low &gt; High)') }}</option>
                                <option value="/?sort=price&amp;order=DESC" selected>{{ __('Price (High &gt; Low)') }}</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row" style="padding-top:20px">
                @include('products.item_grid',['products'=>$bestSellers,'cartItems'=>$cartItems])
            </div>
            <div class="c-content-box c-size-sm c-bg-white text-center">
                {{ $bestSellers->links('partials.pagination') }}
            </div>
        </div>
    </div>
@endsection