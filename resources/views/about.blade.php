@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('About Us'), 'nav'=>true])
        <li class="c-active">{{ __('About Us') }}</li>
    @endcomponent

    <div class="c-content-box c-size-lg c-bg-white-1">
        <div class="container">
            {{ $content }}
        </div>
    </div>

@endsection