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
                    @include('products.item_grid')
                @endforeach

            </div>
        </div>
    </div>
@endsection