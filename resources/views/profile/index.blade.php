@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Welcome, ') . $user->name, 'nav'=>true])
        <li class="c-active"><a href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <div class="c-sidebar-menu-toggler">
                <h3 class="c-title c-font-uppercase c-font-bold">{{ __('Welcome, '), $user->name }}</h3>
                <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                    <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
                </a>
            </div>
            @include('profile.sidebar',['active'=>'dashboard'])
        </div>
        <div class="c-layout-sidebar-content ">
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">My Dashboard</h3>
                <div class="c-line-left"></div>
            </div>
        </div>
    </div>

@endsection