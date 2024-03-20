<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pc Builder</title>
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
            /* text-align: center; */
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
        .nowrap{
            white-space: nowrap;
        }
        .left{
            text-align: left;
        }
    </style>
</head>

<body>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td style="border: 0; text-align: left;">
                    <a class="pt-2 d-inline-block" href="https://ctgcomputer.com">
                        https://ctgcomputer.com
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td style="border: 0;text-align: left;">
                    <b>PC Builder</b> <br>
                    <b>Ctgcomputer</b> <br>
                    <div>Computer City Centre (Multiplan), Level: 4,</div>
                    <div>407-409, 69-71 New Elephant Road, Dhaka</div>
                    <div>ctgcomputercentre2008@gmail.com</div>
                    <div>01733-080350</div>
                </td>
                <td style="text-align: right; border: 0;">

                </td>
            </tr>
        </tbody>
    </table>
    {{-- <button class="btn btn-sm btn-outline-success mb-2" onclick="window.print()">print</button> --}}
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="center">Component</th>
                    <th>Item</th>
                    <th class="right">Price</th>
                </tr>
            </thead>
            <tbody id="components">

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right;">Total</td>
                    <td style="text-align: right;" id="total_price"></td>
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

    <script>
        let pc_builder = localStorage.getItem('pc_builder');
        let components = document.getElementById('components');
        let total_price = document.getElementById('total_price');
        if(pc_builder){
            pc_builder = JSON.parse(pc_builder);
            let total = 0;
            for (const key in pc_builder) {
                if (Object.hasOwnProperty.call(pc_builder, key)) {
                    const element = pc_builder[key];
                    let el_len = Object.keys(element).length;
                    if(el_len){
                        total += +element.active_price;
                        components.innerHTML += `
                            <tr>
                                <td class="left">${key}</td>
                                <td class="left strong">${element.product_name}</td>
                                <td class="nowrap">${element.active_price} tk</td>
                            </tr>
                        `;
                    }
                }
            }
            total_price.innerHTML = total +' tk'
        }
        window.print();
    </script>
</body>

</html>
