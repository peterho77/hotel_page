<header class="primary-header">
    <section class="top-nav | padding-block-200 section-divider">
        <div class="container">
            <div class="row">
                <nav class="top-nav__left | col-lg-6">
                    <ul class="nav-list" role="list">
                        <li class="padding-block-200">
                            <svg class="icon">
                                <use xlink:href="{{asset('icon/guest/telephone-fill.svg#telephone-fill')}}"></use>
                            </svg>
                            <span class="fw-semi-bold">037 619 3244</span>
                        </li>
                        <li>
                            <svg class="icon">
                                <use xlink:href="{{asset('icon/guest/envelope-fill.svg#envelope-fill')}}"></use>
                            </svg>
                            <span class="fw-semi-bold">peterho5477@gmail.com</span>
                        </li>
                    </ul>
                </nav>
                <nav class="top-nav__right | col-lg-6">
                    <div class="nav-wrapper">
                        <ul class="social-list" role="list">
                            <li>
                                <a href="">
                                    <svg class="icon social-icon">
                                        <use xlink:href="{{asset('icon/guest/social-icons.svg#facebook')}}"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg class="icon social-icon">
                                        <use xlink:href="{{asset('icon/guest/social-icons.svg#instagram')}}"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg class="icon social-icon">
                                        <use xlink:href="{{asset('icon/guest/social-icons.svg#twitch')}}"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg class="icon social-icon">
                                        <use xlink:href="{{asset('icon/guest/social-icons.svg#twitter-x')}}"></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        <button class="button">
                            {{ __('header.guest.bookNow') }}
                        </button>
                        <div class="toggle-lang-switch">
                            <img class="flag-icon"
                                src="{{ asset(session('img_path', "img/united-states-of-america.png")) }}" alt="">
                            <div class="current-lang">
                                <span>
                                    {{ session('lang_name', 'EN') }}
                                </span>
                                <svg class="icon">
                                    <use xlink:href="{{asset('icon/guest/caret-down-fill.svg#caret-down-fill')}}"></use>
                                </svg>
                            </div>
                            <ul class="lang-list | padding-block-200" role="list">
                                <li class="en"><a href="{{ route('lang.switch', 'en') }}">EN</a></li>
                                <li class="vi"><a href="{{ route('lang.switch', 'vi') }}">VI</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <section class="bottom-nav | padding-block-400">
        <div class="container">
            <div class="row">
                <div class="header-logo | col-lg-2">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <nav class="primary-bottom-nav | col-lg-10">
                    <div class="search-bar">

                    </div>
                    <ul class="nav-list" role="list">
                        <li><a href="{{ route('home-page') }}"><span>{{__('header.guest.home')}}</span></a></li>
                        <li><a href="{{ route('room-page') }}"><span>{{__('header.guest.rooms')}}</span></a></li>
                        <li><a href=""><span>{{__('header.guest.aboutUs')}}</span></a></li>
                        <li><a href=""><span>{{__('header.guest.pages')}}</span></a></li>
                        <li><a href=""><span>{{__('header.guest.news')}}</span></a></li>
                        <li><a href=""><span>{{__('header.guest.contact')}}</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</header>