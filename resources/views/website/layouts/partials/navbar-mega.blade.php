<div id="mega-menu">
    <div class="btn-mega"><span></span>ALL CATEGORIES</div>
    @php
        $parentCats = \App\Models\Category::where('parent_id', 0)->where('status', 1)->limit(10)->get();
    @endphp

    <ul class="menu" style="z-index: -9;">
        @foreach ($parentCats as $cate)
        <li>            
            <a href="{{ route('category_product', $cate->slug) }}" title="" class="{{ $cate->childrens->count() ? 'dropdown' : '' }}">
                <span class="menu-img">                    
                    @if ($cate->category_image)
                    <img src="/{{ $cate->category_image }}" alt="" width="25px" height="23px">    
                    @else
                    <img src="{{ asset('frontend') }}/images/icons/menu/05.png" alt="">                        
                    @endif
                </span>
                <span class="menu-title">
                    {{$cate->name}}

                </span>
            </a>

            @if($cate->childrens->count())
            <div class="drop-menu overflowY" >
                @foreach($cate->childrens as $child)

                <div class="one-third category-show" >
                    @if ($child->childrens->count())
                    <div class="cat-title">
                        <a href="{{ route('category_product', $child->slug) }}">{{ $child->name }}</a>
                    </div>
                    @else
                        <div>
                            <a href="{{ route('category_product', $child->slug) }}">{{ $child->name }}</a>
                        </div>
                    @endif

                        {{-- @dd($child->childrens) --}}

                        <ul>
                            @foreach ($child->childrens as $category)
                            <li>
                                <a href="{{ route('category_product', $category->slug) }}" title="">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>

                      
                    </div>
                    @endforeach
            </div>
            @endif
        </li>
        @endforeach


    </ul>
</div>
