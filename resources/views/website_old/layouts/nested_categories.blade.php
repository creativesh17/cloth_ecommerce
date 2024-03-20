@if (!empty($categories))
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{{ url($category->url) }}">
                    {{ $category->name }}

                    @if ($category->parent_id && !empty($category->childrens))
                        <i class="fa fa-caret-right"></i>
                    @endif

                    <i onclick="active_ul()" class="fa fa-plus-square-o expand_icon"></i>
                </a>
                @if (!empty($category->childrens))
                    @include('website.layouts.nested_categories', ['categories' => $category->childrens])
                @endif
            </li>
        @endforeach
    </ul>
@endif
