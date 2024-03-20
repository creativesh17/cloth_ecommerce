@extends('website.layouts.app',[
    'meta' => [
        "title" => "Order",
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
                        <span>order complete</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="bg-bt-gray p-tb-15 my-5 print_body">
        <div class="container">
            <div class="content ws-box p-15">
                <div>
                    {{-- The best athlete wants his opponent at his best. --}}
                    <style>
                        .checkmark {
                            color: #9ABC66;
                            font-size: 100px;
                            line-height: 200px;
                            margin-left: -15px;
                        }
                        .success_msg {
                            color: #88B04B;
                            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                            font-weight: 900;
                            font-size: 40px;
                            margin-bottom: 10px;
                        }
                        .gif_load {
                            height: 150px;
                            max-width: 150px;
                        }
                    </style>
                    <div class="page-not-found-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9 m-auto">
                                    <div class="error-content text-center">
                                        <img src="{{ asset('contents/frontend/assets/images/verified.gif') }}" class="gif_load" alt="">
                                        {{-- <div class="mb-4" style="border-radius: 200px; height: 200px; width: 200px; background: #f8faf5; margin: 0 auto;">
                                            <i class="checkmark">✓</i>
                                        </div>       --}}
                                        <h4 class="success_msg"><b>Success</b></h4>
                                        <h5 class="text-primary"><b>Your order has been received</b></h5>
                                        <h5 class="text-center">Order details</h5>
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order details</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row"><span class="fs-5">Name: </span></th>
                                                <td>
                                                    <span class="fs-5">
                                                        {{ $order->order_address->first_name ?? '' }}
                                                        {{ $order->order_address->last_name ?? ''}}
                                                    </span>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row"><span class="fs-5">Mobile Number</span></th>
                                                <td>
                                                    <span class="fs-5">{{ $order->order_address->mobile_number }}</span>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row"><span class="fs-5">Order Id</span></th>
                                                <td>
                                                    <span class="fs-5">{{  $order->invoice_id  }}</span>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row"><span class="fs-5">Order date</span></th>
                                                <td>
                                                    <span class="fs-5">{{ $order->created_at  }}</span>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        <p><b>Please remember your Order Id. and call <a href="tel://+8801733-080350"> 01733-080350 </a> for any queries.</b></p>
                                        <p>Thank you for shopping with us. we'll be in touch shortly!</p>

                                        <div class="my-2 no_print">
                                            <a class="btn btn-info" href="{{ route('download_invoice',$order->invoice_id) }}">Download Invoice</a>
                                        </div>
                                        <div class="no_print">
                                            <a class="btn btn-primary" href="{{ url('') }}">Back to Shopping</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<script>
    location.href = `{{ route('download_invoice',$order->invoice_id) }}`;
</script>
@endsection
