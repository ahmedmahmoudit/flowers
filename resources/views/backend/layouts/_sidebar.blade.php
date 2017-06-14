<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <!-- Manager SideBar -->
{{--            {{dd(Auth::user())}}--}}
            @if(Auth::user()->isManager())
                <li class="{{ (str_contains(Request::route()->getName(),'dashboard') ? 'active' : '' ) }}">
                    <a href="{{ route('manager.dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'slider') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Slider</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.sliders.index') }}"><i class="fa fa-circle-o"></i> sliders </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.sliders.create') }}"><i class="fa fa-circle-o"></i> Add Slider </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'store') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-map-pin"></i>
                        <span>Stores</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.stores.index') }}"><i class="fa fa-circle-o"></i> Stores</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.stores.create') }}"><i class="fa fa-circle-o"></i> Add Store</a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'user') ? 'active' : '' ) }}">
                    <a href="{{ route('manager.users.index') }}">
                        <i class="fa fa-group"></i>
                        <span>Users</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'country') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>Countries</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Countries</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Areas</a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'coupon') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span>Coupons</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.coupons.index') }}"><i class="fa fa-circle-o"></i> Coupons </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.coupons.create') }}"><i class="fa fa-circle-o"></i> Add Coupon </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'product') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.products.index') }}"><i class="fa fa-circle-o"></i> Products</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.products.create') }}"><i class="fa fa-circle-o"></i> Add Product</a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'order') ? 'active' : '' ) }}">
                    <a href="{{ route('manager.orders.index') }}">
                        <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                    </a>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'newsletter') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span>Newsletter</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'campaign') ? 'active' : '' ) }}"><a href="{{ route('manager.newsletter.index') }}"><i class="fa fa-circle-o"></i> Subscribers</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'campaign') ? 'active' : '' ) }}"><a href="{{ route('manager.newsletter.campaign') }}"><i class="fa fa-circle-o"></i> Campaign </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'static') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Static Pages</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Contact Us</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> FAQ</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> About Us</a></li>
                    </ul>
                </li>
            <!-- Admin SideBar -->
            @else
                <li class="{{ (str_contains(Request::route()->getName(),'dashboard') ? 'active' : '' ) }}">
                    <a href="{{ route('manager.dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ (str_contains(Request::route()->getName(),'coupon') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span>Coupons</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('admin.coupons.index') }}"><i class="fa fa-circle-o"></i> Coupons </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('admin.coupons.create') }}"><i class="fa fa-circle-o"></i> Add Coupon </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'product') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('admin.products.index') }}"><i class="fa fa-circle-o"></i> Products</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('admin.products.create') }}"><i class="fa fa-circle-o"></i> Add Product</a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'order') ? 'active' : '' ) }}">
                    <a href="{{ route('admin.orders.index') }}">
                        <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>