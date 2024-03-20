@extends('website.layouts.app',[
    'meta' => [
        "title" => "products cart",
    ],
])
@section('content')
<main class="main-content">
    <section class="bread_cumb_section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/"><i class="fa fa-home" title="Home"></i></a>
                </li>
                <li >
                    <a href="#">
                        <span>cart</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!--== Start Contact Area Wrapper ==-->
    <div class="contact-area section-top-space my-4">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="contact-wrp" data-bg-img="{{ asset('contents/frontend') }}/assets/images/photos/bg4.png" style="background-image: url('{{ asset('contents/frontend') }}/assets/images/photos/bg4.png');">
                        <div class="row">
                            <div class="col-lg-5 col-xl-4">
                                <div class="contact-info-area">
                                    <h3 class="contact-info-area-title text-black">Contact Info</h3>

                                    <!--== Start Contact Info Item ==-->
                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <img src="{{ asset('contents/frontend') }}/assets/images/icons/pin2.png" alt="Icon" />
                                        </div>
                                        <div class="contact-info-content">
                                            <h4 class="contact-info-title mb-2 mt-n1">Head Office</h4>
                                            <p>Computer City Centre (Multiplan), Level: 4, Shop: 407-409, 69-71 <span>New Elephant Road</span></p>
                                        </div>
                                    </div>
                                    <!--== End Contact Info Item ==-->

                                    <!--== Start Contact Info Item ==-->
                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <img src="{{ asset('contents/frontend') }}/assets/images/icons/call.png" alt="Icon" />
                                        </div>
                                        <div class="contact-info-content">
                                            <h4 class="contact-info-title mb-2 mt-n1">Phone</h4>
                                            <a href="tel://+8801733080350 ">+880 1733-080350</a>
                                        </div>
                                    </div>
                                    <!--== End Contact Info Item ==-->

                                    <!--== Start Contact Info Item ==-->
                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <img src="{{ asset('contents/frontend') }}/assets/images/icons/email.png" alt="Icon" />
                                        </div>
                                        <div class="contact-info-content">
                                            <h4 class="contact-info-title mt-n1">Email</h4>
                                            <a href="mailto://ctgcomputercentre2008@gmail.com" style="font-size: 14px;">
                                                ctgcomputercentre2008@gmail.com
                                            </a>
                                        </div>
                                    </div>
                                    <!--== End Contact Info Item ==-->
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-7 col-xl-8">
                                <div class="contact-form-area">
                                    <h3 class="contact-form-title text-black">Get In Touch</h3>
                                    <!--== Start Contact Form ==-->
                                    <form class="contact-form" method="POST">
                                        @if (session()->has('success'))
                                            <div class="text-success my-5">{{session()->get('success')}}</div>
                                        @endif
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-input-item d-flex gap-2 my-2 align-items-center">
                                                    <i class="icon fa fa-user"></i>
                                                    <input class="form-control" type="text" wire:model="name" name="full_name" id="name" placeholder="Your Name" />
                                                </div>
                                                @error('full_name') <div class="error text-danger">{{ $message }}</div> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-input-item my-2 d-flex gap-2 align-items-center">
                                                    <i class="icon fa fa-envelope"></i>
                                                    <input class="form-control" type="email" wire:model="email" name="email" id="mail" placeholder="Enter Your Mail" />
                                                </div>
                                                @error('email') <div class="error text-danger">{{ $message }}</d> @enderror
                                            </div>
                                        </div>
                                        <div class="form-input-item d-flex gap-2 my-2 align-items-center">
                                            <i class="icon fa fa-phone-square"></i>
                                            <input class="form-control" type="text" value="{{request()->subject}}" name="subject" id="subject" placeholder="Your Subject" />
                                        </div>
                                        @error('subject') <div class="error text-danger">{{ $message }}</div> @enderror
                                        <div class="form-input-item my-2">
                                            <textarea class="form-control" wire:model="message" name="message" id="message" placeholder="Your Message"></textarea>
                                        </div>
                                        @error('message') <div class="error text-danger">{{ $message }}</div> @enderror
                                        <button class="btn btn-primary btn-submit mt-2" type="submit">
                                            Submit Now
                                            <i class="icon fa fa-arrow-right"></i>
                                        </button>
                                    </form>
                                    <!--== End Contact Form ==-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Contact Area Wrapper ==-->

    <!--== Start Map Area Wrapper ==-->
    <div class="container">
        <div class="map-area mb-n2">
            <iframe style="width: 100%; height: 250px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14608.957345960143!2d90.3855965!3d23.7388432!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x12b9ec0f1c8e7b03!2sMultiplan%20Center!5e0!3m2!1sen!2sbd!4v1674985390341!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!--== End Map Area Wrapper ==-->
    </div>

</main>
@endsection
