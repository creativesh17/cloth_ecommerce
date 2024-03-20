<footer class="footer-area footer-three-area mt-4">
    <div class="container">
        <!--== Start Footer Main ==-->
        <div class="footer-main py-5">
            <div class="row mb-n6">
                <div class="col-md-6 col-lg-3 mb-6">
                    <div class="widget-item">
                        <div class="text-center text-sm-left text-sm-start">
                            <a class="widget-logo" href="/">
                                <img src="/{{$setting->footer_logo}}" alt="Logo" width="" height="60">
                            </a>
                        </div>
                        <br>
                        <br>
                        <div class="widget-contact widget-contact-two">
                            <p class="widget-contact-desc mt-2 text-center text-sm-left text-sm-start">
                                {{ $setting->footer_short_description }}
                                @for ($i = 1; $i <= 3; $i++)
                                    @php
                                        $key = "email_".$i;
                                    @endphp
                                    @if ($setting->$key)
                                        <a href="mailto://{{$setting->$key}}">{{$setting->$key}}</a>
                                    @endif
                                @endfor
                            </p>
                            <br>
                            <div class="widget-info-item mb-6  d-flex justify-center align-items-center gap-2">
                                <img src="{{ asset('contents/frontend') }}/assets/images/icons/pin.png" class="d-none d-sm-block" alt="Icon">
                                <p class="text-center text-sm-left text-sm-start">
                                    {{ $setting->address }}
                                </p>
                            </div>
                            <br>
                            <div class="widget-info-item d-flex justify-content-center align-items-center gap-2">
                                <img src="{{ asset('contents/frontend') }}/assets/images/icons/mobile.png" class="d-none d-sm-block" alt="Icon">
                                <div class="info-item-call text-center text-sm-left text-sm-start">
                                    @for ($i = 1; $i <= 3; $i++)
                                        @php
                                            $key = "phone_number_".$i;
                                        @endphp
                                        @if ($setting->$key)
                                            <a href="tel://{{ $setting->$key }}" class="m-1">
                                                {{ $setting->$key }}
                                            </a>
                                        @endif
                                    @endfor

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 offset-lg-1 mb-6">
                    <div class="widget-item">
                        <h4 class="widget-title text-center text-sm-start">Information</h4>
                        <div >
                            <ul class="widget-nav d-flex flex-wrap d-sm-block justify-content-center gap-2">
                                <li><a href="{{ route('about_us') }}">About us</a></li>
                                <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('terms_and_condition') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('refund_policy') }}">Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 offset-lg-1 ps-xl-4 mb-6">
                    <div class="widget-item">
                        <h4 class="widget-title text-center text-sm-start">Account</h4>
                        <div >
                            <ul class="widget-nav d-flex flex-wrap d-sm-block justify-content-center gap-2">
                                <li><a href="{{ route('frontend.profile') }}">My account</a></li>
                                <li><a href="{{ route('frontend.orders') }}">My orders</a></li>
                                {{-- <li><a href="{{ route('frontend.reviews') }}">My Reviews</a></li> --}}
                                <li><a href="{{ route('frontend.address') }}">Shipping Address</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 offset-lg-1 ps-xl-0 mb-6">
                    <div class="widget-item">
                        <h4 class="widget-title text-center text-sm-start">Store</h4>
                        <div >
                            <ul class="widget-nav d-flex flex-wrap d-sm-block justify-content-center gap-2">
                                <li><a href="/offers">Discount</a></li>
                                <li><a href="/gallery">Latest Offers</a></li>
                                <li><a href="/contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== End Footer Main ==-->

        <!--== Start Footer Bottom ==-->
        <div class="footer-bottom pb-2">
            <p class="copyright">
                © {{ now()->year }} Ctgcomputer. Made with
                <i class="fa fa-heart"></i> by
                <a target="_blank" href="https://techparkit.org/">TechPark It</a>
            </p>
            <a href="#">
                {{-- <img src="{{ asset('contents/frontend') }}/assets/images/shop/payment.png" alt="Image-techparkIt"> --}}
            </a>
        </div>
        <!--== End Footer Bottom ==-->
    </div>
</footer>
