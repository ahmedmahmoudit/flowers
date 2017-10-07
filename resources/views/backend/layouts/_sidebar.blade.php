<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">{{__('adminPanel.main_nav')}}</li>

            <!-- Manager SideBar -->
{{--            {{dd(Auth::user())}}--}}
            @if(Auth::user()->isManager())
                <li class="{{ (str_contains(Request::route()->getName(),'dashboard') ? 'active' : '' ) }}">
                    <a href="{{ route('manager.dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>{{__('adminPanel.dashboard')}}</span>
                    </a>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'slider') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>{{__('adminPanel.slider')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.sliders.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.sliders')}} </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.sliders.create') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.add_slider')}} </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'ad') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-clone"></i>
                        <span>{{__('adminPanel.ads')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.ads.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.ads')}} </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.ads.create') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.new_ad')}} </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'.categor') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-folder-open"></i>
                        <span>{{__('adminPanel.categories')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.categories.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.categories')}} </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.categories.create') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.add_category')}} </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'sub') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-folder-open"></i>
                        <span>{{__('adminPanel.subCategories')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.subcategories.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.sub_categories')}} </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.subcategories.create') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.add_sub_categories')}} </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'store') && !str_contains(Request::route()->getName(),'verification') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-map-pin"></i>
                        <span>{{__('adminPanel.stores')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.stores.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.stores')}}</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.stores.create') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.add_store')}}</a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'user') ? 'active' : '' ) }}">
                    <a href="{{ route('manager.users.index') }}">
                        <i class="fa fa-group"></i>
                        <span>{{__('adminPanel.users')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>

                {{--<li class="{{ (str_contains(Request::route()->getName(),'country') ? 'active' : '' ) }} treeview">--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa-globe"></i>--}}
                        {{--<span>Countries</span>--}}
                        {{--<span class="pull-right-container">--}}
                {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}
                        {{--<li><a href="#"><i class="fa fa-circle-o"></i> Countries</a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-circle-o"></i> Areas</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                <li class="{{ (str_contains(Request::route()->getName(),'coupon') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span>{{__('adminPanel.coupons')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.coupons.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.coupons')}} </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.coupons.create') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.add_coupon')}} </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'product') && !str_contains(Request::route()->getName(),'verification') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>{{__('adminPanel.products')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.products.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.products')}}</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('manager.products.create') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.add_product')}}</a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'verifications') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-check-circle"></i>
                        <span>{{__('adminPanel.verification')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (str_contains(Request::route()->getName(),'verifications.store') ? 'active' : '' ) }}"><a href="{{ route('manager.verifications.stores') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.stores')}}</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'verifications.prod') ? 'active' : '' ) }}"><a href="{{ route('manager.verifications.products') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.products')}} </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'order') ? 'active' : '' ) }}">
                    <a href="{{ route('manager.orders.index') }}">
                        <i class="fa fa-shopping-cart"></i> <span>{{__('adminPanel.orders')}}</span>
                    </a>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'newsletter') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span>{{__('adminPanel.newsletter')}}</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (str_contains(Request::route()->getName(),'index') ? 'active' : '' ) }}"><a href="{{ route('manager.newsletter.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.subscribers')}}</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'campaign') ? 'active' : '' ) }}"><a href="{{ route('manager.newsletter.campaign') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.campaign')}} </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'mail') ? 'active' : '' ) }}"><a href="{{ route('manager.newsletter.mailStores') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.email_to_stores')}} </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'report') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-line-chart"></i> <span>{{__('adminPanel.reports')}}</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (str_contains(Request::route()->getName(),'sale') ? 'active' : '' ) }}"><a href="{{ route('manager.reports.sales') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.sales')}} </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'pages') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>{{__('adminPanel.static_pages')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (str_contains(Request::route()->getName(),'contact') ? 'active' : '' ) }}"><a href="{{ route('manager.pages.contact.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.contact_us')}}</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'about') ? 'active' : '' ) }}"><a href="{{ route('manager.pages.about.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.about_us')}}</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'privacy') ? 'active' : '' ) }}"><a href="{{ route('manager.pages.privacy.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.privacy_policy')}}</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'terms') ? 'active' : '' ) }}"><a href="{{ route('manager.pages.terms.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.terms_and_conditions')}}</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'delivery') ? 'active' : '' ) }}"><a href="{{ route('manager.pages.delivery.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.delivery')}}</a></li>
                    </ul>
                </li>
            <!-- Admin SideBar -->
            @else
                <li class="{{ (str_contains(Request::route()->getName(),'dashboard') ? 'active' : '' ) }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>{{__('adminPanel.dashboard')}}</span>
                    </a>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'area') ? 'active' : '' ) }} treeview">
                    <a href="{{route('admin.areas')}}">
                        <i class="fa fa-globe"></i>
                        {{__('adminPanel.areas')}}
                    </a>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'coupon') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span>{{__('adminPanel.coupons')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('admin.coupons.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.coupons')}} </a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('admin.coupons.create') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.add_coupon')}} </a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'product') ? 'active' : '' ) }} treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>{{__('adminPanel.products')}}</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (!str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('admin.products.index') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.products')}}</a></li>
                        <li class="{{ (str_contains(Request::route()->getName(),'create') ? 'active' : '' ) }}"><a href="{{ route('admin.products.create') }}"><i class="fa fa-circle-o"></i> {{__('adminPanel.add_product')}}</a></li>
                    </ul>
                </li>

                <li class="{{ (str_contains(Request::route()->getName(),'order') ? 'active' : '' ) }}">
                    <a href="{{ route('admin.orders.index') }}">
                        <i class="fa fa-shopping-cart"></i> <span>{{__('adminPanel.orders')}}</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.settings') }}">
                        <i class="fa fa-cog"></i> <span>{{__('adminPanel.settings')}}</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>