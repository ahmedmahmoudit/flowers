@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Terms & Conditions'), 'nav'=>true])
        <li class="c-active">{{ __('Terms & Conditions') }}</li>
    @endcomponent

    <div class="c-content-box c-size-lg c-bg-white-1">
        <div class="container">
            {{$content}}
        </div>
    </div>

@endsection