@extends('website.layouts.app', [
    'meta' => [
        'title' => 'Products of the Category',
    ],
])


@push('css_plugin')
@endpush

{{-- @dd($categories) --}}
{{-- @section('shortDetails')
    <div class="flat-row-title">
        <h3>{{ $category ? $category->name : '' }}</h3>
        <div class="clearfix"></div>
        <div class="py-4">
            <p class="">{!! $category->description ?? '' !!}</p>
        </div>
    </div>
    @php
        $brandAlls = \App\Models\Brand::where('status', 1)->latest()->limit(12)->get();
    @endphp
    <div class="col-md-12 bread-brand">
        <ul class="child-list my-2 d-flex flex-wrap gap-2">
            @foreach ($category->childrens as $child)
            <li>
                <a href="{{ route('category_product', $child->slug) }}">
                    {{ $child->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection --}}



@section('content')
    {{-- @include('website.layouts.partials.breadcrumb') --}}
    <section class="flat-breadcrumb flat-breadcrumb-modified">
        @isset($category)
            <div class="container">
                <ul class="breadcrumbs">
                    <li class="trail-item">
                        <a href="{{ url('/') }}"><i class="fa fa-home" title="Home" style="padding-right: 2px;"></i> Home</a>
                        <i><img src="{{ asset('frontend') }}/images/icons/arrow-right.png" alt=""></i>
                    </li>
                    @if($category->parent)
                    <li class="trail-item">
                        <a href="{{$category->parent->url}}">
                            <i>{{$category->parent->name}}</i>
                            <i><img src="{{ asset('frontend') }}/images/icons/arrow-right.png" alt=""></i>
                        </a>
                    </li>
                    @endif
                    <li class="trail-item">
                        <a href="{{$category->url}}">
                            <i>{{$category->name}}</i>
                        </a>
                    </li>
                </ul>
            </div>
        @endisset
    </section>

    @php
        $brandAll = \App\Models\Brand::where('status', 1)->latest()->limit(222)->get();
        $storeBrand = null;
    @endphp
    <main id="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="sidebar ">

                        <div class="widget widget-brands py-2 px-2">
                            <div class="widget-title">
                                <h3>Brands<span></span></h3>
                                <div style="height: 2px"></div>
                            </div>
                            <div class="widget-content">
                                {{-- <form action="#" method="get">
                                <input type="text" name="brands" placeholder="Brands Search">
                            </form> --}}
                                <ul class="box-checkbox scroll">
                                    @foreach ($brandAll as $brand)
                                        {{-- <form action="{{ route('productsByBrands', $brand->id) }}" method="get"> --}}

                                        <li class="check-box">
                                            <input type="checkbox" id="brand_name{{ $brand->id }}" name="brand_name"
                                                onclick="brandID('{{ $brand->id }}');">
                                            <label for="brand_name{{ $brand->id }}">{{ $brand->name }}</label>
                                        </li>

                                        {{-- </form> --}}
                                    @endforeach
                                </ul>
                            </div>
                        </div><!-- /.widget widget-brands -->


                        {{-- Price Range --}}


                        <div class="widget widget-price py-2 px-2">
                            <div class="widget-title">
                                <h3>Price<span></span></h3>
                                <div style="height: 20px; padding: 25px"></div>
                            </div>
                            <div class="widget-content">
                                <div class="price search-filter-input" id="slider-range">

                                </div>
                            </div>
                        </div><!-- /.widget widget-price -->



                        <div class="widget widget-color">
                            <div class="widget-title">
                                <h3>Color<span></span></h3>
                                <div style="height: 2px"></div>
                            </div>
                            <div class="widget-content">
                                {{-- <form action="#" method="get" accept-charset="utf-8">
                                <input type="text" name="color" placeholder="Color Search">
                            </form> --}}
                                <div style="height: 5px"></div>
                                <ul class="box-checkbox scroll">
                                    <li class="check-box">
                                        <input type="checkbox" id="check1" name="check1">
                                        <label for="check1">Black <span>(4)</span></label>
                                    </li>
                                    <li class="check-box">
                                        <input type="checkbox" id="check6" name="check6">
                                        <label for="check6">Pink <span>(3)</span></label>
                                    </li>
                                    <li class="check-box">
                                        <input type="checkbox" id="check7" name="check7">
                                        <label for="check7">Green <span>(4)</span></label>
                                    </li>
                                    <li class="check-box">
                                        <input type="checkbox" id="check8" name="check8">
                                        <label for="check8">Gold <span>(4)</span></label>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.widget widget-color -->

                    </div><!-- /.sidebar -->
                </div><!-- /.col-lg-3 col-md-4 -->


                <div class="col-lg-9 col-md-8">
                    <div class="main-shop">
                        <div class="wrap-imagebox">
                            <div class="flat-row-title">
                                {{-- <h3>{{ $category ? $category->name : '' }}</h3> --}}
                                <div class="clearfix"></div>
                            </div>

                            <div class="tab-product">
                                <div class="row sort-box mt-2 categoryWiseProduct" id="categoryWiseProductlist">
                                    @foreach ($categories as $product)
                                        <div class="col-lg-4 col-sm-6">
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
                                {{ $categories->links() }}
                            </ul>
                            <div class="clearfix"></div>
                        </div><!-- /.blog-pagination -->
                    </div><!-- /.main-shop -->

                </div><!-- /.col-lg-9 col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /#shop -->

    <script>
        var slider = document.getElementById('slider-range');
        let brandId = []
        var min = 5
        var max = {{ $max }}

        let slide = noUiSlider.create(slider, {
            start: [5, {{ $max }}], // set min max, this categor min price product, max price product.
            tooltips: [true, true], //
            connect: true,
            range: {
                'min': min,
                'max': max
            }
        });
        slide.on('change', function(values, handle, unencoded, tap, positions, noUiSlider) {
            [min, max] = values;
            console.log(min, max);
            // js promise
            findProduct(min, max)

        });

        function brandID(id) {
            if (event.target.checked) {
                if (brandId.indexOf(id) === -1) {
                    brandId.push(id)
                }
            } else {
                brandId.splice(0, 1)
            }
            findProduct(min, max, brandId)
        }

        function findProduct(min, max, brandId = []) {
            fetch('/filter-price-products?' + `min=${min}&max=${max}&cate=${ {{ $category->id }}}&brands=${brandId}`)
                .then(res => res.text())
                .then(res => {
                    console.log(res);
                    categoryWiseProductlist.innerHTML = res;
                })
        }
    </script>


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
