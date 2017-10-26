@extends('layouts.master')

@section('style')
    @parent
    <style>
        @media print {
            @page { margin: 0; }

            body * {
                visibility: hidden;
            }
            #content, #content * {
                visibility: visible;
            }
            #content {
                /*position: absolute;*/
                /*left: 0;*/
                /*top: 0;*/
            }
        }
    </style>
@endsection

@section('content')
    @component('partials.breadcrumb',['title' => __(''), 'nav'=>true])
        <li class="c-active">{{ __('Payment') }}</li>
    @endcomponent

    <div id="content" class="c-content-box c-size-lg c-overflow-hide c-bg-white">
        <div class="container">
            <div class="c-shop-cart-page-1 c-center">
                {{--<i class="fa fa-frown-o c-font-dark c-font-50 c-font-thin "></i>--}}
                <h2 class="c-font-thin c-center">{{ __('Payment Failed') }}</h2>
                <a href="{{ route('home') }}" class="btn c-btn btn-lg c-btn-dark c-btn-square c-font-white c-font-bold c-font-uppercase">{{ __('Home') }}</a>
            </div>
        </div>
    </div>

@endsection