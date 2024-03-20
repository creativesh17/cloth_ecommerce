<section class="flat-imagebox style1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-row-title">
                    <h3>Top Categories</h3>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <div class="row ">
            <div class="col-md-12 ">
                <div class="d-flex flex-wrap gap-3">
                    {{-- @dd($topCate) --}}
                    @foreach ($topCate as $cate)
                        @if (isset($cate->category_image))
                            <div class="top_category_item">
                                <div class="cat_imagebox">
                                    <div class="cat-name">
                                        <a href="{{ route('category_product', $cate->slug) }}">

                                            <img class="top_category_image" src="{{ $cate->category_image }}"
                                                alt="">
                                        </a>
                                        <a href="{{ route('category_product', $cate->slug) }}">
                                            <p class="top_category_name">{{ $cate->name }}</p>
                                        </a>
                                    </div>
                                </div><!-- /.imagebox style1 -->
                            </div><!-- /.owl-carousel-item -->
                        @endif
                    @endforeach
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-imagebox style1 -->

{{-- Special Offer --}}
{{-- countdown available at Hungery Coder --}}
@php
    $specialProducts = \App\Models\Product::has('discount')->get();
@endphp

<section class="flat-imagebox style3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel-2">


                    @foreach ($specialProducts as $key => $specialProduct)
                        @php
                            // dd($specialProducts->toArray());
                            // $currentTime = Carbon\Carbon::parse(now());
                            $discountLastDate = Carbon\Carbon::parse($specialProduct->discount->discount_last_date);
                            // $totalTimeOverInDays = $currentTime->diffInDays($discountLastDate);\
                        @endphp
                        {{-- <div class="timer" data-time="{{ $specialProduct->created_at }}"></div> --}}

                        <div class="box-counter">
                            <div class="counter">
                                <span class="special">Special Offer</span>
                                <div class="counter-content">
                                    {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majorited
                                        have suffered alteration.</p> --}}


                                    <div class="count-down timer{{ $specialProduct->id }}{{ $key }}">
                                        <div class="square">
                                            <div class="numb" data-days="0">
                                                {{-- {{ $totalTimeOverInDays }} --}}
                                            </div>
                                            <div class="text">
                                                DAYS
                                            </div>
                                        </div>
                                        <div class="square">
                                            <div class="numb" data-hours="0">
                                                {{-- {{ $totalTimeOverInHours }} --}}
                                            </div>
                                            <div class="text">
                                                HOURS
                                            </div>
                                        </div>
                                        <div class="square">
                                            <div class="numb" data-minutes="0">
                                                {{-- {{ $totalTimeOverInMinutes }} --}}
                                            </div>
                                            <div class="text">
                                                MINS
                                            </div>
                                        </div>
                                        <div class="square">
                                            <div class="numb" data-seconds="0">
                                                {{-- {{ $totalTimeOverInSeconds }} --}}
                                            </div>
                                            <div class="text">
                                                SECS
                                            </div>
                                        </div>
                                    </div><!-- /.count-down -->

                                </div><!-- /.counter-content -->
                            </div><!-- /.counter -->
                            <div class="product-item">
                                <div class="imagebox style3">
                                    <div class="box-image save">
                                        <a href="#" title="">
                                            <img src="{{ $specialProduct->photo_url }}" alt="" width="321px"
                                                height="352px">
                                        </a>
                                        <span>Save {{ $specialProduct->sales_price - $specialProduct->active_price }}
                                            ৳</span>
                                    </div><!-- /.box-image -->
                                    <div class="box-content">
                                        <div class="product-name">
                                            <a href="#" title="">{{ $specialProduct->product_name }}</a>
                                        </div>
                                        <ul class="product-info">
                                            @if ($specialProduct->short_description)
                                                {!! $specialProduct->short_description !!}
                                            @endif
                                        </ul>
                                        <div class="price">
                                            <span class="regular">{{ $specialProduct->sales_price }} ৳</span>
                                            <span class="sale">{{ $specialProduct->active_price }} ৳</span>
                                        </div>
                                    </div><!-- /.box-content -->
                                    <div class="box-bottom">
                                        <div class="btn-add-cart">
                                            <a href="{{ route('cart.add', $specialProduct->id) }}" class="addtocart"
                                                title="">
                                                <img src="{{ asset('frontend') }}/images/icons/add-cart.png"
                                                    alt="">Add to Cart
                                            </a>
                                        </div>
                                        <div class="compare-wishlist">
                                            <a href="#" class="compare" title="">
                                                <img src="{{ asset('frontend') }}/images/icons/compare.png"
                                                    alt="">Compare
                                            </a>
                                            @auth
                                                <a href="{{ route('wishlist.add', $specialProduct->id) }}"
                                                    onclick="add_to_wish_list({{ $specialProduct->id }})" class="wishlist"
                                                    title="">
                                                    <img src="{{ asset('frontend') }}/images/icons/wishlist.png"
                                                        alt="">Wishlist
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}" class="wishlist" title="">
                                                    <img src="{{ asset('frontend') }}/images/icons/wishlist.png"
                                                        alt="">Wishlist
                                                </a>
                                            @endauth
                                        </div>
                                    </div><!-- /.box-bottom -->
                                </div><!-- /.imagbox style3 -->
                            </div><!-- /.product-item -->
                            <script>
                                timezz(document.querySelector('.timer{{ $specialProduct->id }}{{ $key }}'), {
                                    // date: 'Dec 01, 2024 20:00:00',
                                    date: '{{ $discountLastDate->format('M d, Y h:i:s') }}',
                                    pause: false,
                                    stopOnZero: true,
                                    beforeCreate() {},
                                    beforeUpdate() {},
                                    update(event) {},
                                });
                            </script>
                        </div><!-- /.box-counter -->
                    @endforeach

                </div><!-- /.owl-carousel-2 -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-imagebox style3 -->

<section class="flat-imagebox style4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-row-title">
                    <h2>Popular Products</h2>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row" id="mostView">
            @foreach ($mostViewProducts as $mostViewProduct)
                <div class="col-lg-3 col-md-3 col-sm-6">
                    @include('website.components.product_box', ['product' => $mostViewProduct])
                </div>
            @endforeach
        </div><!-- /.row -->


    </div><!-- /.container -->
</section><!-- /.flat-imagebox style4 -->
{{-- <form class="hide_this" method="POST" id="addCart">
    @csrf
</form> --}}

@push('js_plugin')
    <script>
        // $(function() {
        //     $(document).on('click', '.addtocart', function(e) {
        //         e.preventDefault();

        //         var url = $(this).attr('href');
        //         // alert(url);
        //         $('#addCart').attr('action', url).submit();

        //     });
        // });
    </script>
@endpush
