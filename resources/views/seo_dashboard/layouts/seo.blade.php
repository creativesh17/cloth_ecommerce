<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="https://md-shefat-masum.github.io/index/images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="https://md-shefat-masum.github.io/index/images/logo.png" type="image/x-icon">
    <title>Dashbaord</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

    <script src="/seo_dashboard/assets/jquery-3.2.1.min.js"></script>
    <script src="/seo_dashboard/assets/bootstrap.bundle.min.js"></script>
    @stack('plugins')

    <link rel="stylesheet" type="text/css" href="/seo_dashboard/assets/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="/seo_dashboard/assets/icofont.css">
    <link rel="stylesheet" type="text/css" href="/seo_dashboard/assets/themify.css">
    <link rel="stylesheet" type="text/css" href="/seo_dashboard/assets/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="/seo_dashboard/assets/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="/seo_dashboard/assets/style.css">
    <link rel="stylesheet" type="text/css" href="/seo_dashboard/assets/responsive.css">
    <link rel="stylesheet" type="text/css" href="/seo_dashboard/assets/custom.css">

    <script src="/seo_dashboard/assets/script.js" defer></script>
</head>

<body main-theme-layout="main-theme-layout-4">

    <div class="loader-wrapper">
        <div class="loader bg-white">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <h4>Have a great day at work today <span>&#x263A;</span></h4>
        </div>
    </div>

    <!--page-wrapper Start-->
    <div class="page-wrapper" id="app" data-v-app="">
        <div>
            @include('seo_dashboard.layouts.header')
            <div class="page-body-wrapper">
                <div>
                    @include('seo_dashboard.layouts.sidebar')
                    <div class="page-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--page-wrapper Ends-->
</body>

</html>
