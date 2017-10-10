<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- styles -->
        @section('styles')
            @include('backend.layouts.styles')
        @show

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('backend.layouts.header')
            @include('backend.layouts._sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        @yield('title')
                        <small>{{__('adminPanel.control_panel')}}</small>
                    </h1>
                </section>

                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @yield('content')
            </div>

            @include('backend.layouts.footer')
        </div>

        @section('scripts')

            @include('backend.layouts.scripts')

            <script>
              tinymce.init({
                selector: "textarea.editor_ar",
                directionality : 'rtl',
                plugins: [
                  "advlist autolink  link image lists charmap print preview hr anchor pagebreak spellchecker",
                  "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                  "save table emoticons template textcolor jbimages directionality powerpaste lineheight",
                ],
                toolbar: "insertfile undo redo | sizeselect | bold italic | fontselect | fontsizeselect |  alignleft aligncenter alignright alignjustify | lineheightselect | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor | ltr rtl ",
                relative_urls: false,
                lineheight_formats: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 36pt",
                fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 22px 24px 36px 72px",
                content_css : "/css/admin/tinymce-custom.css",

              });

              tinymce.init({
                selector: "textarea.editor_en",
//        fixed_toolbar_container: '#mytoolbar',
                plugins: [
                  "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                  "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                  "save table emoticons template textcolor jbimages directionality powerpaste lineheight",
                ],
                toolbar: "insertfile undo redo | sizeselect | bold italic | fontsizeselect | fontselect |  alignleft aligncenter alignright alignjustify | lineheightselect | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor | ltr rtl ",
                relative_urls: false,
                lineheight_formats: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 36pt",
                fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 22px 24px 36px 72px",
                content_css : "/css/admin/tinymce-custom.css",
              });
            </script>
        @show
    </body>
</html>