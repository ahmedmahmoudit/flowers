<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="{{ app()->getLocale() === 'en' ? 'ltr'  : 'rtl' }}" >
<!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8"/>
    <title>Flowers</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    @section('style')
        @if(app()->environment() === 'production')
            @if(app()->getLocale() == 'ar')
                <link rel="stylesheet" href="{{ mix('/dist/css/style-rtl.css') }}">
            @else
                <link rel="stylesheet" href="{{ mix('/dist/css/style.css') }}">
            @endif
        @else
            @if(app()->getLocale() == 'ar')
                @include('partials.style_rtl')
            @else
                @include('partials.style')
            @endif
        @endif
    @show

    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
</head>
<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">

@include('partials.header')

<div class="c-layout-page">
    @section('content')
    @show
</div>

@include('partials.footer')

<div class="c-layout-go2top">
    <i class="icon-arrow-up"></i>
</div>

@section('script')

    @include('partials.scripts')

    {{--@if(app()->getLocale() === 'production')--}}
    <script src="{{mix('/dist/js/script.js')}}" type="text/javascript" ></script>
    {{--@else--}}
    {{--@include('partials.scripts')--}}
    {{--@endif--}}

    <script>
      $(document).ready(function() {
        App.init(); // init core
      });
    </script>
@show

</body>
</html>