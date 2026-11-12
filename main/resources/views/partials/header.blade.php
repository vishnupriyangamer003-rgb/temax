        <!-- main header -->
        <header class="main-header">
            @include('partials.toolbar')
            <div class="bg-color"></div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="left-column">
                            <figure class="header-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/images/temax/logo.png') }}?v={{ file_exists(base_path('../assets/images/temax/logo.png')) ? filemtime(base_path('../assets/images/temax/logo.png')) : '2' }}" alt="{{ setting('site_name', 'TEMAX') }}">
                                </a>
                            </figure>
                            <div class="menu-area">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler">
                                    <i class="icon-bar"></i>
                                    <i class="icon-bar"></i>
                                    <i class="icon-bar"></i>
                                </div>
                                <nav class="main-menu navbar-expand-md navbar-light clearfix">
                                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                        <ul class="navigation clearfix">
                                            <li class="{{ request()->routeIs('home') ? 'current' : '' }}">
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="{{ request()->routeIs('about') ? 'current' : '' }}">
                                                <a href="{{ route('about') }}">About</a>
                                            </li>
                                            <li class="dropdown {{ request()->routeIs('services*') ? 'current' : '' }}">
                                                <a href="{{ route('services') }}">Services</a>
                                                <ul>
                                                    @foreach ($navServices as $service)
                                                        <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li class="{{ request()->routeIs('products*') ? 'current' : '' }}">
                                                <a href="{{ route('products') }}">Products</a>
                                            </li>
                                            <li class="{{ request()->routeIs('projects*') ? 'current' : '' }}">
                                                <a href="{{ route('projects') }}">Projects</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <ul class="menu-right-content">
                            <li class="contact-link">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">
                                    <i class="flaticon-headphones"></i><span>{{ setting('phone_display', setting('phone')) }}</span>
                                </a>
                            </li>
                            <li class="btn-box">
                                <a href="{{ route('contact') }}" class="theme-btn btn-one"><i class="flaticon-mail"></i><span>Contact</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="bg-color"></div>
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="left-column">
                            <figure class="header-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/images/temax/logo.png') }}?v={{ file_exists(base_path('../assets/images/temax/logo.png')) ? filemtime(base_path('../assets/images/temax/logo.png')) : '2' }}" alt="{{ setting('site_name', 'TEMAX') }}">
                                </a>
                            </figure>
                            <div class="menu-area">
                                <nav class="main-menu clearfix">
                                    <!--Keep This Empty / Menu will come through Javascript-->
                                </nav>
                            </div>
                        </div>
                        <ul class="menu-right-content">
                            <li class="contact-link">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">
                                    <i class="flaticon-headphones"></i><span>{{ setting('phone_display', setting('phone')) }}</span>
                                </a>
                            </li>
                            <li class="btn-box">
                                <a href="{{ route('contact') }}" class="theme-btn btn-one"><i class="flaticon-mail"></i><span>Contact</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->
