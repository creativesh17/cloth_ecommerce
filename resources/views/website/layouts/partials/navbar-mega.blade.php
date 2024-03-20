<div id="mega-menu">
    <div class="btn-mega"><span></span>ALL CATEGORIES</div>
    @php
        $parentCats = \App\Models\Category::where('parent_id', 0)->where('status', 1)->limit(10)->get();
    @endphp

    <ul class="menu" style="z-index: -9;">
        @foreach ($parentCats as $cate)
        <li>            
            <a href="{{ route('category_product', $cate->slug) }}" title="" class="dropdown">
                <span class="menu-img">                    
                    @if ($cate->category_image)
                    <img src="{{ $cate->category_image }}" alt="" width="25px" height="23px">    
                    @else
                    <img src="{{ asset('frontend') }}/images/icons/menu/05.png" alt="">                        
                    @endif
                </span>
                <span class="menu-title">
                    {{$cate->name}}

                </span>
            </a>
            <div class="drop-menu overflowY" >
                @foreach($cate->childrens as $child)
                <div class="one-third category-show" >
                        <div class="cat-title">
                            {{ $child->name }}
                        </div>

                        <ul>
                            <?php
                            foreach ($cate->childrens as $category) {
                            ?>
                                <li>
                                    <a href="{{ route('category_product', $category->slug) }}" title="">{{ $category->name }}</a>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>

                      
                    </div>
                    @endforeach
            </div>
        </li>
        @endforeach


    </ul>
</div>
