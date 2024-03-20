<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @include('website.layouts.partials.meta', [
        'meta' => $meta ?? [],
    ])
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/countdown.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/stylesheets/nouislider.min.css">
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/nouislider.min.js"></script>
    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/stylesheets/bootstrap.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/plugins/sweetalert2.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.min.css" />
    <!-- Theme style -->    
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/stylesheets/style.css">
    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/stylesheets/custom.css">
    @stack('css_plugin')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/stylesheets/responsive.css">
    <link rel="shortcut icon" href="{{ $setting->fabicon }}">

</head>

<body class="header_sticky">
    <div class="boxed">

        <div class="overlay"></div>

        <!-- Preloader -->
        {{-- <div class="preloader">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div> --}}
        <!-- /.preloader -->

        {{-- <div class="popup-newsletter">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">

                    </div>
					<div class="col-sm-8">
						<div class="popup">
							<span></span>
							<div class="popup-text">
								<h2>Join our newsletter and <br />get discount!</h2>
								<p class="subscribe">Subscribe to the newsletter to receive updates about new products.</p>
								<div class="form-popup">
									<form action="#" class="subscribe-form" method="get" accept-charset="utf-8">
										<div class="subscribe-content">
											<input type="text" name="email" class="subscribe-email" placeholder="Your E-Mail">
											<button type="submit"><img src="{{ asset('frontend') }}/images/icons/right-2.png" alt=""></button>
										</div>
									</form><!-- /.subscribe-form -->
									<div class="checkbox">
										<input type="checkbox" id="popup-not-show" name="category">
										<label for="popup-not-show">Don't show this popup again</label>
									</div>
								</div><!-- /.form-popup -->
							</div><!-- /.popup-text -->
							<div class="popup-image">
								<img src="{{ asset('frontend') }}/images/banner_boxes/popup.png" alt="">
							</div><!-- /.popup-text -->
						</div><!-- /.popup -->
					</div><!-- /.col-sm-8 -->
					<div class="col-sm-2">

                    </div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.popup-newsletter --> --}}


        @include('website.layouts.partials.header')

        @yield('content')

        @include('website.layouts.partials.footer')



    </div><!-- /.boxed -->

    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/jquery.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/tether.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/waypoints.min.js"></script>


    <script>
        window.s_alert = (text="", icon="success", title="successful") => {
            Swal.fire({
                position: "top-end",
                icon,
                title,
                text,
                showConfirmButton: true,
                timer: 2000
            });
        }
    </script>
    {{-- <script type="text/javascript" src="{{ asset('frontend') }}/plugins/sweetalert2.min.js"></script> --}}
    @if (Session::has('success'))
        <script>
            
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Successful!",
                text: "{{ session('success') }}",
                showConfirmButton: true,
                timer: 3000
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "Oops...",
                text: "{{ session('error') }}",
                timer: 3000
            });
        </script>
    @endif


    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/easing.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/jquery.zoom.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/owl.carousel.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/smoothscroll.js"></script>
    {{-- <script type="text/javascript" src="javascript/jquery-ui.js"></script> --}}
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/waves.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('frontend') }}/javascript/jquery.countdown.js"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('frontend') }}/javascript/countdown.jquery.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/countdown.init.js"></script> --}}

    

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <form method="POST" id="addCart">
        @csrf
    </form>
    <form method="POST" id="addCompare">
        @csrf
    </form>

    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/ajax.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/ajax2.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/javascript/main.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('frontend') }}/javascript/custom.js"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('frontend') }}/javascript/custom2.js"></script> --}}

    @stack('js_plugin')

    {{-- <script>
        $(function() {
            $('#better-rating-form').betterRating();
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val();
                $.ajax({
                    url: "{{ route('productsearch') }}",
                    type: "GET",
                    data: { 'search': value },
                    success: function(data) {
                        console.log(data);
                        $("#product_list").html(data);
                    }
                })
            });
        });
    </script>



</body>
</html>
