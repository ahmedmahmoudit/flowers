<ul class="c-sidebar-menu collapse " id="sidebar-menu-1">
    <li class="c-dropdown c-open">
        <a href="javascript:;" class="c-toggler">My Profile<span class="c-arrow"></span></a>
        <ul class="c-dropdown-menu">
            <li class="{{ $active === 'dashboard' ? 'c-active' : '' }}">
                <a href="{{ route('profile') }}">{{ __('Dashboard') }}</a>
            </li>
            @if(Auth::user()->isStoreAdmin())
                <li class="{{ $active === 'admin' ? 'c-active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">{{ __('Admin Panel') }}</a>
                </li>
            @endif
            <li class="{{ $active === 'orders' ? 'c-active' : '' }}">
                <a href="{{ route('profile.orders') }}">{{ __('Order History') }}</a>
            </li>
            <li class="{{ $active === 'favorites' ? 'c-active' : '' }}">
                <a href="{{ route('profile.favorites') }}">{{ __('My Favorites') }}</a>
            </li>
            <li class="{{ $active === 'edit' ? 'c-active' : '' }}">
                <a href="{{ route('profile.edit') }}">{{ __('Shipping Addresses') }}</a>
            </li>
            <li class="{{ $active === 'edit' ? 'c-active' : '' }}">
                <a href="{{ route('profile.edit') }}">{{ __('Edit Profile') }}</a>
            </li>
            <li class="">
                <a href="{{ route('logout') }}">{{ __('Sign out') }}</a>
            </li>
        </ul>
    </li>
</ul>