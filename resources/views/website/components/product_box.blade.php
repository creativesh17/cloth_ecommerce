<div class="product-box my-product-box">
    <div class="imagebox my-imagebox">
        <div class="box-image ">
            <a href="#" title="">
                <img src="{{ $product->photo_url }}" alt="">
            </a>
        </div><!-- /.box-image -->
        <div class="box-content my-box-content">
            <div class="cat-name">
                <a href="{{ url('product/'.$product->id) }}" title="">
                    @php
                    $dcount = 0;
                    @endphp
                    @foreach ($product->categories as $category)
                        {{ $category->name }}
                        @php
                            $dcount += 1;
                            if($dcount > 1) break;
                        @endphp
                        @break
                    @endforeach
                </a>
            </div>
            <div class="product-name">

                <a href="{{ url('product/'.$product->id) }}" title="">{{ substr($product->product_name, 0, 35) }}</a><br>
                {{-- @dd(S::substr($product->product_name, 15)) --}}
            </div>
            {{-- <div class="price">
                <span class="sale"> {{ $product->sales_price }} ৳</span>
                <span class="regular">$2,999.00</span> 
            </div> --}}

            <div class="price d-flex justify-content-center gap-2">
                @if ($product->discount && $product->discount['discount_last_date'] > Carbon\Carbon::now())
                    <div class="regular my-regular-price product_box_price_regular" style="">
                        {{ $product->sales_price }} ৳
                    </div>
                    <div class="sale my-sale">

                        {{ $product->active_price }} ৳
                    </div>
                @else
                    <div class="sale my-sale product_box_price_sale">
                        {{ $product->sales_price }} ৳
                    </div>
                @endif
            </div>

        </div><!-- /.box-content -->
        <div class="box-bottom">
            <div class="btn-add-cart">
                <a href="{{ route('cart.add', $product->id) }}" class="addtocart" title="">
                    <img src="{{ asset('frontend')}}/images/icons/add-cart.png" alt="">Add to Cart
                </a>
            </div>
            <div class="compare-wishlist">
                <a href="{{ route('products.compare', $product->id) }}" class="compare addToCompare" title="">
                    <img src="{{ asset('frontend')}}/images/icons/compare.png" alt="">Compare
                </a>
                @auth
                <a href="{{ route('wishlist.add', $product->id) }}" onclick="add_to_wish_list({{ $product->id }})" class="wishlist" title="">
                    <img src="{{ asset('frontend')}}/images/icons/wishlist.png" alt="">Wishlist
                </a>    
                @else
                <a href="{{ route('login') }}" class="wishlist" title="">
                    <img src="{{ asset('frontend')}}/images/icons/wishlist.png" alt="">Wishlist
                </a>    
                @endauth
            
            </div>
        </div><!-- /.box-bottom -->
    </div><!-- /.imagebox -->
</div>



{{-- <script>
    $(function() {
        $(document).on('click', '.addtocart', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');
            // alert(url);
            $('#addCart').attr('action', url).submit();

        });
    });
</script> --}}