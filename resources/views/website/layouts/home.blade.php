@extends('website.layouts.app',[
    'meta' => [
        "title" => "website",
    ],
])

@section('content')

@include('website.layouts.partials.slider')
{{-- @include('website.layouts.partials.banner') --}}
@include('website.layouts.partials.top-category-offer')
{{-- @include('website.layouts.partials.flat-highlights') --}}
@include('website.layouts.partials.flat-iconbox')

@endsection
