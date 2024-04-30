@extends('website.layouts.app',[
    'meta' => [
        "title" => "Sitemap",
    ],
])

@section('content')

<section class="flat-breadcrumb flat-breadcrumb-modified flat-row flat-slider marquee_flat_all">
    <div class="container">

        <div class="row">
            <div class="col-md-12 marquee_wrapper">
                <div class="marquee_body">
                    <marquee behavior="" direction="">
                        {{ $setting->breaking_news }}
                    </marquee>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs ">
                    <li class="trail-item">
                        <a href="{{ url('/') }}" title="">home</a>
                        <span><img src="{{ asset('frontend') }}/images/icons/arrow-right.png" alt=""></span>
                    </li>
                    <li class="trail-item">
                        <a href="#" title="">sitemap</a>
                        {{-- <span><img src="{{ asset('frontend') }}/images/icons/arrow-right.png" alt=""></span> --}}
                    </li>
                </ul><!-- /.breacrumbs -->
            </div><!-- /.col-md-12 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-breadcrumb -->

<section class="flat-contact">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <ul class="sitemap_list">                    
                    <li>
                        <a href="{{ route('home') }}">Home Page</a>
                    </li>                    
                    <li>
                        <a href="{{ route('about_us') }}">About Us</a>
                    </li>                    
                    <li>
                        <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
                    </li>                    
                    <li>
                        <a href="{{ route('terms') }}">Terms & Conditions</a>
                    </li>                    
                    <li>
                        <a href="{{ route('terms') }}">Terms & Conditions</a>
                    </li>                    
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>                    
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>                    
                    <li>
                        <a href="{{ route('cart') }}">Cart</a>
                    </li>       
                    <li>
                        <a href="{{ route('wishlist') }}">Wishlist</a>
                    </li>     
                    <li>
                        <a href="{{ route('checkout') }}">Checkout</a>
                    </li>                   
                </ul>
                <ul class="sitemap_list">
                    @foreach ($categories as $mapCategory)    
                    <li>
                        <a href="{{ route('category_product', $mapCategory->slug) }}">{{ $mapCategory->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-contact -->

@endsection

