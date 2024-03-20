<section class="mb-5 pb-3">
    <div class="container">
        <div class="home_gallery">
            <div class="gallery_header">
                <h2>Our Latest Packages</h2>
            </div>
            <div class="gallery_list">
                @foreach ($home_gallery as $item)
                    <div class="item shape_box7">
                        <img class="lazy" data-src="{{$item->full_url}}" src="logo.png" alt="{{$item->title}}">
                        {{-- <img src="{{$item->full_url}}" alt="{{$item->title}}"> --}}

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
            <a href="/gallery" class="button_shape shape_box3">
                All Gallery
            </a>
        </div>
    </div>
    <script>
        // Select all elements with the 'lazy' class
        const lazyImages = document.querySelectorAll('.lazy');

        // Intersection Observer to check when elements come into view
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.getAttribute('data-src');

                    // Load the actual image
                    img.setAttribute('src', src);
                    img.classList.remove('lazy');

                    // Stop observing the image once it's loaded
                    observer.unobserve(img);
                }
            });
        }, {
            rootMargin: '0px', // Adjust the root margin as needed
            threshold: 0.1 // Percentage of element in view to trigger the callback
        });

        // Start observing lazy images
        lazyImages.forEach(image => {
            observer.observe(image);
        });
    </script>
</section>
