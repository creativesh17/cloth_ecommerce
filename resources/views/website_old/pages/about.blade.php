@extends('website.layouts.app',[
    'meta' => [
        "title" => "about us",
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
                        <span>about us</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section style="background: #f2f4f8;">
        <br>
        <br>
        <div class="container ">
            <div class="card">
                <div class="card-body">
                    <div class="about_website_section">
                        {{-- <h1 class="heading">Our Introduction</h1> --}}
                        {!! \App\Models\Setting::select('descriptive_about')->first()->descriptive_about !!}
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </section>
</main>
@endsection
