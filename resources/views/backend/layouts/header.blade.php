<header class="main-header">
    <!-- Logo -->
    <a href="{{URL('/')}}" class="logo" target="_blank">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Vazzat</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Vazzat</b>Admin Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <span class="hidden-xs">{{ app()->getLocale() === 'en' ? 'EN' : 'ع' }}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="{{ route('locale.set','en') }}">English</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="{{ route('locale.set','ar') }}">العربي</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @if(!Auth::user()->isManager())
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <span class="hidden-xs">{{__('adminPanel.settings')}}</span>
                        {{--<ul class="c-ext c-theme-ul">--}}
                            {{--<li class="c-lang dropdown c-last">--}}
                                {{--<a href="#">{{ app()->getLocale() === 'en' ? 'en' : 'ع' }}</a>--}}
                                {{--<ul class="dropdown-menu pull-right" role="menu" style="text-align: center">--}}
                                    {{--<li class="{{ app()->getLocale() === 'en' ? 'active' : '' }}"><a href="{{ route('locale.set','en') }}">English</a></li>--}}
                                    {{--<li class="{{ app()->getLocale() === 'ar' ? 'active' : '' }}"><a href="{{ route('locale.set','ar') }}">العربي</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    </a>
                    <ul class="dropdown-menu">

                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="{{ route('admin.settings') }}">{{__('adminPanel.profile')}}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="{{route('admin.areas')}}">{{__('adminPanel.areas')}}</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @endif
    </nav>
</header>