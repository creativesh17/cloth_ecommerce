@php
    $findByCategories = \App\Models\Category::where('is_top_category', 1)->limit(7)->orderBy("id","asc")->get();
@endphp
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="widget-ft widget-about">
                    <div class="logo logo-ft">
                        <a href="{{ url('/') }}" title="">
                            <img src="{{ $setting->footer_logo }}" alt="">
                        </a>
                    </div><!-- /.logo-ft -->
                    <div class="widget-content">
                        <div class="icon">
                            <img src="{{ asset('frontend') }}/images/icons/call.png" alt="">
                        </div>
                        <div class="info">
                            <p class="questions">Got Questions ? Call us 24/7!</p>
                            <p class="phone">
                                Call Us:
                                @php
                                    $numbers = ['', 'phone_number_1', 'phone_number_2'];
                                    $setting_first = collect($setting)
                                        ->filter(function ($i, $key) use ($numbers) {
                                            return array_search($key, $numbers);
                                        })
                                        ->all();
                                @endphp
                                @foreach ($numbers as $number)
                                    @isset($setting_first[$number])
                                        {{-- <li>
                                            <a href="tel:{{ $setting_first[$number] }}" class="call_numbers">
                                            </a>
                                        </li> --}}
                                        <a href="tel:{{ $setting_first[$number] }}" class="call_numbers"
                                            style="font-size: 18px;">
                                            {{ $setting_first[$number] }}
                                        </a>

                                        @if (count($numbers) != null)
                                        @break;
                                    @endif
                                @endisset
                            @endforeach
                        </p>
                        <p class="address">
                            {{ $setting->address }}
                        </p>
                    </div>
                </div><!-- /.widget-content -->
                <ul class="social-list">
                    <li>
                        <a href="{{ $setting->social_facebook }}" title="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $setting->social_twitter }}" title="">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $setting->social_instragram }}" title="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $setting->social_linkedin }}" title="">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul><!-- /.social-list -->
            </div><!-- /.widget-about -->
        </div><!-- /.col-lg-3 col-md-6 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget-ft widget-categories-ft">
                <div class="widget-title">
                    <h3>Find By Categories</h3>
                </div>
                <ul class="cat-list-ft">
                    @foreach ($findByCategories as $cate)
                        <li>                            
                            <a href="{{ route('category_product', $cate->slug) }}" title="">
                                {{ $cate->name }}
                            </a>
                        </li>
                    @endforeach
                </ul><!-- /.cat-list-ft -->
            </div><!-- /.widget-categories-ft -->
        </div><!-- /.col-lg-3 col-md-6 -->
        <div class="col-lg-2 col-md-6">
            <div class="widget-ft widget-menu">
                <div class="widget-title">
                    <h3>Customer Care</h3>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('contact') }}" title="">
                            Contact us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sitemap') }}" title="">
                            Site Map
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile') }}" title="">
                            My Account
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wishlist') }}" title="">
                            Wish List
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about_us') }}" title="">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('privacy.policy') }}" title="">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}" title="">
                            Terms & Conditions
                        </a>
                    </li>
                </ul>
            </div><!-- /.widget-menu -->
        </div><!-- /.col-lg-2 col-md-6 -->
        <div class="col-lg-4 col-md-6">
            <div class="widget-ft widget-newsletter">
                <div class="widget-title">
                    <h3>Sign Up To New Letter</h3>
                </div>
                <p>Make sure that you never miss our interesting <br />
                    news by joining our newsletter program
                </p>
                <form action="{{ url('/newsletter') }}" class="subscribe-form" method="POST">
                    @csrf
                    <div class="subscribe-content{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" name="email" class="subscribe-email" placeholder="Your E-Mail">
                        <button type="submit">
                            <img src="{{ asset('frontend') }}/images/icons/right-2.png" alt="newsletter">
                        </button>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <b>{{ $errors->first('email') }}</b>
                            </span>
                        @endif
                    </div>
                </form><!-- /.subscribe-form -->
                <ul class="pay-list">
                    <li>
                        <a href="#" title="">
                            <img src="{{ asset('frontend') }}/images/logos/ft-01.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#" title="">
                            <img src="{{ asset('frontend') }}/images/logos/ft-02.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#" title="">
                            <img src="{{ asset('frontend') }}/images/logos/ft-03.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#" title="">
                            <img src="{{ asset('frontend') }}/images/logos/ft-04.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#" title="">
                            <img src="{{ asset('frontend') }}/images/logos/ft-05.png" alt="">
                        </a>
                    </li>
                </ul><!-- /.pay-list -->
            </div><!-- /.widget-newsletter -->
        </div><!-- /.col-lg-4 col-md-6 -->
    </div><!-- /.row -->

</div><!-- /.container -->
</footer><!-- /footer -->

<section class="footer-bottom p-0">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            {{-- <p class="copyright"> All Rights Reserved © Techno Store 2017</p> --}}
            {{-- @dd($setting->terms_condition) --}}
            <p class="copyright mb-0"> {{ $setting->copyright }}</p>
        </div>
        <div class="col-md-6">
            {{-- <p>
                Developed and Maintained by <a href="">Tech Park It Limited</a>
            </p> --}}
            <p class="text-right mb-0 pt-1">
                Developed and Maintained by <a href="https://techparkit.org" class="text-danger">Tech Park It Solution</a>
            </p>

            <p class="btn-scroll">
                <a href="#" title="">
                    <img src="{{ asset('frontend') }}/images/icons/top.png" class="mb-0" alt="">
                </a>
            </p>
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
</div><!-- /.container -->
</section><!-- /.footer-bottom -->



@push('js_plugin')

@endpush 