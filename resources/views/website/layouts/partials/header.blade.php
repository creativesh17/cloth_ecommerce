@php
    // dd(Cart::total());
    $subtotalAssign = 0;
    $subtotal = 0;
@endphp
<section id="header" class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="flat-support">
                        @for ($i = 1; $i <= 1; $i++)
                            @php
                                $key = 'email_' . $i;
                            @endphp
                            @if ($setting->$key)
                                <li>
                                    <a href="mailto://{{ $setting->$key }}">{{ $setting->$key }}</a>
                                </li>
                            @endif
                        @endfor
                        @php
                            $numbers = ['phone_number_1', 'phone_number_2', 'phone_number_3'];
                        @endphp
                        @foreach ($numbers as $number)
                            @isset($setting->$number)

                                <li>                                    
                                    <a href="tel:{{ $setting->$number }}" class="call_numbers">
                                        {{ $setting->$number }}
                                    </a>
                                </li>
                            @endisset
                        @endforeach
                </ul><!-- /.flat-support -->
            </div><!-- /.col-md-4 -->
            

            <div class="col-md-6">
                <ul class="flat-unstyled">
                    @guest
                        <li class="account">
                            <a href="{{ url('login') }}" title="">Sign In
                                {{-- <i class="fa fa-angle-down" aria-hidden="true"></i> --}}
                            </a>
                        </li>
                        <li class="account">
                            <a href="{{ url('register') }}" title="">Sign Up
                                {{-- <i class="fa fa-angle-down" aria-hidden="true"></i> --}}
                            </a>
                        </li>
                    @else
                        <li class="account">
                            <a href="{{ url('profile') }}" title="">My Account
                                {{-- <i class="fa fa-angle-down" aria-hidden="true"></i> --}}
                            </a>
                        </li>
                    @endguest


                </ul><!-- /.flat-unstyled -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.header-top -->

<div class="header-middle">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div id="logo" class="logo">
                    <a href="{{ url('/') }}" title="">
                        <img class="logo_image" src="{{ url('/'.$setting->header_logo) }}" alt="">
                    </a>
                </div><!-- /#logo -->
            </div><!-- /.col-md-3 -->


            <div class="col-md-5">
                <div class="top-search" style="z-index: 100;" >
                    <form action="" method="get" class="form-search" >

                        <div class="box-search" >
                            <input type="text" id="search" name="search" placeholder="Search what you want ?">

                            <div class="search-suggestions" id="product_list">

                            </div><!-- /.search-suggestions -->
                        </div><!-- /.box-search -->

                    </form><!-- /.form-search -->
                </div><!-- /.top-search -->
            </div><!-- /.col-md-5 -->



            <div class="col-md-4">

                <div class="box-cart" id="cartItems">
                    <div class="inner-box">
                        <ul class="menu-compare-wishlist">
                            <li class="compare">
                                <a href="{{ route('compare.page') }}" title="">
                                    <img src="{{ asset('frontend') }}/images/icons/compare.png" alt="">
                                </a>
                            </li>
                            @auth
                            <li class="wishlist">
                                <a href="{{ route('wishlist') }}" title="">
                                    <img src="{{ asset('frontend') }}/images/icons/wishlist.png" alt="">
                                </a>
                            </li>
                            @endauth
                        </ul><!-- /.menu-compare-wishlist -->
                    </div><!-- /.inner-box -->

                    <div class="inner-box" >
                        <a href="#" title="" >
                            <div class="icon-cart @if (Cart::content()->count()) text-danger @endif">
                                <img src="{{ asset('frontend') }}/images/icons/cart.png" alt="">
                                <span >{{ Cart::content()->count() }}</span>
                            </div>
                            <div class="price">
                                {{ Cart::total() }} ৳
                            </div>
                        </a>
                        <?php
                            $products = Cart::content();
                            $products = (array) $products;
                            $cartItems = [];
                            // dd($test);
                            foreach ($products as $key => $value) {
                                if (gettype($value) == 'array') {
                                    foreach ($value as $k => $v) {
                                        $cartItems[] = $v;
                                    }
                                }
                            }
                        ?>

                        <div class="dropdown-box header-dropdown">
                            @foreach ($cartItems as $key => $item)
                                <ul >
                                    <li>
                                        <div class="img-product">
                                            <img src="{{ $item->options->image }}" alt="">
                                        </div>
                                        <div class="info-product">
                                            <div class="name">
                                                {{ $item->name }}
                                            </div>
                                            <div class="price">
                                                <span>{{ $item->qty }} x</span>
                                                <span>{{ $item->price }}</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        {{-- <span class="delete">x</span> --}}
                                    </li>
                                </ul>
                            @endforeach
                            <div class="total">
                                <span>Subtotal:</span>
                                <span class="price">{{ Cart::total() }}</span>
                            </div>

                            <div class="btn-cart">
                                <a href="{{ url('/cart') }}" class="view-cart" title="">View Cart</a>
                                <a href="{{ url('/checkout') }}" class="check-out" title="">Checkout</a>
                            </div>
                        </div>
                    </div><!-- /.inner-box -->
                </div><!-- /.box-cart -->

            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.header-middle -->

@php
    $parentMenus = \App\Models\Category::where('parent_id', 0)->where('is_top_category', 1)->where('status', 1)->limit(5)->get();
@endphp

<div class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-2">

                @include('website.layouts.partials.navbar-mega')

            </div><!-- /.col-md-3 -->
            <div class="col-md-9 col-10">
                <div class="nav-wrap" style="z-index: -9">
                    <div id="mainnav" class="mainnav">
                        <ul class="menu">
                            @foreach ($parentMenus as $menu)
                            <li class="column-1">
                                <a href="{{ route('category_product', $menu->slug) }}" title="">{{ $menu->name }}</a>
                                <ul class="submenu">
                                    @foreach ($menu->childrens as $child)
                                    <li>
                                        <a href="{{ url('category/'.$child->slug) }}" title="">
                                            <i class="fa fa-angle-right" aria-hidden="true">
                                            </i> {{ $child->name }}
                                        </a>
                                    </li>
                                    @endforeach                                    
                                </ul><!-- /.submenu -->
                            </li><!-- /.column-1 -->
                            @endforeach
                        </ul><!-- /.menu -->

                        
                    </div><!-- /.mainnav -->
                </div><!-- /.nav-wrap -->
                <div class="today-deal d-flex gap-2" style="">
                    <div>
                        <a href="{{ route('about_us') }}" title="">About Us</a>                    
                    </div>
                    <div>
                        <a href="{{ route('contact') }}" title="">Contact</a>
                    </div>
                </div><!-- /.today-deal -->
                <div class="btn-menu">
                    <span></span>
                </div><!-- //mobile menu button -->
            </div><!-- /.col-md-9 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
</div><!-- /.header-bottom -->
</section><!-- /#header -->
