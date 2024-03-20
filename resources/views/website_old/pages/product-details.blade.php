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
@section('content')
@push('js_plugin')
<script src="{{ asset('contents/website/plugins/lightbox/lightbox.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('contents/website/plugins/lightbox/lightbox.min.css') }}">
@endpush
<main class="main-content">
    @if (isset($product))
    <section class="bread_cumb_section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/"><i class="fa fa-home" title="Home"></i></a>
                </li>
                <li >
                    <a href="#">
                        <span>product</span>
                    </a>
                </li>
                @foreach ($product->categories as $item)
                    @php
                        $params = [
                            "id" => $item['id'],
                            "category_name" => str_replace(' ', '-', strtolower($item['name']))
                        ];
                    @endphp
                    <li >
                        <a href="/{{ $item['url'] }}">
                            <span >{{ $item['name'] }}</span>
                        </a>
                    </li>
                @endforeach
                <li >
                    <a href="#">
                        {{-- <span>{{$product->product_url}}</span> --}}
                        <span>{{mb_strimwidth($product->product_url,0,20,' .....')}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    
    <div class="product-detail-area pt-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-detail-thumb me-lg-6">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="{{ $product->related_images[0]['image_link'] }}" data-lightbox="roadtrip" data-title="{{$product->product_name}}">
                                <img id="zoom1"
                                style="width: 100%"
                                src="{{ asset($product->related_images[0]['image_link']) }}"
                                alt="{{ $product->related_images[0]['alt'] }}">
                            </a>
                        </div>
                    </div>
                    <div class="single-zoom-thumb pb-3">
                        <ul class="s-tab-zoom single-product-active text-center mt-2" id="gallery_01">
                            @foreach ($product->related_images as $key=>$item)
                            <li class="d-inline">
                                <a href="{{ $item['image_link'] }}" alt="{{$item['alt']}}" data-lightbox="roadtrip" data-title="{{$product->product_name}}">
                                    <img
                                    class="img-thumbnail"
                                    style="cursor:pointer; margin: 5px;" width="90px"
                                    src="{{ $item['image_link'] }}" alt="{{$item['alt']}}">
                                </a>
                            </li>
                            @endforeach
                        </ul>                                                                                                                                                                                                    </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-detail-content">
                        <h1 class="product-detail-title">{{ $product->product_name }}</h1>

                        <table class="product-info-table">
                            <tbody>
                                @if ($product->discount && $product->discount['discount_last_date'] > Carbon\Carbon::now())
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Price</td>
                                        <td class="product-info-data product-price">
                                            {{ number_format($product->sales_price-$product->discount['discount_amount']) }}৳
                                        </td>
                                    </tr>
                                @endif
                                @if (is_numeric($product->sales_price))
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Regular Price</td>
                                        <td class="product-info-data product-regular-price">{{ number_format($product->sales_price) }}৳</td>
                                    </tr>
                                @endif
                                @if (is_numeric($product->sales_price) && is_numeric($product->stocks_sum_qty) && number_format($product->stocks_sum_qty) > 0)
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Status</td>
                                        <td class="product-info-data product-status">In Stock</td>
                                    </tr>
                                @endif
                                <tr class="product-info-group">
                                    <td class="product-info-label">Product Code</td>
                                    <td class="product-info-data product-code">{{$product->id}}</td>
                                </tr>
                                @if($product->product_brand)
                                    <tr class="product-info-group" itemprop="brand" itemtype=""
                                        itemscope="">
                                        <td class="product-info-label">Brand</td>
                                        <td class="product-info-data product-brand" itemprop="name">
                                            {{ $product->product_brand['name']}}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        @if (!is_numeric($product->sales_price))
                            <div class="product-detail-price-string mt-2">{{ $product->sales_price }}</div>
                        @endif

                        <div class="product-detail-review">
                            @if (collect($product->reviews)->avg('star') > 0)
                            <div class="product-detail-review-icon">
                                @for ($i = 0; $i < floor(collect($product->reviews)->avg('star')); $i++)
                                    <i class="fa fa-star"></i>
                                    @endfor
                                    @for ($j = $i; $j < 5; $j++) @if ($j==$i && fmod(collect($product->reviews)->avg('star'),
                                        $i))
                                        <i class="fa fa-star-half-o"></i>
                                        @else
                                        <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                            </div>
                            <p class="product-detail-review-show">
                                {{ number_format((float)collect($product->reviews)->avg('star'),1,'.') }}
                                ( {{ collect($product->reviews)->count() }} Review )
                            </p>
                            @endif
                        </div>


                        @if ($product->short_description)
                            <h5 class="product_page_short_details">Short Details</h6>
                            <div class="">
                                {!! $product->short_description !!}
                            </div>
                            <div>
                                <a href="#specification" class="more_info_button">More Info</a>
                            </div>
                        @endif

                        <div class="mb-3 mt-3">

                            {{-- @if ($product->stocks_sum_qty - $product->sales_sum_qty <= $product->low_stock)
                                <span class="me-4 mb-4 stock_alert">Out of stock</span>
                            @else
                                <button onclick="addToCart({{ $product->id }}, +cart_qty.value)" class="product-detail-cart-btn" type="button">Add to cart</button>
                            @endif --}}
                            @if($product->is_upcomming)
                                <button type="button" disabled class="product-detail-cart-btn mb-4">Up comming</button>
                            @elseif ($product->is_tba)
                                <button type="button" disabled class="product-detail-cart-btn mb-4">TBA</button>
                            @elseif ($product->is_pre_order)
                                <button type="button" disabled class="product-detail-cart-btn mb-4">Pre Order</button>
                            @elseif (!$product->is_in_stock)
                                <button type="button" disabled class="product-detail-cart-btn mb-4">Out of stock</button>
                            @else
                                {{-- <h5>Add to Cart</h5> --}}
                                <div class="d-flex gap-2">
                                    <div class="pro-qty mb-4">
                                        <button onclick="cart_qty.value=(+cart_qty.value-1>0?+cart_qty.value-1:1)">-</button>
                                        <input type="number" title="Quantity" id="cart_qty" min="1" value="1">
                                        <button onclick="cart_qty.value=+cart_qty.value+1">+</button>
                                    </div>
                                    <button type="button"
                                        onclick="vue_controller.methods.add_to_cart({
                                            id: {{ $product->id }},
                                            product_name: `{{ $product->product_name }}`,
                                            photo_url: `{{ asset($product->related_images[0]['image_link']) }}`,
                                            sales_price: {{ $product->active_price }},
                                            product_url: `{{ $product->product_url }}`,
                                            qty: document.getElementById('cart_qty').value,
                                        })"
                                        class="product-detail-cart-btn mb-4 shape_box1">
                                        <i class="fa fa-shopping-cart"></i>
                                        Buy Now
                                    </button>
                                </div>
                            @endif
                        </div>

                        <!--== End Features Area Wrapper ==-->
                        <ul class="product-detail-meta  mb-5 d-flex gap-2">
                            <li class="mb-2"><b>Share: </b></li>
                            <li>
                                <a class="share_btn" target="_blank" href="https://www.facebook.com/sharer.php?u={{ url()->full() }}">
                                    <i class="fa fa-facebook fb-color"></i>
                                </a>
                            </li>
                            <li>
                                <a class="share_btn" href="https://wa.me/?text={{ url()->full() }}" aria-label="Whatsapp" title="Whatsapp">
                                    <i class="fa fa-whatsapp wh-color"></i>
                                </a>
                            </li>
                            <li>
                                <a class="share_btn" href="mailto:ctgcomputer@gmail.com?subject={{$product->product_name}}&amp;body={{ url()->full() }}" title="Mail" aria-label="Email">
                                    <i class="fa fa-envelope-square env-color"></i>
                                </a>
                            </li>
                            <li>
                                <a class="share_btn" href="fb-messenger://share/?link={{ url()->full() }}" title="Facebook Messenger" aria-label="Messanger">
                                    <i class="fa fa-paper-plane msg-color"></i>
                                </a>
                            </li>
                            <li>
                                <a class="share_btn"
                                    href="https://twitter.com/intent/tweet?text=Baseus Control Gimbal Stabilizer Dark Grey Camera Tripod #SUYT-A0G&amp;url={{ url()->full() }}"
                                    title="Twitter"
                                    aria-label="Twitter"
                                >
                                    <i class="fa fa-twitter-square twt-color"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #f2f4f8">
        <div class="container">

            <!--== Start Product Detail Tab Area Wrapper ==-->
            <div class="row">
                <div class="col-lg-8 product-details">
                    <div class="navs product-detail-nav bg-light mt-3" id="product-detail-nav-tab" role="tablist">
                        <ul>
                            <li>
                                <a href="#specification" class="product-detail-nav-link active">Specification</a>
                            </li>
                            <li>
                                <a href="#description" class="product-detail-nav-link">Description</a>
                            </li>
                            <li>
                                <a href="#review" class="product-detail-nav-link">Review</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="product-detail-nav-tabContent">
                        <div class="tab-pane fade show active mb-4" >
                            <h3 class="my-4" id="specification">Specification</h3>
                            <div class="product-detail-nav-description bg-white p-4">
                                {!! $product->specification !!}
                            </div>

                            <h3 class="my-4" id="description">Description</h3>
                            <div class="product-detail-nav-description bg-white p-4">
                                {!! $product->description !!}
                            </div>
                        </div>

                        <div class="tab-pane show active" id="question">
                            <div class="card border-light my-5">
                                <div class="card-body">
                                    <h3 class="my-4">Questions</h3>
                                    @guest
                                        <p>Login to submit your question</p>
                                        <a href="/login">Login</a>
                                    @endguest
                                    @auth
                                        <div class="card border mb-4">
                                            <div class="card-body">
                                                <form id="review-form" action="{{ route('question_submit') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                    <div class="form-group">
                                                        <label for="reviewInput">Write Your Question</label>
                                                        <textarea required type="text" name="question" id="question" class="form-control" id="reviewInput" ></textarea>
                                                        @error('question')
                                                            <div class="text-danger">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="my-3 btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endauth

                                    @foreach ($product->questions as $item)
                                    @php
                                        $item = (object) $item;
                                    @endphp
                                    <div id="review">
                                        <div class="review-wrap">
                                            <div class="author">
                                                <span class="name">
                                                {{ $item->name }}
                                                </span>
                                                on {{Carbon\Carbon::parse($item->created_at)->format('d M Y')}}
                                            </div>
                                            <div class="d-flex gap-3">
                                                <b>Q.</b>
                                                <p class="review">{{ $item->question }}</p>
                                            </div>
                                            <div class="d-flex gap-3">
                                                <b>A.</b>
                                                <p class="review">{{ $item->answer }}</p>
                                            </div>
                                        </div>
                                        <div class="text-center"></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="review">
                            <div class="card border-light my-5">
                                <div class="card-body">
                                    <h3 class="my-4">Reviews</h3>
                                    @guest
                                        <p>Login for submit your reviews</p>
                                        <a href="/login">Login</a>
                                    @endguest
                                    @auth
                                        <div class="card border mb-4">
                                            <div class="card-body">
                                                <form id="review-form" action="{{ route('review_submit') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Select Rating</label>
                                                        <input type="hidden" name="rating" id="rating">
                                                        <input type="hidden" value="{{ $product->id }}" name="product_id"
                                                            id="product_id">
                                                        <ul class="d-flex gap-1">
                                                            <li><i data-serial="1" class="review_star fa fa-star"></i></li>
                                                            <li><i data-serial="2" class="review_star fa fa-star"></i></li>
                                                            <li><i data-serial="3" class="review_star fa fa-star"></i></li>
                                                            <li><i data-serial="4" class="review_star fa fa-star"></i></li>
                                                            <li><i data-serial="5" class="review_star fa fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    @error('rating')
                                                        <div class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                    <div class="form-group">
                                                        <label for="reviewInput">Write Your Review</label>
                                                        <textarea type="text" name="review_description" id="review_description"
                                                            class="form-control" id="reviewInput"
                                                            aria-describedby="reviewInputHelp"></textarea>
                                                        @error('review_description')
                                                            <div class="text-danger">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="my-3 btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endauth

                                    @foreach ($product->reviews as $item)
                                    @php
                                        $item = (object) $item;
                                    @endphp
                                    <div id="review">
                                        <div class="review-wrap">
                                            <div class="review-author">
                                                <span class="rating">
                                                    @for ($i = 0; $i < $item->star; $i++)
                                                        <i class="fa fa-star review_star2"></i>
                                                    @endfor
                                                </span>
                                            </div>
                                            <p class="review">{{ $item->review_description }}</p>
                                            <div class="author">
                                                By
                                                <span class="name">
                                                {{ $item->user?->first_name . " " . $item->user?->last_name }}
                                                </span>
                                                on {{Carbon\Carbon::parse($item->created_at)->format('d M Y')}}
                                            </div>
                                            <div>
                                            @if (Auth::user() && $item->creator == Auth::user()->id)
                                                <form action="{{ route('review_remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <button class="btn text-danger px-0 mt-3" >Remove review</button>
                                                </form>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="text-center"></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>


                    </div>
                    <!--== End Product Detail Tab Area Wrapper ==-->
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 my-3">
                        <div class="card-body">
                            <h4>Related Products</h4>
                            <div>
                                @foreach ($related_products as $r_product)
                                    @php
                                        $r_product = (object) $r_product;
                                    @endphp
                                    @if(isset($r_product->related_images[0]['image']))
                                        <div class="related_product">
                                            <div class="img">
                                                <img src="{{ asset($r_product->related_images[0]['image']) }}"/>
                                            </div>
                                            <div>
                                                <h4 class="product_name">
                                                    <a href="/{{ $r_product->product_url }}">
                                                        {{ $r_product->product_name }}
                                                    </a>
                                                </h4>
                                                <h5 class="product_price">{{ $r_product->sales_price }} ৳</h5>
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            var elements = document.getElementsByClassName("review_star");
            var selected_star = 0;
            for(var i = 0; i < elements.length; i++){
                elements[i].addEventListener("mouseover", function () {
                    for (var i = 0; i < elements.length; i++) {
                        elements[i].style.color = "gray";
                    }
                    selected_star = this.dataset.serial;
                    for (let index = 0; index < selected_star; index++) {
                        elements[index].style.color = 'orange';
                    }
                    document.getElementById('rating').value = selected_star;
                });
            }
        </script>
    </div>

    @endif
</main>
@endsection
