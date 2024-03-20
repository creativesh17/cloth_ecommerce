@extends('seo_dashboard.layouts.seo')
@section('content')
@push('plugins')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h5> SEO Management </h5>
            </div>
            <div class="col-lg-6"></div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>SEO informations for : <span class="text-info">{{ $data->name }}</span> </h6>
                    {{-- <a href="#/admin/news/category" class="router-link-active btn btn-info btn-sm">Back</a> --}}
                </div>
            </div>
            @php
            $selected = ["product_url","page_title","video_url","meta_description","search_keywords","schema_tag"];
            // dd($data->toArray());
            @endphp
            <div class="card-body">

                @foreach ($selected as $item)
                <div class="form-group">
                    <label for=""> {{ str_replace('_',' ',$item) }}</label>
                    <div class="mt-1 mb-3">
                        <textarea type="text" name="{{$item}}" class="form-control mb-1">{{$data->$item}}</textarea>
                        @error($item)
                        <div class="text-warning">
                            {{old($item)}} &nbsp; &nbsp;
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                @endforeach

                <div class="form-group">
                    <label for=""> Tags </label>
                    <div class="mt-1 mb-3">
                        <select class="js-example-basic-single" name="tags[]" multiple="">
                            @foreach (\App\Models\Tag::orderBy('title','ASC')->get() as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                       <script>
                        $(document).ready(function() {
                            $('.js-example-basic-single').select2({
                                tags: false,
                            })
                            .val(
                                {{
                                    json_encode($data->product_tag()->get()->map(function($q){
                                        return $q->id;
                                    })->toArray())
                                }}
                            )
                            .trigger('change');
                        });
                       </script>
                    </div>
                </div>


                <div class="mb-2">
                    <h4>Images Alter Text</h4>
                </div>
                @foreach ($data->related_images as $item)
                <div class="form-group">
                    {{-- <label for=""> Alter TEXT</label> --}}
                    <div class="mt-1 mb-3 d-flex gap-3">
                        <div>
                            <img src="{{asset($item->image)}}" style="height: 80px;" class="img-thumbnail" alt="">
                        </div>
                        <textarea type="text" name="related_image[{{$item->id}}]" class="form-control mb-1">{{$item->alt}}</textarea>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card-header py-2 position-sticky d-flex justify-content-start">
                <button class="btn btn-info btn-sm">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
