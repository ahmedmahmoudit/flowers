@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => $page->title, 'nav'=>true])
        <li class="c-active">{{ $page->title }}</li>
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