@extends('website.layouts.app',[
    'meta' => [
        "title" => "Products of the Category",
    ],
])

@section('content')

<section class="flat-breadcrumb flat-breadcrumb-modified">
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <ul class="breadcrumbs">
                    <li class="trail-item">
                        <a href="{{ url('/') }}" title="">Home</a>                        
                    </li>
                </ul><!-- /.breacrumbs -->
            </div><!-- /.col-md-12 -->

            <div class="col-md-12">
                @yield('shortDetails')
            </div>

        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-breadcrumb -->


<section class="flat-compare">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-compare">
                    <div class="title">
                        <h3>Compare</h3>
                    </div>
                    <div class="compare-content">
                        <table class="table-compare">
                            <thead>
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach ($compareProducts as $key=>$item) --}}
                            {{-- @dd($compareProducts[$i]['name']) --}}
                            <tr>
                                <th>Product</th>
                                @for ($i = 0; $i < count($compareProducts); $i++)                                
                                    <td class="product">
                                        <div class="image">
                                            <img src="{{ $compareProducts[$i]['image'] }}" alt="">
                                        </div>
                                        <div class="name">
                                            {{ $compareProducts[$i]['name'] }}
                                        </div>
                                    </td><!-- /.product -->
                                @endfor
                            </tr>
                            <tr>
                                <th>Price</th>
                                @for ($i = 0; $i < count($compareProducts); $i++)                                
                                <td class="price">
                                    <div class="regular">
                                        {{ $compareProducts[$i]['regular_price'] }}
                                    </div>
                                    <div class="sale">
                                        {{ $compareProducts[$i]['regular_price'] }}
                                    </div>                                    
                                </td>
                                @endfor
                            </tr>

                               
                            {{-- Add To Cart --}}
                            <tr>
                                <th>Add to Cart</th>
                                @for ($i = 0; $i < count($compareProducts); $i++)                                                 
                                <td class="add-cart">
                                    <div class="btn-add-cart">
                                        <a href="{{ route('cart.add', $compareProducts[$i]['id']) }}" class="addtocart" title="">
                                            <img src="{{ asset('frontend')}}/images/icons/add-cart.png" alt="">Add to Cart
                                        </a>
                                    </div>
                                </td><!-- /.add-cart -->
                                @endfor
                            </tr>


                            {{-- Short Description --}}
                            <tr>
                                <th>Description</th>
                                @for ($i = 0; $i < count($compareProducts); $i++)
                                <td class="description">
                                    <p>
                                        {!! $compareProducts[$i]['short_description'] !!}
                                    </p>
                                </td><!-- /.description -->
                                @endfor 
                            </tr>

                            {{-- Rating --}}
                            <tr>
                                <th>Rating</th>
                                @for ($i = 0; $i < count($compareProducts); $i++)
                                <td class="compare_common">
                                    <div>
                                        {{ $compareProducts[$i]['rating'] }}
                                    </div>
                                </td>
                                @endfor
                            </tr>

                            {{-- Stock --}}
                            <tr>
                                <th>Stock</th>
                                @for ($i = 0; $i < count($compareProducts); $i++)
                                <td class="compare_common">
                                    <div>
                                        {{ $compareProducts[$i]['availablity'] ? "Available" : "" }}
                                    </div>
                                </td><!-- /.stock -->
                                @endfor
                            </tr>

                            {{-- Stock --}}
                            <tr>
                                <th>Bus Speed</th>
                                @for ($i = 0; $i < count($compareProducts); $i++)
                                {{-- @dd($compareProducts[$i]['BUS Speed']) --}}
                                <td class="compare_common">
                                    <div>
                                        {{ $compareProducts[$i]['BUS Speed'] }}
                                    </div>
                                </td><!-- /.stock -->
                                @endfor
                            </tr>

                            {{-- Delete --}}
                            <tr>
                                <th>Delete</th>
                                <td class="delete">
                                    <a href="#" title="">
                                        <img src="images/icons/delete.png" alt="">
                                    </a>
                                </td><!-- /.delete -->
                                <td class="delete">
                                    <a href="#" title="">
                                        <img src="images/icons/delete.png" alt="">
                                    </a>
                                </td><!-- /.delete -->
                                <td class="delete">
                                    <a href="#" title="">
                                        <img src="images/icons/delete.png" alt="">
                                    </a>
                                </td><!-- /.delete -->
                            </tr>    
                            
                                {{-- @endforeach --}}
                            </tbody>

                        </table><!-- /.table-compare -->
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
