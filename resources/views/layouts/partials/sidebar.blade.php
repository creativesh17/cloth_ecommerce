<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{route('admin.dashboard')}}" class="logo logo-large"><img src="{{asset('contents/admin')}}/assets/images/logo.svg" class="img-fluid" alt="logo"></a>
            <a href="{{route('admin.dashboard')}}" class="logo logo-small"><img src="{{asset('contents/admin')}}/assets/images/small_logo.svg" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{route('admin.dashboard')}}">
                      <img src="{{asset('contents/admin')}}/assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Dashboard</span>
                    </a>
                </li>
                @if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2)
                <li>
                    <a href="javaScript:void();">
                      <img src="{{asset('contents/admin')}}/assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Products</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('admin.products.create')}}">Add Products</a></li>
                        <li><a href="{{route('admin.products.index')}}">All Products</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="{{route('admin.orders')}}">
                      <img src="{{asset('contents/admin')}}/assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.report')}}">
                      <img src="{{asset('contents/admin')}}/assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('web')}}" target="_blank">
                        <img src="{{asset('contents/admin')}}/assets/images/svg-icon/components.svg" class="img-fluid" alt="site"><span>Live Site</span>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        <img src="{{asset('contents/admin')}}/assets/images/svg-icon/logout.svg" class="img-fluid" alt="site"><span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                                                         
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>