@extends('website.layouts.app',[
    'meta' => [
        "title" => "Products of the Category",
    ],
])

@section('content')

@dump($comp_keys, $variantKeys, $compareProducts)
<section class="flat-compare">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-compare">
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
                                            <td class="upClass add-cart">
                                                @if($c_key == "image")
                                                    
                                                <div class="d-grid">
                                                    <img class="product_image" src="{!! $compareProducts[$i][$c_key] !!}"/>
                                                    
                                                    <a href="{{ route('cart.add', $compareProducts[$i]['id']) }}" class="addtocart compare-add-to-cart" title="">
                                                        <img src="{{ asset('frontend')}}/images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                    <a href="{{ route('remove.compare.item', $compareProducts[$i]['id']) }}" class="removeItem" title="">
                                                        <img src="{{ asset('frontend') }}/images/icons/delete.png" alt="">Remove Item
                                                    </a>
                                                        
                                                    
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
