<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
@if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE-rtl.css')}}">
@else
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
@endif
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

<link rel="stylesheet" href="{{asset('css/jquery-confirm.css')}}">