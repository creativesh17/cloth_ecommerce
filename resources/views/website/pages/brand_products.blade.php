@extends('website.layouts.app', [
    'meta' => [
        'title' => 'Products of the Category',
    ],
])


@push('css_plugin')
@endpush


@section('content')
    {{-- @include('website.layouts.partials.breadcrumb') --}}
    <section class="flat-breadcrumb flat-breadcrumb-modified">
        
        <div class="container">
            <ul class="breadcrumbs">
                <li class="trail-item">
                    <a href="{{ url('/') }}"><i class="fa fa-home" title="Home" style="padding-right: 2px;"></i> Home</a>
                    <i><img src="{{ asset('frontend') }}/images/icons/arrow-right.png" alt=""></i>
                </li>
                
            </ul>
        </div>
        
    </section>

    @php
        $brandAll = \App\Models\Brand::where('status', 1)->latest()->limit(222)->get();
        $storeBrand = null;
    @endphp
    <main id="shop">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="main-shop">
                        <div class="wrap-imagebox">
                          

                            <div class="tab-product">
                                <div class="row sort-box mt-2 brandWiseWiseProduct" id="brandWiseProductlist">
                                    @foreach ($products as $product)
                                        <div class="col-lg-3 col-sm-6">
                                            @include('website.components.product_box', [
                                                'product' => $product,
                                            ])
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

                </div><!-- /.col-lg-12 col-md-12 -->

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
                    <div class="owl-carousel-3">
                        @foreach ($latestProducts as $latestProduct)
                            @include('website.components.product_box', ['product' => $latestProduct])
                        @endforeach
                    </div><!-- /.owl-carousel-3 -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->

        </div><!-- /.container -->
    </section><!-- /.flat-imagebox style4 -->

    {{-- <form method="POST" id="addCart">
        @csrf
    </form> --}}
@endsection

@push('js_plugin')
@endpush
