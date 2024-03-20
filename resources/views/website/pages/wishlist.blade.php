@extends('website.layouts.app', [
    'meta' => [
        'title' => 'Wishlist',
    ],
])

@section('content')

    @include('website.layouts.partials.breadcrumb')

    <section class="flat-shop-cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @include('website.pages.sidemenu')
                </div>
                <div class="col-lg-9 col-sm-12 col-md-6 mt-3 table-responsive-sm">
                    <table class="table table-borderd">
                        <thead>
                            <tr>
                                <th class="wishlist_1" style="width:25%;">Product</th>
                                <th class="wishlist_1" style="width:25%;">Price</th>
                                <th class="wishlist_1" style="width:25%;">Cart</th>
                                <th class="wishlist_1" style="width:25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($wishlists) --}}
                            @foreach ($wishlists as $key=>$wishlist)
                                {{-- @dd($wishlist->product->product_name) --}}
                                <input type="hidden" name="wishlist[{{ $key }}][id]"
                                    value="{{ $wishlist->id }}">
                                <tr>
                                    <td class="td_element" style="width:10%;">
                                        <div class="name-wishlist">
                                            {{ $wishlist->product->product_name }}
                                        </div>
                                    </td>
                                    <td class="td_element" style="width:25%;">
                                        <div class="price">
                                            {{ $wishlist->product->sales_price }} ৳
                                        </div>
                                        <div class="clearfix"></div>
                                    </td>
                                    <td class="td_element" style="width:10%;">
                                        <div class="btn-add-wishlist">
                                            <a href="{{ route('cart.add', $wishlist->product->id) }}" class="addtocart" title="">
                                                <img src="{{ asset('frontend')}}/images/icons/add-cart.png" alt="" style>Add to Cart
                                            </a>
                                        </div>
                                    </td>
                                    <td class="td_element" style="width:30%;">
                                        <div class="td_element_div">
                                            <a href="{{ route('wishlist.remove',$wishlist->product->id) }}" title="">
                                            <img src="{{ asset('frontend') }}/images/icons/delete.png"
                                                alt="" class="mCS_img_loaded wishlist_delete">
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>




    <section class="flat-row flat-iconbox style3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/images/icons/car.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Worldwide Shipping</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/images/icons/order.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Order Online Service</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/images/icons/payment.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Payment</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/images/icons/return.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Return 30 Days</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-iconbox -->

    <form method="POST" id="addCart">
        @csrf
    </form>

@endsection

@push('js_plugin')
<script>
// $(function() {
//     $(document).on('click', '.addtocart', function(e) {
//         e.preventDefault();

//         var url = $(this).attr('href');
//         // alert(url);
//         $('#addCart').attr('action', url).submit();

//     });
// });
</script>
@endpush
