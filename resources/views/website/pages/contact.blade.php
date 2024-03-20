@extends('website.layouts.app',[
    'meta' => [
        "title" => "Contact Us",
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


<section class="flat-iconbox style4">
    <div class="container">
        <div class="row">


            <div class="col-md-6 col-lg-3">
                <div class="iconbox style2">
                    <div class="box-header">
                        <div class="image">
                            <img src="{{ asset('frontend') }}/images/icons/address.png" alt="">
                        </div>
                        <div class="title">
                            <h3>Address</h3>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-content">
                        <p>
                            {{ $setting->address }}
                        </p>
                    </div><!-- /.box-content -->
                </div><!-- /.iconbox style2 -->
            </div><!-- /.col-md-6 col-lg-3 -->


            <div class="col-md-6 col-lg-3">
                <div class="iconbox style2">
                    <div class="box-header">
                        <div class="image">
                            <img src="{{ asset('frontend') }}/images/icons/phone.png" alt="">
                        </div>
                        <div class="title">
                            <h3>Phone</h3>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-content">
                        <p>
                            {{ $setting->phone_number_1 }}
                        </p>
                        <p>
                            {{ $setting->phone_number_2 }}
                        </p>
                    </div><!-- /.box-content -->
                </div><!-- /.iconbox style2 -->
            </div><!-- /.col-md-6 col-lg-3 -->


            <div class="col-md-6 col-lg-3">
                <div class="iconbox style2">
                    <div class="box-header">
                        <div class="image">
                            <img src="{{ asset('frontend') }}/images/icons/mail-2.png" alt="">
                        </div>
                        <div class="title">
                            <h3>Email</h3>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-content">
                        <p>
                            {{ $setting->email_1 }}
                        </p>
                        <p>
                            {{ $setting->email_2 }}
                        </p>
                    </div><!-- /.box-content -->
                </div><!-- /.iconbox style2 -->
            </div><!-- /.col-md-6 col-lg-3 -->


            <div class="col-md-6 col-lg-3">
                <div class="iconbox style2">
                    <div class="box-header">
                        <div class="image">
                            <img src="{{ asset('frontend') }}/images/icons/share.png" alt="">
                        </div>
                        <div class="title">
                            <h3>Follow Us</h3>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-content">
                        <ul class="social-list style2">
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
                                    {{-- <i class="fa fa-pinterest" aria-hidden="true"></i> --}}
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.box-content -->
                </div><!-- /.iconbox style2 -->
            </div><!-- /.col-md-6 col-lg-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-iconbox style4 -->

<section class="flat-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="form-contact center">
                    <div class="form-contact-header">
                        <h3>Leave us a Message</h3>
                        <p style="margin: 10px; padding: 10px;">

                        </p>
                    </div><!-- /.form-contact-header -->
                    <div class="form-contact-content">
                        <form action="{{ route('contact.store') }}" method="POST" id="" >
                            @csrf
                            <div class="form-box one-half name-contact{{ $errors->has('full_name') ? ' has-error' : '' }}">
                                <label class="float-left p-2 m-1" for="full_name"><strong>Full Name *</strong></label>
                                <input type="text" id="full_name" name="full_name" placeholder="Ali">
                                @if ($errors->has('full_name'))
                                    <span class="invalid-feedback">
                                        <b>{{ $errors->first('full_name') }}</b>
                                    </span>
                                @endif
                            </div>
                            <div class="form-box{{ $errors->has('subject') ? ' has-error' : '' }}">
                                <label class="float-left p-2 m-1" for="subject-contact"><strong>Subject *</strong></label>
                                <input type="text" id="subject" name="subject" placeholder="Ali">
                                @if ($errors->has('subject'))
                                    <span class="invalid-feedback">
                                        <b>{{ $errors->first('subject') }}</b>
                                    </span>
                                @endif
                            </div>
                            <div class="form-box {{ $errors->has('message') ? ' has-error' : '' }}">
                                <label class="float-left p-2 m-1" for="message"><strong>Message *</strong></label>
                                <textarea id="message" name="message"></textarea>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback">
                                        <b>{{ $errors->first('message') }}</b>
                                    </span>
                                @endif
                            </div>
                            <div class="form-box">
                                <button type="submit" class="contact btn btn-success p-2 mt-3">Send Message</button>
                            </div>
                        </form>



                    </div><!-- /.form-contact-content -->
                </div><!-- /.form-contact center -->
            </div><!-- /.col-lg-8 col-md-12 -->
            <div class="col-lg-2">
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-contact -->

@endsection

