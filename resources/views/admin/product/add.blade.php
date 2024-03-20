@extends('layouts.admin')
@section('title', 'Product Add')

@push('css')
    <link href="{{asset('contents/admin')}}/assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
    <link href="{{asset('contents/admin')}}/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/assets/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
@component('layouts.partials.breadcumb')
    <li class="breadcrumb-item"><a href="#">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endcomponent

<div class="contentbar">
    <!-- Start row -->
    <form action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row {{$errors->has('product_name') ? ' has-error':''}}">
                            <label for="productTitle" class="col-sm-12 col-form-label">Product Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control font-20" name="product_name" value="{{ old('product_name') }}" >
                                @error('product_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                                     
                        <div class="form-group row {{$errors->has('product_feature') ? ' has-error':''}}">
                            <label class="col-sm-12 col-form-label">Features</label>
                            <div class="col-sm-12">
                            <textarea name="product_feature" class="summernote">{{ old('product_feature') }}</textarea>
                            </div>
                            @error('product_feature')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="form-group row {{$errors->has('product_price') ? ' has-error':''}}">
                                    <label for="product_name" class="col-sm-4 col-form-label">Price(tk)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="product_price" id="product_price" value="{{ old('product_price') }}">
                                        @error('product_price')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 {{$errors->has('product_discount') ? ' has-error':''}}">
                                    <label for="product_discount" class="col-sm-4 col-form-label">Discount(tk)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="product_discount" id="product_discount" value="{{ old('product_discount') }}">
                                        @error('product_discount')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mt-2 {{$errors->has('product_stock') ? ' has-error':''}}">
                                    <label for="product_stock" class="col-sm-4 col-form-label">Stock</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="product_stock" id="product_stock" value="{{ old('product_stock') }}">
                                        @error('product_stock')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 {{$errors->has('product_description') ? ' has-error':''}}">
                                    <label for="product_description" class="col-sm-12 col-form-label">Product Description</label>
                                    <div class="col-sm-12">
                                        <textarea name="product_description" class="form-control" id="product_description" cols="30" rows="6">{{ old('product_description') }}</textarea>
                                        @error('product_description')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-info btn-block">Add Product</button>
                            </div>
                        </div>
                    </div>
                </div>                  
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-4 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Categories</h5>
                    </div>
                    <div class="card-body">
                        <select class="select2-single form-control" name="category" id="category">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Subcategories</h5>
                    </div>
                    <div class="card-body">
                        <select class="select2-multi-select form-control" name="subcategories[]" id="subcategories"  multiple>
                            <option value="">Select Subcategory</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcate_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Colors</h5>
                    </div>
                    <div class="card-body pt-3">
                        <div class="custom-checkbox-button">
                            <select class="select2-multi-select form-control" name="colors[]" multiple>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30 {{$errors->has('brand_id') ? ' has-error':''}}">
                    <div class="card-header">
                        <h5 class="card-title">Brand</h5>
                    </div>
                    <div class="card-body">
                        <div class="product-tags">
                            <select class="select2-single form-control" name="brand_id">
                            <option>Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                            </select>
                            @error('brand_id')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                                
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Product Image Gallery</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="file" class="form-control" name="images[]" multiple>
                        </div>                               
                    </div>
                    <div class="form-group {{$errors->has('new_from') ? ' has-error':''}}">
                        <label for="" class="ml-4"><b>New From</b></label>
                        <input type="text" name="new_from" id="default-date-from" class="datepicker-here form-control" placeholder="New From Date" value="{{ old('new_from') }}"/>
                        @error('new_from')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>             
                    <div class="form-group {{$errors->has('new_to') ? ' has-error':''}}">
                        <label for="" class="ml-4"><b>New To</b></label>
                        <input type="text" name="new_to" id="default-date-to" class="datepicker-here form-control" placeholder="New To Date" value="{{ old('new_to') }}"/>
                        @error('new_to')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- End col -->
        
        </div>
        <!-- End row -->
    </form>
</div>

@endsection

@push('js')
    
    <script src="{{asset('contents/admin')}}/assets/plugins/select2/select2.min.js"></script> 
    <script src="{{asset('contents/admin')}}/assets/plugins/datepicker/datepicker.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/plugins/datepicker/i18n/datepicker.en.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/custom/custom-form-datepicker.js"></script>
    <script src="{{asset('contents/admin')}}/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/plugins/dropzone/dist/dropzone.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/custom/custom-form-select.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/custom/custom-ecommerce-product-detail-page.js"></script>
@endpush