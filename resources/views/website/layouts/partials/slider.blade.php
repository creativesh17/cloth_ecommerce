<section class="flat-row flat-slider marquee_flat_all">
    <div class="container">

        <div class="row">
            <div class="col-md-12 marquee_wrapper">
                <div class="marquee_body">
                    <marquee behavior="" direction="">
                        {{ $setting->breaking_news }}
                    </marquee>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12">
                <div class="slider owl-carousel top_slider">

                    @foreach (\App\Models\WebsiteBanner::where('show', 1)->where('status', 1)->orderBy('id', 'DESC')->get() as $item)
                        <div class="banner_slide_image slider-item">
                            <img src="{{ $item->image }}" alt="banner">
                        </div>
                    @endforeach

                </div><!-- /.slider -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
</section><!-- /.flat-slider -->
