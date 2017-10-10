@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('About Us'), 'nav'=>true])
        <li class="c-active">{{ __('About Us') }}</li>
    @endcomponent

    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="c-content">
                    <p style="font-family: serif;text-align: center">
                        {!!  $page->body !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection