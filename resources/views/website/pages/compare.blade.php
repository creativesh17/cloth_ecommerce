@extends('website.layouts.app',[
    'meta' => [
        "title" => "Products of the Category",
    ],
])

@section('content')

{{-- @dump($comp_keys, $variantKeys, $compareProducts) --}}
{{-- @dump($comp_keys,$variantKeys, $compareProducts) --}}
{{-- @dd($compareProducts) --}}
<section class="flat-compare">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-compare">

                    @if(count($compareProducts))
                    <div class="title d-flex">
                        <h3>Compare</h3>
                        <a href="{{ route('clear.compare') }}" class="btn btn-danger">Clear All</a>
                    </div>
                    <div class="compare-content my-compare-content">
                        <table class="table table_comp text-center table-bordered ">
                            <tbody>
                                @foreach ($comp_keys as $c_key)
                                    <tr>
                                        <td  class="upClass">
                                            @if($c_key == "image") 
                                                ''
                                            @else
                                            {{ $c_key }}
                                            @endif
                                        </td>
                                        @for ($i = 0; $i < count($compareProducts); $i++)
                                            {{-- <td class="upClass add-cart"> --}}
                                            <td class="upClass add-cart"">
                                                @if($c_key == "image")                                                    
                                                <div class="d-grid">
                                                    <img class="product_image" src="{!! $compareProducts[$i][$c_key] !!}"/>
                                                    
                                                    {{-- <a href="{{ route('cart.add', $compareProducts[$i]['id']) }}" class="addtocart compare-add-to-cart" title="">
                                                        <img src="{{ asset('frontend')}}/images/icons/add-cart.png" alt="">Add to Cart
                                                    </a> --}}
                                                    {{-- <a href="{{ route('remove.compare.item', $compareProducts[$i]['id']) }}" class="removeItem" title="">
                                                        <img src="{{ asset('frontend') }}/images/icons/delete.png" alt="">Remove Item
                                                    </a> --}}
                                                </div>
                                                <div>
                                                    <div class="btn-add-cart compare-add-to-cart">
                                                        <a href="{{ route('cart.add', $compareProducts[$i]['id']) }}" class="addtocart" title="">Add to Cart
                                                            {{-- <img src="{{ asset('frontend')}}/images/icons/add-cart.png" alt="" style="margin-right: 2px;">Add to Cart --}}
                                                        </a>
                                                        <a href="{{ route('remove.compare.item', $compareProducts[$i]['id']) }}" class="removeItem" title="">Remove Item
                                                            {{-- <img src="{{ asset('frontend') }}/images/icons/delete.png" alt="">Remove Item --}}
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                                        
                                                @else
                                                    {!! $compareProducts[$i][$c_key] !!}
                                                @endif
                                            </td>
                                        @endfor                                         
                                    </tr>
                                @endforeach
                                @foreach ($variantKeys as $cm_key)
                                    <tr>
                                        <td class="upClass"> {{ explode("_",$cm_key)[0] }}</td>
                                        @for ($i = 0; $i < count($compareProducts); $i++)
                                            <td class="upClass">
                                                {!! $compareProducts[$i][explode("_",$cm_key)[0]] !!}
                                            </td>
                                        @endfor 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                            
                       






                        
                    </div><!-- /.compare-content -->
                    @else
                    <div class="d-flex justify-content-center" style="font-size: 14px; font-weight: 700">
                        <p>No products to compare</p><br><br>
                    </div>
                    <div class="d-flex justify-content-center" style="font-size: 14px; font-weight: 700">
                        <a href="{{ route('home') }}">Add some products to compare</a>
                    </div>
                    
                    @endif

                </div><!-- /.wrap-compare -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-compare -->

@endsection

@push('js_plugin')
<script>

</script>
@endpush
