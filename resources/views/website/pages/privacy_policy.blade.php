@extends('website.layouts.app',[
    'meta' => [
        "title" => "about us",
    ],
])

@section('content')

    @include('website.layouts.partials.breadcrumb')

<section class="flat-term-conditions">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="term-conditions">
                    <div class="text-wrap"> <br>
                        {!! $setting->privacy_policy !!}
                    </div><!-- /.text-wrap -->
                </div><!-- /.term-conditions -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-term-conditions -->

@endsection

