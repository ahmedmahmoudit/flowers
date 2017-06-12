<ul class="c-sidebar-menu collapse " id="sidebar-menu-1">
    <li class="c-dropdown c-open">
        <a href="javascript:;" class="c-toggler">My Profile<span class="c-arrow"></span></a>
        <ul class="c-dropdown-menu">
            <li class="{{ $active === 'dashboard' ? 'c-active' : '' }}">
                <a href="{{ route('profile') }}">My Dashbord</a>
            </li>
            <li class="{{ $active === 'orders' ? 'c-active' : '' }}">
                <a href="{{ route('profile.orders') }}">Order History</a>
            </li>
            <li class="{{ $active === 'favorites' ? 'c-active' : '' }}">
                <a href="{{ route('profile.favorites') }}">My Favorites</a>
            </li>
            <li class="{{ $active === 'edit' ? 'c-active' : '' }}">
                <a href="{{ route('profile.edit') }}">Edit Profile</a>
            </li>
            <li class="">
                <a href="{{ route('logout') }}">Sign out</a>
            </li>
        </ul>
    </li>
</ul>