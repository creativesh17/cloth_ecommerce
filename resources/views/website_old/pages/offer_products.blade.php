@extends('website.layouts.app',[
    'meta' => [
        "title" => "best deals",
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
                        <span>offers</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="product_row category_product_row" id="category_product_list">
                @foreach ($products as $product)
                    @include('website.include.product',$product)
                @endforeach
            </div>

            <div class="py-2">
                {{ $products->links() }}
            </div>
        </div>
    </section>
</main>
@endsection
