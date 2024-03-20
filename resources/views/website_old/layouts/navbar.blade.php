<nav id="navs">
    <div class="container-lg nav_container">
        <div id="cat_navbar">
            <div class="close_nav">
                <i class="fa fa-close" onclick="document.getElementById('navs').classList.toggle('active')"></i>
            </div>

            @include('website.layouts.nested_categories', ['categories' => $nestedCategories])

            <script>
                function active_ul(){
                    event.preventDefault();
                    let li = event.target.parentNode.parentNode;
                    let ul = event.target.parentNode.nextElementSibling;
                    li.classList.toggle('active');
                    ul.classList.toggle('active');
                }
                window.addEventListener('load',function(){
                    document.querySelector('#cat_navbar>ul').innerHTML +=`
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/offers">Offers</a></li>
                    `;
                })
            </script>
        </div>
    </div>
</nav>
