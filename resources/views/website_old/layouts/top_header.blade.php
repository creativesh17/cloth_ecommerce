<header class="top_header">
    @php
        $s_links = [
            '',
            'social_twitter',
            'social_facebook',
            'social_youtube',
            'social_instagram',
            'social_linkedin',
        ];
        $setting_first = collect($setting)->filter(function($i, $key) use($s_links){
            return array_search($key, $s_links);
        })->all();
    @endphp
    <div class="container custom-container">
        <div class="header_content">

            <div class="left">
                <ul class="s_links">
                    @foreach ($s_links as $link)
                        @isset($setting_first[$link])
                            <li>
                                <a href="{{ $setting_first[$link] }}" target="_blank">
                                    <i class="fa fa-{{explode('_',$link)[1]}}"></i>
                                </a>
                            </li>
                        @endisset
                    @endforeach
                </ul>
            </div>
            <div class="mid">
                <h1 class="web_heading">Welcome to {{ request()->getHost() }}</h1>
            </div>
            <div class="right">
                <ul class="header_right_links">
                    @auth
                        <li><a href="/profile">Profile</a></li>
                    @endauth
                    @guest
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>
