@extends('website.layouts.app')
@section('content')
    {{--
    <div class="shape_box"></div>
    <div class="shape_box2"></div>
    <div class="shape_box3"></div>
    <div class="shape_box4"></div>
    <div class="shape_box5"></div>
    <div class="shape_box6"></div>
    --}}

    @include("website.pages.home_sections.banner")
    @include("website.pages.home_sections.categories")

    @include("website.pages.home_sections.gallery")
    @include("website.pages.home_sections.top_products")

    @include("website.pages.home_sections.top_categories")
    @include("website.pages.home_sections.intro_policies")
@endsection
