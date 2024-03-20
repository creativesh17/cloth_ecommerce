<?php
                function cat_print($categories){
                    if($categories->count()){
            ?>
                        <ul>
                            <?php
                                foreach ($categories as $category){
                            ?>
                                    <li>
                                        <a href="{{url($category->url)}}">
                                            {{ $category->name }}
                                            <?php
                                                if ($category->parent_id > 0 && $category->childrens()->count())
                                                    echo '<i class="fa fa-caret-right"></i>';
                                            ?>
                                            <?php
                                                if ($category->childrens()->count())
                                                    echo '<i onclick="active_ul()" class="fa fa-plus-square-o expand_icon"></i>';
                                            ?>
                                        </a>
                                        <?php
                                            if($category->childrens->count()){
                                                cat_print($category->childrens);
                                            }
                                        ?>
                                    </li>
                            <?php
                                }
                            ?>
                        </ul>
            <?php

                    }
                }
                cat_print(\App\Models\Category::where('is_nav_category',1)->with('childrens')->get());
            ?>