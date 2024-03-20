@php
    $discount = 0;
    $total = 0;
@endphp
@foreach(Cart::content() as $product)
<tr>
    <td>
        <div class="media">
            <div class="d-flex">
            <img width="80" src="{{asset('storage/products/'.$product->options->image)}}"
                alt=""
            />
            </div>
            <div class="media-body">
            <p>{{ $product->name }}</p>
            </div>
        </div>
    </td>
    <td>
        <h5>{{ $product->price }}</h5>
    </td>
    <td>
        <div class="product_count">
        <input type="text" name="qty" id="sst{{$product->id}}" maxlength="12" value="{{ $product->qty }}" title="Quantity:" class="input-text qty"/>
            
            <button data-rowid="{{ $product->rowId }}" 
            onclick="var result = document.getElementById('sst{{$product->id}}'); 
                    var sst = result.value; 
                    if( !isNaN( sst ) &amp;&amp; sst < 12 ) result.value++;	
                    return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i>
            </button>
            <button data-rowid="{{ $product->rowId }}" 
            onclick="var result = document.getElementById('sst{{$product->id}}'); 
                    var sst = result.value; 
                    if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;	
                    return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i>
            </button>
        </div>
    </td>
    <td>
        <h5>{{ $product->options->color }}</h5>
    </td>
    <td>
        <h5>{{ $product->options->discount }}%</h5>
    </td>
    <td>
        <h5>{{ ($product->price * $product->qty) - ($product->price * $product->qty/100)*($product->options->discount) }}</h5>
    </td>
    <td>
        <button data-rowid="{{ $product->rowId }}" data-url="cart/remove" class="btn btn-danger btn-remove"><i class="fa fa-times"></i></button>
    </td>
</tr>
@php
    $discount += ($product->price * $product->qty/100)*($product->options->discount);
    $total += ($product->price * $product->qty) - ($product->price * $product->qty/100)*($product->options->discount);
@endphp
@endforeach
<tr>
    <td scope="col"></td> 
    <td scope="col"></td>
    <td scope="col">Total Qty: {{ Cart::count() }}</td>
    <td scope="col"></td>
    <td scope="col">Discount: {{ $discount }} (TK)</td>
    <td scope="col">Total: {{ $total }}</td>
    <td></td>
</tr>