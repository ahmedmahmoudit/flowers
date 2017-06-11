@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Stores'), 'nav'=>true])
        <li class="c-active"><a href="{{ route('stores.index') }}">{{ __('Stores') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg c-bg-grey-1">
        <div class="container">

        </div>
    </div>
@endsection