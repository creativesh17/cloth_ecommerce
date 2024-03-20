@extends('website.layouts.app',[
    'meta' => [
        "title" => "gallery",
    ],
])
@section('content')
<main class="main-content">
    <section class="bread_cumb_section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/"><i class="fa fa-home" title="Home"></i></a>
                </li>
                <li >
                    <a href="#">
                        <span>gallery</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="mb-5 pb-3">
        <div class="container">
            <div class="home_gallery">
                <div class="gallery_header">
                    <h2>Our Latest Packages</h2>
                </div>
                <div class="gallery_list">
                    @foreach ($gallery as $item)
                        <div class="item shape_box7">
                            <img src="{{$item->full_url}}" alt="{{$item->title}}">
                            <div class="overlay">
                                <a onclick="show_gallery_modal({
                                    id: {{$item->id}},
                                    title: `{{$item->title}}`,
                                    description: `{{nl2br($item->description)}}`,
                                    full_url: `{{$item->full_url}}`,
                                })" class="shape_box3" href="#">Details</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="all_package">
                {{-- <a href="/gallery" class="button_shape shape_box3">
                    gallery
                </a> --}}
            </div>
            <div class="mt-4">
                {{ $gallery->links() }}
            </div>
        </div>
    </section>


</main>
@endsection
