@extends('website.layouts.app',[
    'meta' => [
        "title" => "products cart",
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
                        <span>cart</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section style="background: #f2f4f8;text-align: center;">
        <br>
        <b>
        Request not found
        <br>
        <br>
        <a href="/" class="btn btn-lg btn-success">go back</a>
    </section>
</main>
@endsection
