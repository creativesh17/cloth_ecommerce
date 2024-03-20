{{-- <div class="card">
    <div class="card-body">
        <nav class="myaccount-tab-menu" id="nav-tab" role="tablist">
            <ul>
                <li>
                    <a class="myaccount-nav-link {{Route::is('frontend.account_details') ? 'active' : ''}}"     href="{{ route("frontend.account_details") }}"
                        id="account-info-tab">Account Details
                    </a>
                </li>
                <li>
                    <a class="myaccount-nav-link {{Route::is('frontend.reset_password') ? 'active' : ''}}"      href="{{ route("frontend.reset_password") }}"
                        id="account-info-tab">Reset Password
                    </a>
                </li>
                <li>
                    <a class="myaccount-nav-link" href="javascript:void(0)"
                        onclick="event.preventDefault(); return confirm('logout') &&
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>

        </nav>
    </div>
</div> --}}





<ul class="list-group">
    <li class="list-group-item {{ request()->is('customer/dashboard*') ? 'active':'' }}">
        <a href="{{ url('/customer/dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item {{ request()->is('orders*') ? ' active':'' }}">
        <a href="{{ url('orders') }}">Orders</a>
    </li>
    <li class="list-group-item {{ request()->is('wishlist*') ? ' active':'' }}">
        <a href="{{ url('wishlist') }}">Wishlist</a>
    </li>
    <li class="list-group-item {{ request()->is('myreviews*') ? ' active':'' }}">
        <a href="{{ url('myreviews') }}">My Reviews</a>
    </li>
    <li class="list-group-item {{ request()->is('profile*') ? ' active':'' }}">
        <a href="{{ url('profile') }}">Profile</a>
    </li>
    <li class="list-group-item {{ request()->is('reset-password*') ? ' active':'' }}">
        <a href="{{ url('reset-password') }}">Reset Password</a>
    </li>
    <li class="list-group-item">
        <a href="javascript:void(0)" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
    </li>
</ul>
