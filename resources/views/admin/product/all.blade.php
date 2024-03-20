@extends('layouts.admin')
@section('title', 'Products')

@push('css')

@endpush
@section('content')
@component('layouts.partials.breadcumb')
    <li class="breadcrumb-item"><a href="#">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Index</li>
@endcomponent


<div class="contentbar">
    <div class="row">
        <div class="col-lg-8 col-xl-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Products</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-danger" href="{{ url('admin/products?status=trashed') }}">Trashed</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-6 col-xl-3">
                            <div class="product-bar m-b-30">
                                <div class="product-head">
                                    {{-- {{$product->files[1]->image}} --}}
                                    <a href="{{ url('admin/products/'.$product->product_slug) }}">
                                        <img src="{{asset('storage/products/'.$product->files->first()->image)}}" class="img-fluid" alt="product">
                                    </a>
                                    <p><span class="badge badge-success font-14">{{ $product->product_discount }}% off</span></p>
                                </div>                                            
                                <div class="product-body py-3">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="d-inline-block">
                                                <span class="text-uppercase font-12 f-w-6">{{ $product->brand->brand_name }}</span>
                                            </div>
                                            <div class="d-inline-block float-right">
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star"></i>
                                                <i class="feather icon-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h6 class="mt-1 mb-3">
                                                {{-- {{ substr($product->product_name, 0, 10) }} --}}
                                                {{ $product->product_name }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <div class="text-left">
                                                <h5 class="f-w-7 mb-0"><sup class="font-14">Tk</sup>{{ $product->product_price }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                @if(!$product->deleted_at)
                                                <a href='{{ url("admin/products/{$product->product_slug}/edit") }}' class="btn btn-primary-rgba font-18"><i class="feather icon-edit"></i></a>

                                                <form class="d-inline" action="{{ url('admin/products/'.$product->product_slug) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-primary-rgba font-18"><i class="feather icon-trash"></i></button>
                                                </form>
                                                @else
                                                <a href="{{ url('admin/products/restore/'.$product->id) }}" class="btn btn-primary-rgba font-18"><i class="fa fa-refresh"></i></a>
                                             
                                                <form class="d-inline" action="{{ url('admin/products/delete/'.$product->product_slug) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary-rgba font-18"><i class="feather icon-trash"></i></button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Start row -->
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body ecommerce-pagination">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-6">
                            <p>Showing 1 to 2 of 12 entries</p>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <nav aria-label="Page navigation example">
                                {{$products->links()}}
                            </nav>
                        </div>
                    </div>                                
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
@endsection

@push('js')
    <script src="{{asset('contents/admin')}}/assets/js/custom/custom-ecommerce-shop-page.js"></script>
@endpush











