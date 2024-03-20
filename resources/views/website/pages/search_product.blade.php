@extends('website.layouts.app',[
    'meta' => [
        "title" => "Products from the search",
    ],
])

@section('content')

    @include('website.layouts.partials.breadcrumb')

<main id="shop">
    <div class="container">
        <div class="row">


            <div class="col-12">
                @if ($products && count($products))
                <div class="main-shop">
                    <div class="wrap-imagebox">

                        <div class="tab-product">
                            <div class="row sort-box">
                                @foreach($products as $product)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox">
                                            <div class="box-image overflow-box-image owl-carousel-1">
                                                <a href="#" title="">
                                                    <img src="{{ $product->photo_url }}" alt="">
                                                </a>
                                                <a href="#" title="">
                                                    <img src="{{ $product->photo_url }}" alt="">
                                                </a>
                                                <a href="#" title="">
                                                    <img src="{{ $product->photo_url }}" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
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
                                                    <a href="{{ url('product/'.$product->id) }}" title="">{{ $product->product_name }}</a><br>
                                                </div>
                                                <div class="price">
                                                    <span class="sale"> {{ $product->sales_price }} ৳</span>
                                                    {{-- <span class="regular">$2,999.00</span> --}}
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="{{ url('cart/add/'.$product->id) }}" class="addtocart" title="">
                                                        <img src="{{ asset('frontend')}}/images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="{{ asset('frontend')}}/images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="{{ asset('frontend')}}/images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox -->
                                    </div>
                                </div><!-- /.col-lg-4 col-sm-6 -->
                                @endforeach

                            </div>
                        </div>
                    </div><!-- /.wrap-imagebox -->

                    <div class="blog-pagination">
                        <span>
                            {{-- Showing 1–15 of 20 results --}}
                            May be more!
                        </span>
                        <ul class="flat-pagination style1">

                            {{ $products->links() }}
                        </ul>
                        <div class="clearfix"></div>
                    </div><!-- /.blog-pagination -->
                </div><!-- /.main-shop -->
                @else
                    <h2 class="alert alert-danger">No product found!</h2>
                @endif
            </div><!-- /.col-lg-9 col-md-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /#shop -->

@php
    // $products = \App\Models\Product::where('is_top_product', 1)->where('status', 1)->get();
    // dd($products)
@endphp
<section class="flat-imagebox style4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-row-title">
                    <h3>Recent Products</h3>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        @php
            $latestProducts = \App\Models\Product::where('status', 1)->limit(10)->latest()->get();
            // dd($latestProducts)
        @endphp

        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel-3 style3">
                @foreach ($latestProducts as $product)

                    <div class="imagebox style4">
                        <div class="box-image">
                            <a href="#" title="">
                                <img src="{{ $product->photo_url }}" alt="">
                            </a>
                        </div><!-- /.box-image -->
                        <div class="box-content">
                            {{-- <div class="cat-name"> --}}
                                {{-- <a href="#" title="">Laptops</a> --}}
                            {{-- </div> --}}
                            <div class="product-name">
                                <a href="#" title="">{{ $product->product_name }}</a>
                            </div>
                            <div class="price">
                                <span class="sale">{{ $product->sales_price }}</span>
                            </div>
                        </div><!-- /.box-content -->
                    </div><!-- /.imagebox style4 -->

                @endforeach
                </div><!-- /.owl-carousel-3 -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
</section><!-- /.flat-imagebox style4 -->

    <form method="POST" id="addCart">
        @csrf
    </form>

@endsection

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
