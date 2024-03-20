<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/{{ $setting->fabicon }}">
    <link rel="manifest" href="/manifest.json">
    <script src="/active_sw.js"></script>

    @include('website.include.meta',[
        'meta' => $meta??[]
    ])

    <link rel="stylesheet" href="{{ asset('contents/website/styles/bootstrap.css') }}">

    @stack('css_plugin')

    <link rel="stylesheet" href="{{ asset('contents/website/styles/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/frontend') }}/assets/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('contents/website/styles/style.css') }}">
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    @include('layouts.website_style')
</head>

<body class="wrapper home-five-wrapper">

    @include('website.layouts.top_header')
    @include('website.layouts.header')
    @include('website.layouts.navbar')

    @if($setting->breaking_news)
        <style>
            .latest_news .marquee_body marquee {
                font-size: 15px;
                line-height: 30px;
                height: 24px;
            }
        </style>
        <div class="latest_news">
            <div class="container custom-container">
                <div class="marquee_body">
                    <marquee>
                        {{ $setting->breaking_news }}
                    </marquee>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    @include('website.include.add_to_cart_modal')
    @include('website.include.mini_cart')
    @include('website.include.gallery_show_modal')

    @include('website.layouts.footer')

    <script src="{{ asset('contents/website/js/bootstrap.js') }}" ></script>
    <script src="{{ asset('contents/website/js/s_alert.js') }}" ></script>
    <script src="{{ asset('contents/website/js/app.js') }}" ></script>
    @stack('js_plugin')
</body>

</html>
