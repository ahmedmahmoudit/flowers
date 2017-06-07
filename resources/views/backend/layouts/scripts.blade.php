<!-- jQuery 2.2.3 -->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bootstrap/js/bootstrap.min')}}.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.min.js')}}"></script>
<script src="{{ asset('js/jquery-confirm.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ asset('dist/js/demo.js')}}"></script>--}}

<script>
    $(function () {
        $('.confirm-delete').on('click', function (e) {
            var $this = $(this);
            e.preventDefault();
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure to delete this record!',
                type: 'red',
                buttons: {
                    tryAgain: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function(){
                            $.post({
                                type: $this.data('method'),
                                url: $this.attr('href'),
                                data: {_method: $this.data('laravel-method')},
                            }).done(function (data) {
                                window.location = data;
                            });
                        }
                    },
                    close: function () {
                    }
                }
            });
        });

        $('.confirm-disable').on('click', function (e) {
            var $this = $(this);
            e.preventDefault();
            $.confirm({
                title: 'Disable!',
                content: 'Are you sure to disable this record!',
                type: 'red',
                buttons: {
                    tryAgain: {
                        text: 'Disable',
                        btnClass: 'btn-red',
                        action: function(){
                            $.post({
                                type: $this.data('method'),
                                url: $this.attr('href'),
                                data: {_method: $this.data('laravel-method')},
                            }).done(function (data) {
                                window.location = data;
                            });
                        }
                    },
                    close: function () {
                    }
                }
            });
        });

        $('.confirm-activate').on('click', function (e) {

            var $this = $(this);
            e.preventDefault();
            $.confirm({
                title: 'Activate!',
                content: 'Are you sure to activate this record!',
                type: 'green',
                buttons: {
                    tryAgain: {
                        text: 'Activate',
                        btnClass: 'btn-green',
                        action: function(){
                            $.post({
                                type: $this.data('method'),
                                url: $this.attr('href'),
                                data: {_method: $this.data('laravel-method')},
                            }).done(function (data) {
                                window.location = data;
                            });
                        }
                    },
                    close: function () {
                    }
                }
            });
        });
    });
</script>