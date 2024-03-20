<div class="card">
    <div class="card-body">
        <nav class="myaccount-tab-menu" id="nav-tab" role="tablist">
            <ul>
                <li>
                    <a class="myaccount-nav-link {{Route::is('frontend.profile') ? 'active' : ''}}"
                        href="{{ route("frontend.profile") }}"
                        id="dashboad-tab">Dashboard
                    </a>
                </li>
                <li>
                    <a class="myaccount-nav-link {{Route::is('frontend.orders') ? 'active' : ''}}"
                        href="{{ route("frontend.orders") }}"
                        id="orders-tab">Orders
                    </a>
                </li>
                <li>
                    {{-- <a class="myaccount-nav-link {{Route::is('frontend.reviews') ? 'active' : ''}}" href="{{ route("frontend.reviews") }}" id="download-tab">Reviews</a> --}}
                    <a class="myaccount-nav-link {{Route::is('frontend.address') ? 'active' : ''}}"
                        href="{{ route("frontend.address") }}"
                        id="address-edit-tab">Address
                    </a>
                </li>
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
</div>
