@extends('website.layouts.app',[
    'meta' => [
        "title" => "Customer Dashboard",
    ],
])
@section('content')

<div>
    {{-- Be like water. --}}
    <div class="account-area section-space">
        <div class="container ">
            <div class="myaccount-page-wrapper ">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        @include('website.pages.sidemenu')
                    </div>

                    <div class="col-lg-9 col-md-6">
                        <section class="flat-iconbox style4">
                            <div class="container">
                                <div class="row">
                        
                                    <div class="col-lg-3 col-md-6">
                                        <div class="iconbox style2">
                                            <div class="box-header">
                                                <div class="image">
                                                    <img src="{{ asset('frontend') }}/images/icons/order.png" alt="Total Orders" width="21" height="19">
                                                </div>
                                                <div class="title">
                                                    <h3><strong style="color: var(--brand);">My Orders</strong></h3>
                                                </div>
                                                <div class="">
                                                    <p class="mt-4 dashboard-card-number">
                                                        <strong>{{ $totalOrders }}</strong>
                                                    </p>
                                                </div><!-- /.box-content -->
                                            </div><!-- /.box-header -->
                                            
                                        </div><!-- /.iconbox style2 -->
                                    </div><!-- /.col-md-6 col-lg-3 -->


                                    <div class="col-lg-3 col-md-6">
                                        <div class="iconbox style2">
                                            <div class="box-header">
                                                <div class="image">
                                                    <img src="{{ asset('frontend') }}/images/icons/wishlist.png" alt="Total Wishlist">
                                                </div>
                                                <div class="title">
                                                    <h3><strong style="color: var(--brand);">My Wishlist</strong></h3>
                                                </div>
                                                <div class="">
                                                    <p class="mt-4 dashboard-card-number">
                                                        <strong>{{ $totalWishlist }}</strong>
                                                    </p>
                                                </div><!-- /.box-content -->
                                            </div><!-- /.box-header -->
                                        </div><!-- /.iconbox style2 -->
                                    </div><!-- /.col-md-6 col-lg-3 -->
                        
                        
                                    <div class="col-md-6 col-lg-3">
                                        <div class="iconbox style2">
                                            <div class="box-header">
                                                <div class="image">
                                                    <img src="{{ asset('frontend') }}/images/icons/share.png" alt="Total Reviews" width="21" height="19">
                                                </div>
                                                <div class="title">
                                                    <h3><strong style="color: var(--brand);">My Reviews</strong></h3>
                                                </div>
                                                <div class="">
                                                    <p class="mt-4 dashboard-card-number">
                                                        <strong>{{ $totalReviews }}</strong>
                                                    </p>
                                                </div><!-- /.box-content -->
                                            </div><!-- /.box-header -->
                                        </div><!-- /.iconbox style2 -->
                                    </div><!-- /.col-md-6 col-lg-3 -->

                                    <div class="col-md-6 col-lg-3">
                                        <div class="iconbox style2">
                                            <div class="box-header">
                                                <div class="image">
                                                    <img src="{{ asset('frontend') }}/images/icons/payment.png" alt="Total Reviews" width="21" height="19">
                                                </div>
                                                <div class="title ">
                                                    <h3><strong style="color: var(--brand);">My Payments</strong></h3>
                                                </div>
                                                <div class="">
                                                    <p class="mt-4 dashboard-card-number">
                                                        <strong>{{ $totalPayments }}</strong>
                                                    </p>
                                                </div><!-- /.box-content -->
                                            </div><!-- /.box-header -->
                                            
                                        </div><!-- /.iconbox style2 -->
                                    </div><!-- /.col-md-6 col-lg-3 -->
                        
                    

                                </div><!-- /.row -->
                            </div><!-- /.container -->
                        </section><!-- /.flat-iconbox style4 -->
                    </div>
                </div>

               
                

                <div class="d-flex justify-content-end">

                </div>

            </div>
        </div>
    </div>
</div>


@endsection

@push('js_plugin')

@endpush