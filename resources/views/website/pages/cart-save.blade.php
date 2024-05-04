{{-- <div class="icon-cart @if (Cart::content()->count()) text-danger @endif">
    <img src="{{ asset('frontend') }}/images/icons/cart.png" alt="">
    <span>{{ Cart::content()->count() }}</span>
</div> --}}


<div class="box-cart">
    <div class="inner-box">
        <ul class="menu-compare-wishlist">
            <li class="compare">
                <a href="compare.html" title="">
                    <img src="{{ asset('frontend') }}/images/icons/compare.png" alt="">
                </a>
            </li>
            <li class="wishlist">
                <a href="wishlist.html" title="">
                    <img src="{{ asset('frontend') }}/images/icons/wishlist.png" alt="">
                </a>
            </li>
        </ul><!-- /.menu-compare-wishlist -->
    </div><!-- /.inner-box -->

    <div class="inner-box" >
        <a href="#" title="" >
            <div class="icon-cart @if (Cart::content()->count()) text-danger @endif">
                <img src="{{ asset('frontend') }}/images/icons/cart.png" alt="">
                <span >{{ Cart::content()->count() }}</span>
            </div>
            <div class="price">
                {{ Cart::total() }}
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

















































{{-- cart-save --}}
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
                {{ number_format(Cart::total()) }} ৳
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
            <ul class="ul-cart-list">
                @foreach ($cartItems as $key => $item)
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
                @endforeach
            </ul>
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
</div>
<!-- /.box-cart -->










































