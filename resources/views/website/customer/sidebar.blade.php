<ul class="list-group">
    <li class="list-group-item {{ request()->is('customer/dashboard') ? 'active':'' }}">
        <a href="{{ url('/customer/dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item {{ request()->is('customer/orders*') ? ' active':'' }}">
        <a href="{{ url('/customer/orders') }}">Orders</a>
    </li>
    <li class="list-group-item {{ request()->is('customer/profile*') ? ' active':'' }}">
        <a href="{{ url('/customer/profile') }}">Profile</a>
    </li>
    <li class="list-group-item {{ request()->is('customer/settings*') ? ' active':'' }}">
        <a href="{{ url('/customer/settings') }}">Setting</a>
    </li>
    <li class="list-group-item {{ request()->is('customer/logout') ? ' active':'' }}">
        <a href="{{ url('/customer/logout') }}">Logout</a>
    </li>
</ul>