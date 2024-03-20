<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Invoice of order</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            vertical-align: top;
            font-size: 16px;
            line-height: 26px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td:first-child,
        th:first-child,
        td:nth-child(n+3),
        th:nth-child(n+3){
            text-align: center;
        }
        th:last-child,
        td:last-child{
            text-align: right;
        }
        body{
            font-family: sans-serif;
        }
        .mb-1{
            margin-bottom: 5px;
        }
        .w-50{
            width: 50%;
        }
        .text-right: {
            text-align: right;
        }
        .float-left{
            float: left;
        }
        .float-right{
            float: right;
        }
        .clear{
            clear: both;
        }
    </style>
</head>

<body>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td style="border: 0; text-align: left;">
                    <a class="pt-2 d-inline-block" href="https://ctgcomputer.com">
                        Ctgcomputer.com
                    </a>
                    <div class="">
                        <b class="mb-1">
                            Invoice no: #{{ $order->invoice_id }}
                        </b> <br>
                        Date: {{ $order->invoice_date }}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td style="border: 0;text-align: left;">
                    <b>From:</b> <br>
                    <b>Ctgcomputer</b> <br>
                    <div>Computer City Centre (Multiplan), Level: 4,</div>
                    <div>407-409, 69-71 New Elephant Road, Dhaka</div>
                    <div>ctgcomputercentre2008@gmail.com</div>
                    <div>01733-080350</div>
                </td>
                <td style="text-align: right; border: 0;">
                    <b>To:</b> <br>
                    <b>
                        {{ $order->order_address->first_name }}
                    </b>
                    @if ($order->order_address->email)
                    <div>{{ $order->order_address->email }}</div>
                    @endif
                    <div>{{ $order->order_address->mobile_number }}</div>
                    <div>{{ $order->order_address->address }}</div>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- <button class="btn btn-sm btn-outline-success mb-2" onclick="window.print()">print</button> --}}
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="center">#</th>
                    <th>Item</th>
                    <th class="right">Price</th>
                    <th class="center">Qty</th>
                    <th class="right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->order_details as $key => $order_product)
                <tr>
                    <td class="center">{{ $key+1 }}</td>
                    <td class="left strong">{{ $order_product->product->product_name }}</td>
                    <td class="right">{{ $order_product->product_price }} tk</td>
                    <td class="center">{{ $order_product->qty }}</td>
                    <td class="right">{{ $order_product->product_price * $order_product->qty }} tk</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right;">Subtotal</td>
                    <td style="text-align: right;">{{ $order->sub_total }} tk</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;">Charge</td>
                    <td style="text-align: right;">{{ $order->total_price - $order->sub_total }} tk</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;">Total</td>
                    <td style="text-align: right;">{{ $order->total_price }} tk</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div>
        <br>
        <br>
        Please remember your Order Id. and call 01733-080350 for any queries.
        <br>
        Thank you for shopping with us. we'll be in touch shortly!
    </div>
</body>

</html>
