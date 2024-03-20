@extends('website.layouts.app',[
    'meta' => [
        "title" => "Order Complete",
    ],
])

@section('content')

@php
    $subtotal = 0;
@endphp

<section>
    <div class="container">
        <!-- Payout Method -->

        <div class="order-success"> <i class="fa fa-check"></i>
            <br><br>
            <h3>Congratulation! Your order has been processed</h3>
            <p>Thanks for shopping from us.</p>
            {{-- <a href="#." class="btn-round">Return to Shop</a> --}}
        </div>

        <div class="container h-100">
            <div class="d-flex align-items-center justify-content-center vh-100">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <button class="btn btn-sm btn-outline-success mb-2" onclick="printdiv('print_section')">PRINT</button>
                    
                    <div id="print_section">
                        
                        <div class="card pcard-border mb-5" id="411">
                            <div class="card-header p-4 d-flex invoice-flex" >
                                <div class="">
                                    <a  href="{{ url('/') }}" title="">
                                        <img class="logo_image" src="{{ url('/'.$setting->header_logo) }}" alt="">
                                    </a>
                                </div>                                
                                <div class="">
                                    <h3 class="mb-0">Invoice no: #{{ $order->invoice_id }}</h3>
                                    Date: {{ $order->invoice_date }}
                                </div>
                            </div>
                            <div class="card-body" style="padding: 10px;" id="410">
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <h5 class="mb-3">From:</h5>
                                        <h3 class="text-dark mb-1">{{ $setting->shop_name }}</h3>
                                        <div>Email: c{{ $setting->email_1 }}</div>
                                        <div>Phone: {{ $setting->phone_number_1 }}</div>
                                    </div>
                                    <div class="col-sm-6" style="text-align: right;">
                                        <h5 class="mb-3">To:</h5>
                                        <div>
                                            <h3 class="text-dark mb-1">{{ $order_address[0]->first_name }}</h3>
                                            <div>Address: {{ $order_address[0]->address }}</div>
                                        {{-- <div>Email: {{ $order_details->order_address->email }}</div> --}}
                                            <div>Phone: {{ $order_address[0]->mobile_number }}</div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="table-responsive-sm">
                                    <table class="table table-striped ptable-bordered table-dark">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Item</th>
                                                <th class="right">Unit Price</th>
                                                <th class="center">Qty</th>
                                                <th class="right" style="text-align: right;">Total</th>
                                            </tr>
                                        </thead>
                                        {{-- @dd($order->sub_total) --}}
                                        <tbody>
                                            @foreach ($order_details as $key=>$dorder)
                                            <tr>
                                                <td class="center">{{ $key+1 }}</td>
                                                <td class="left strong">{{ $dorder->product->product_name }}</td>
                                                <td class="right">{{ $dorder->product_price }} tk</td>
                                                <td class="center">{{ $dorder->qty }}</td>
                                                <td class="right" style="text-align: right;">{{ $dorder->product_price * $dorder->qty }} tk</td>
                                                {{-- @php
                                                    $subtotal += $order->product_price * $order->qty
                                                @endphp --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- 53150 + 82800 / --}}
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6 ml-auto">
                                        <table class="table table-clear" style="white-space: nowrap;">
                                            <tbody>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Subtotal</strong>
                                                    </td>
                                                    
                                                    <td class="right" style="text-align: right;"> {{ $order->sub_total }}  tk</td>
                                                    {{-- <td class="right" style="text-align: right;">{{ 555 }} tk</td> --}}
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Delivery Charge</strong>
                                                    </td>
                                                    <td class="right" style="text-align: right;">{{ $order->total_price  - $order->sub_total }} tk</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Total</strong>
                                                    </td>
                                                    <td class="right" style="text-align: right;">
                                                        <strong class="text-dark">{{ $order->total_price }} tk</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Paid</strong>
                                                    </td>
                                                    <td class="right" style="text-align: right;">
                                                        <strong class="text-dark">
                                                            @if($order->order_payments_sum_amount == 0)
                                                                {{ 0 }} tk
                                                            @else
                                                                {{ $order->order_payments_sum_amount }} tk
                                                            @endif
                                                        </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Due</strong>
                                                    </td>
                                                    <td class="right" style="text-align: right;">
                                                        <strong class="text-dark">
                                                            {{ $order->total_price - $order->order_payments_sum_amount }} tk
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

@endsection

@push('js_plugin')
<script>
    function printdiv(elem) {
        var header_str = '<html><head><title>' + document.title  + '</title></head><body>';
        var footer_str = '</body></html>';
        var new_str = document.getElementById(elem).innerHTML;
        var old_str = document.body.innerHTML;
        document.body.innerHTML = header_str + new_str + footer_str;
        window.print();
        document.body.innerHTML = old_str;
        return false;
    }
</script>
@endpush