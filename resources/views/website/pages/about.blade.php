@extends('website.layouts.app',[
    'meta' => [
        "title" => "about us",
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
            <div class="col-md-2">
                <ul class="breadcrumbs">
                    <li class="trail-item">
                        <a href="{{ url('/') }}" title="">Home</a>
                        <span><img src="{{ asset('frontend') }}/images/icons/arrow-right.png" alt=""></span>
                    </li>
                </ul><!-- /.breacrumbs -->
            </div><!-- /.col-md-12 -->

            {{-- <div class="col-md-12">
                @yield('shortDetails')
            </div> --}}

        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-breadcrumb -->


<section class="flat-term-conditions">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="term-conditions">
                    <div class="text-wrap"> <br>
                        {!! $setting->big_about !!}
                    </div><!-- /.text-wrap -->
                </div><!-- /.term-conditions -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-term-conditions -->

@endsection

