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
        @include('partials.styles')

        @if(app()->getLocale() == 'ar')
            @include('partials.styles_rtl')
        @else
            @include('partials.styles_ltr')
        @endif

        <link href="/css/custom.css" rel="stylesheet" id="style_theme" type="text/css"/>

        @if(app()->getLocale() == 'ar')
            <link href="/css/custom-rtl.css" rel="stylesheet" type="text/css"/>
        @endif

    @show
    <link rel="shortcut icon" href="favicon.ico"/>
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
    <script>

      $(document).ready(function() {
        App.init(); // init core
      });

    </script>
@show

</body>
</html>