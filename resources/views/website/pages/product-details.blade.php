@extends('website.layouts.app',[
    'meta' => [
        "title" => isset($product->product_name) ? $product->product_name :  "",
        "og_title" => isset($product->product_name) ? $product->product_name :  "",
        "twitter_title" => isset($product->product_name) ? $product->product_name :  "",
        "image" => isset($product->related_images[0]['image']) ? url('') . '/' . $product->related_images[0]['image'] : "",
        "og_image" => isset($product->related_images[0]['image']) ? url('') . '/' . $product->related_images[0]['image'] : "",
        "twitter_image" => isset($product->related_images[0]['image']) ? url('') . '/' . $product->related_images[0]['image'] : "",
        "description" => $product->meta_decription ?? "",
        "price" => isset($product->sales_price) ? $product->sales_price : "" ,
        "keywords" => isset($product->search_keywords) ? $product->search_keywords : ""
    ],
])

@push('css_plugin')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/stylesheets/better-rating.css">
<link rel="stylesheet" href="{{ asset('contents/website/plugins/lightbox/lightbox.min.css') }}">
@endpush

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
@if (isset($product))
{{-- @include('website.layouts.partials.breadcrumb', []) --}}
<section class="flat-breadcrumb flat-breadcrumb-modified marquee_flat_all">
    <div class="container">

        <div class="row flat-marquee">
            <div class="col-md-12 marquee_wrapper">
                <div class="marquee_body">
                    <marquee behavior="" direction="">
                        {{ $setting->breaking_news }}
                    </marquee>
                </div>
            </div>
        </div>

        <ul class="breadcrumbs">
            <li class="trail-item">
                <a href="{{ url('/') }}"><i class="fa fa-home" title="Home" style="padding-right: 2px;"></i> Home</a>
            </li>

            <li  class="trail-item">
                <a href="#">
                    <i class="mr-2">Product</i>
                    <i><img src="{{ asset('frontend') }}/images/icons/arrow-right.png" alt=""></i>
                </a>
            </li>

            @foreach ($product->categories as $item)
                @php
                    $params = [
                        "id" => $item['id'],
                        "category_name" => str_replace(' ', '-', strtolower($item['name']))
                    ];
                @endphp
                <li  class="trail-item">
                    <a href="{{ route('category_product', $item->slug) }}">
                        <i class="mr-2">{{ $item['name'] }}</i>
                        <i><img src="{{ asset('frontend') }}/images/icons/arrow-right.png" alt=""></i>
                    </a>

                </li>

            @endforeach
            <li  class="trail-item">
                <a href="#">
                    {{-- <span>{{$product->product_url}}</span> --}}
                    <i>{{mb_strimwidth($product->product_url,0,20,' .....')}}</i>
                </a>
            </li>
        </ul>

        <div class="col-md-12 ">
            @php
                $brandAlls = \App\Models\Brand::where('status', 1)->latest()->limit(12)->get();
            @endphp
            <div class="col-md-12 bread-brand">
                <ul class="child-list my-2 d-flex flex-wrap gap-2">
                    @foreach ($brandAlls as $brand)
                    <li>
                        <a href="{{ route('productsByBrands', $brand->id)  }}">
                            {{ $brand->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</section>

<section class="flat-product-detail">
    <div class="container">
        <div class="row">


            {{-- <div class="col-md-6">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->related_image as $productImage)
                            <li data-thumb="{{ url($productImage->image) }}">
                                <a href='#' id="zoom" class='zoom'>
                                    <img src="{{ url($productImage->image) }}" alt='' width='400' height='300' />
                                </a>
                                <span>NEW</span>
                            </li>
                        @endforeach
                    </ul><!-- /.slides -->
                </div><!-- /.flexslider -->
            </div><!-- /.col-md-6 --> --}}

            <div class="col-md-5">
                <div>
                    <div>

                    </div>
                    <div>
                        <div class="flexslider">
                            <ul class="slides">
                                @foreach ($product->related_image as $productImage)
                                    <li data-thumb="{{ url($productImage->image) }}">
                                        <a href='{{ url($productImage->image) }}' id="zoom" class='zoom' data-lightbox="product_gallery">
                                            <img src="{{ url($productImage->image) }}" alt='' width='400' height='300' />
                                        </a>
                                        <span>NEW</span>
                                    </li>
                                @endforeach

                            </ul><!-- /.slides -->
                        </div><!-- /.flexslider -->
                    </div>
                </div>

            </div><!-- /.col-md-6 -->


            <div class="col-md-7">
                <div class="product-detail">
                    <div class="header-detail">

                        <h4 class="name">{{ $product->product_name }}</h4>
                        <div class="category">
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
                        </div>

                        <div class="reviewed">
                            <div class="review">
                                <div class="queue">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <span>3 Reviews</span>
                                </div>
                            </div><!-- /.review -->
                            <div class="status-product">
                                Availablity
                                <span>
                                    @if($product->is_in_stock == 1 ) In Stock
                                    @else Not Available
                                    @endif
                                </span>
                            </div>
                        </div><!-- /.reviewed -->

                    </div><!-- /.header-detail -->
                    <br>
                    <div class="content-detail">

                        <div>
                            <table class="table my-product-detail">
                                <tbody>
                                    <tr>
                                        <td>Product Price</td>
                                        <td>{{ $product->sales_price }} ৳</td>
                                    </tr>
                                    <tr>
                                        <td>Special Price</td>
                                        <td>{{ $product->active_price }} ৳</td>
                                    </tr>
                                    <tr>
                                        <td>Stock Status<br></td>
                                        <td>
                                            <span>
                                                @if($product->is_in_stock == 1 ) In Stock
                                                @else Out of Stock
                                                @endif
                                            </span>
                                            <br>
                                        </td>
                                    </tr>
                                    @if($product->sku)
                                    <tr>
                                        <td>Product SKU</td>
                                        <td>
                                            {{ $product->sku }}
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>Brand<br></td>
                                        <td>
                                            <a href="{{ route('productsByBrands', $product->brand->id) }}">
                                                {{ $product->brand->name }}
                                            </a><br>
                                        </td>
                                    </tr>
                                    {{-- @php
                                        $variants = $product->productvariants()->get()->unique('title');
                                        $varaintValues = [];
                                        foreach ($variants as $key => $variant) {
                                            $varaintValues[$variant->title] =  $variant->value_products()->where('product_id', $product->id)->with('value')->get();

                                        }
                                    @endphp --}}
                                    @foreach ($varaintValues as $key=>$variants)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>
                                            @foreach ($variants as $value)
                                                {{ $value->value->title }},
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td>Warranty</td>
                                        <td>
                                            {{ $product->waranty_information }}
                                            <br>
                                        </td>
                                    </tr>
                                    <?php $totalRevs = \App\Models\ProductReview::where('product_id', $product->id)->count(); ?>
                                    <tr>
                                        <td>Total Reviews<br></td>
                                        <td class="review-links">
                                            {{ $totalRevs }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="price">
                            @if ($product->discount && $product->discount['discount_last_date'] > Carbon\Carbon::now())
                            {{-- @if ($product->active_price) --}}
                                <div class="regular my-regular-price" style="float: left; margin-right: 10px;">
                                    {{ $product->sales_price }} ৳
                                </div>
                                <div class="sale my-sale">
                                    {{-- {{ number_format($product->sales_price->$product->discounts['discount_amount']) }} ৳ --}}
                                    {{-- {{ number_format($product->discounts['discount_amount']) }} ৳ --}}

                                    {{ $product->active_price }} ৳
                                    {{-- {{ $product->sales_price - $product->discount['discount_amount'] }} ৳ --}}
                                </div>
                            @else
                                <div class="sale my-sale">
                                    {{ $product->sales_price }} ৳
                                </div>
                            @endif
                        </div>

                    </div>
                    <!-- /.content-detail -->

                    <form action="{{ route('cart.add', $product->id) }}" method="POST" id="addCart">
                        @csrf
                        <div class="footer-detail">
                            <div class="product_cart_box">
                                {{-- <div class="colors">
                                    <select name="color">
                                        <option value="">Select Color</option>
                                        <option value="">Black</option>
                                        <option value="">Red</option>
                                        <option value="">White</option>
                                    </select>
                                </div> --}}
                                <div class="">
                                    <span class=""></span>
                                    <input type="number" class="cartQuantity" name="qty" value="1" min="1" max="100" placeholder="Quanlity">
                                    <span class=""></span>
                                </div>
                                <div>
                                    @if ($product->is_in_stock > 0 && $product->stock != 0)
                                    <div class="btn-add-cart">
                                        <button type="submit" class="add_to_cart">
                                            <img src="{{ asset('frontend') }}/images/icons/add-cart.png" alt="" >
                                            Add to Cart
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div><!-- /.quanlity-box -->

                            {{-- @dd($product->stock) --}}
                            <div class="box-cart style2">
                                @if ($product->is_in_stock > 0 && $product->stock != 0)
                                <div class="compare-wishlist">
                                    <a href="{{ route('products.compare', $product->id) }}" class="compare addToCompare" title=""><img src="{{ asset('frontend') }}/images/icons/compare.png" alt="">Compare</a>
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
                                @else
                                <div class="btn-stock-out">
                                    <button type="submit" disabled>
                                        Out of Stock
                                    </button>
                                </div>
                                @endif
                            </div><!-- /.box-cart -->

                            <div class="social-single">
                                <span>Contact</span>
                                <ul class="social-list style2">
                                    <li>
                                        <a href="https://wa.me/{{ $setting->whatsapp_number_1 }}" class="s_icon" title="" target="_blank">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://m.me/{{ $setting->messenger_username_id }}" class="s_icon" title="" target="_blank">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://t.me/{{ $setting->telegram_username }}" class="s_icon" title="" target="_blank">
                                            <i class="fa fa-telegram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:{{ $setting->email_1 }}" class="s_icon" title="" target="_blank">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tel:+{{ $setting->phone_number_1 }}" class="s_icon" title="" target="_blank">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul><!-- /.social-list -->
                            </div><!-- /.social-single -->
                        </div><!-- /.footer-detail -->
                    </form>

                </div><!-- /.product-detail -->
            </div><!-- /.col-md-6 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-product-detail -->

<section class="flat-product-content">
    <ul class="product-detail-bar">
        <li class="active">Description</li>
        <li>Tecnical Specs</li>
        <li>Reviews</li>
    </ul><!-- /.product-detail-bar -->

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="description-text">
                    {!! $product->description !!}
                </div><!-- /.description-text -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-10">
                <div class="tecnical-specs">
                    {!! $product->specification !!}
                </div><!-- /.tecnical-specs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->


        <div class="row">
            <div class="col-md-6">
                <div class="rating">
                    <div class="title">
                        Based on {{ $product->reviews()->count() }} reviews
                    </div>
                    <div class="score">
                        <div class="average-score">
                            <p class="numb">{{ $product->rating_count }}</p>
                            <p class="text">Average score</p>
                        </div>
                        @if ($product->rating_count >= 1 && $product->rating_count < 2)
                        <div class="queue">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        @elseif($product->rating_count >= 2 && $product->rating_count < 3)
                        <div class="queue">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        @elseif($product->rating_count >= 3 && $product->rating_count < 4)
                        <div class="queue">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        @elseif($product->rating_count >= 4 && $product->rating_count < 5)
                        <div class="queue">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        @elseif($product->rating_count == 5)
                        <div class="queue">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        @endif

                    </div><!-- /.score -->
                    <ul class="queue-box">
                        <li class="five-star">
                            <span>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <span class="numb-star">5</span>
                        </li><!-- /.five-star -->
                        <li class="four-star">
                            <span>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <span class="numb-star">4</span>
                        </li><!-- /.four-star -->
                        <li class="three-star">
                            <span>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <span class="numb-star">3</span>
                        </li><!-- /.three-star -->
                    </ul><!-- /.queue-box -->
                </div><!-- /.rating -->
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
                <div class="form-review">
                    {{-- @guest --}}
                    {{-- <h4 class="text-center"><a href="{{ url('/login') }}">Please login first for review</a></h4> --}}
                    {{-- @else --}}
                    <div class="title">
                        <strong>Add a review</strong> or <strong>Sign in first to add a review</strong>
                    </div>
                    <form action="{{ route('review.new') }}" method="POST" id="better-rating-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="text" name="name" placeholder="Your Name" class="form-control">
                        <div class="rating">
                            <i class="fa fa-star" data-rate="1"></i>
                            <i class="fa fa-star" data-rate="2"></i>
                            <i class="fa fa-star" data-rate="3"></i>
                            <i class="fa fa-star" data-rate="4"></i>
                            <i class="fa fa-star" data-rate="5"></i>
                            <input type="hidden" id="rating-count" name="rating" value="0">
                        </div>
                        <textarea class="form-control" name="review_description" id="" cols="30" rows="10" required></textarea>
                        <button class="btn btn-info" type="submit">Add Review</button>
                    </form>
                    {{-- @endguest --}}

                </div><!-- /.form-review -->
            </div><!-- /.col-md-6 -->


            {{-- Review List --}}
            <div class="col-md-12">
                <ul class="review-list">
                    @if($revs && count($revs))
                    @foreach ($revs as $key=>$rev)
                    {{-- @dd($rev->user) --}}
                    {{-- @if($rev[0] && count($rev[$key])) --}}
                    <li>
                        <div class="review-metadata">
                            <div class="name">
                                @if(isset($rev->user))
                                {{ $rev->user->first_name }}: <span>{{ $rev->created_at->diffForHumans() }}</span>
                                @endif
                            </div>
                            <div class="queue">
                                @if($rev->star == 1)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @elseif($rev->star == 2)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @elseif($rev->star == 3)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @elseif($rev->star == 4)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @elseif($rev->star == 5)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                <p>No star</p>
                                @endif
                            </div>
                        </div><!-- /.review-metadata -->
                        <div class="review-content">
                            <p>
                                {{ $rev->review_description }}
                            </p>
                        </div><!-- /.review-content -->
                    </li>
                    {{-- @endif --}}
                    @endforeach
                    @else
                    <h2 class="alert alert-danger">No reviews for this product!</h2>
                    @endif
                </ul><!-- /.review-list -->
            </div><!-- /.col-md-12 -->


        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-product-content -->


<section class="flat-imagebox style4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-row-title">
                    <h3>Related Products</h3>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel-3">

                    @foreach($product->categories()->latest()->get() as $key=>$item)
                        @if ($item->products()->count())
                            @foreach ($item->products()->paginate(3)->items() as $r_product)
                            {{-- <div class="imagebox style4">
                                <div class="box-image">
                                    <a href="#" title="">
                                        <img src="{{ $r_product->related_images[0]['image_link'] }}"/>
                                    </a>
                                </div><!-- /.box-image -->
                                <div class="box-content">
                                    <div class="cat-name">
                                        <a href="#" title="">Laptops</a>
                                    </div>
                                    <div class="product-name">
                                        <a href="{{ $r_product->product_url }}">
                                            {{ $r_product->product_name }}
                                        </a>
                                    </div>
                                    <div class="price">
                                        <span class="sale">{{ $r_product->sales_price }} ৳</span>
                                    </div>
                                </div><!-- /.box-content -->
                            </div> --}}
                                @include('website.components.product_box', [
                                    'product' => $r_product,
                                ])
                            @endforeach
                            @php
                                if($key > 6)
                                break;
                            @endphp
                        @endif
                    @endforeach

                    <!-- /.imagebox style4 -->
                </div><!-- /.owl-carousel-3 -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-imagebox style4 -->

@endif





@endsection
@push('js_plugin')
<script src="{{ asset('contents/website/plugins/lightbox/lightbox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend') }}/javascript/better-rating.js"></script>
<script>
    $('#better-rating-form').betterRating();
</script>
@endpush
