<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $metaTitle = trim($__env->yieldContent('title'));
        $metaTitle = $metaTitle !== ''
            ? html_entity_decode($metaTitle, ENT_QUOTES, 'UTF-8')
            : setting('meta_title', 'TEMAX - Furnace Camera Manufacturer for Cement, Thermal & Glass Industries');
        $metaDescription = trim($__env->yieldContent('meta_description'));
        $metaDescription = $metaDescription !== ''
            ? html_entity_decode($metaDescription, ENT_QUOTES, 'UTF-8')
            : setting('meta_description');
        $metaKeywords = setting('meta_keywords');
        $metaAuthor = setting('meta_author');
        $metaRobots = setting('meta_robots', 'index, follow');
        $canonicalUrl = setting('canonical_url') ?: url()->current();
        $ogTitle = setting('og_title') ?: $metaTitle;
        $ogDescription = setting('og_description') ?: $metaDescription;
        $ogImage = setting('og_image') ? asset_url(setting('og_image')) : asset('assets/images/temax/kiln-camera.jpg');
        $twitterCard = setting('twitter_card', 'summary_large_image');
        $favicon = setting('favicon') ? asset_url(setting('favicon')) : asset('assets/images/favicon.ico');
    @endphp

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    @if ($metaKeywords !== '')
        <meta name="keywords" content="{{ $metaKeywords }}">
    @endif
    @if ($metaAuthor !== '')
        <meta name="author" content="{{ $metaAuthor }}">
    @endif
    <meta name="robots" content="{{ $metaRobots }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <!-- Open Graph / social sharing -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ setting('site_name', 'TEMAX') }}">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="{{ $twitterCard }}">
    <meta name="twitter:title" content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    @if (trim(setting('google_site_verification')))
        <meta name="google-site-verification" content="{{ setting('google_site_verification') }}">
    @endif

    {!! setting('extra_meta') !!}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fav Icon -->
    <link rel="icon" href="{{ $favicon }}" type="image/x-icon">

    <!-- Google Fonts (local) -->
    <link href="{{ asset('assets/fonts-redrose.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts-figtree.css') }}?v={{ $assetVersion }}" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('assets/css/font-awesome-all.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon_flexibank.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nice-select.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/elpath.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color1.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/odometer.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}?v={{ $assetVersion }}" rel="stylesheet">

    <style>
        .loader-wrap {
            position: fixed;
            inset: 0;
            z-index: 999999;
        }

        .loader-wrap .handle-preloader {
            background: #193247;
        }

        .loader-wrap .animation-preloader .spinner {
            width: 76px;
            height: 76px;
            margin-bottom: 30px;
            border: 3px solid rgba(255, 255, 255, 0.18);
            border-top-color: var(--theme-color);
        }

        .loader-wrap .animation-preloader .txt-loading .letters-loading {
            font-size: 48px;
            letter-spacing: 8px;
            -webkit-text-stroke-color: rgba(255, 255, 255, 0.35);
        }

        /* Header logo (replaces the theme's "Access" sidebar button) */
        .main-header .header-logo {
            position: relative;
            display: flex;
            align-items: center;
            margin: 0;
            flex-shrink: 0;
        }

        .main-header .header-logo img {
            position: relative;
            display: block;
            width: auto;
            height: 42px;
        }

        .sticky-header .header-logo img {
            height: 36px;
        }

        @media (max-width: 991px) {
            .main-header .header-logo {
                display: none;
            }
        }

        /* Hide theme language + search (not used on this site) */
        .main-header .language-box,
        .main-header .search-form {
            display: none !important;
        }

        .admin-only {
            display: none;
        }

        /* Dark backgrounds (footer / mobile drawer): white plate behind the wordmark */
        .footer-bottom .footer-logo img,
        .mobile-menu .nav-logo img {
            background: #fff;
            padding: 10px 16px;
            border-radius: 6px;
            box-sizing: content-box;
        }

        .main-footer .footer-bottom .bottom-inner {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 22px 0;
        }

        .main-footer .footer-bottom .bottom-inner .copyright {
            width: 100%;
        }

        .main-footer .footer-bottom .bottom-inner .copyright p {
            margin-bottom: 0;
            line-height: 1.6;
            text-align: center;
            white-space: nowrap;
            font-size: clamp(11px, 1.3vw, 16px);
        }

        .mobile-menu .nav-logo img {
            max-width: 160px;
        }

        @media (max-width: 767px) {
            .main-footer .footer-bottom .bottom-inner .copyright p {
                font-size: 11px;
            }
        }
    </style>

    @stack('styles')

    {!! setting('custom_head_code') !!}
</head>

<body>

    <div class="boxed_wrapper">

        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="t" class="letters-loading">t</span>
                            <span data-text-preloader="e" class="letters-loading">e</span>
                            <span data-text-preloader="m" class="letters-loading">m</span>
                            <span data-text-preloader="a" class="letters-loading">a</span>
                            <span data-text-preloader="x" class="letters-loading">x</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->

        @php
            $navServices = $navServices ?? \App\Models\Service::active()->ordered()->limit(8)->get(['slug', 'title', 'summary']);
        @endphp

        <!-- main header -->
        <header class="main-header">
            <div class="bg-color"></div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="left-column">
                            <figure class="header-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/images/temax/logo.png') }}" alt="{{ setting('site_name', 'TEMAX') }}">
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
                                                    <li><a href="{{ route('services') }}">All Services</a></li>
                                                </ul>
                                            </li>
                                            <li class="{{ request()->routeIs('products*') ? 'current' : '' }}">
                                                <a href="{{ route('products') }}">Products</a>
                                            </li>
                                            <li class="{{ request()->routeIs('projects*') ? 'current' : '' }}">
                                                <a href="{{ route('projects') }}">Projects</a>
                                            </li>
                                            <li class="{{ request()->routeIs('contact') ? 'current' : '' }}">
                                                <a href="{{ route('contact') }}">Contact</a>
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
                                <a href="{{ route('contact') }}" class="theme-btn btn-one"><i class="flaticon-mail"></i><span>Get a Quote</span></a>
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
                                    <img src="{{ asset('assets/images/temax/logo.png') }}" alt="{{ setting('site_name', 'TEMAX') }}">
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
                                <a href="{{ route('contact') }}" class="theme-btn btn-one"><i class="flaticon-mail"></i><span>Get a Quote</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>

            <nav class="menu-box">
                <div class="nav-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/temax/logo.png') }}" alt="{{ setting('site_name', 'TEMAX') }}"></a>
                </div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>{{ setting('address_short', setting('address')) }}</li>
                        <li><a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">{{ setting('phone_display', setting('phone')) }}</a></li>
                        <li><a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Mobile Menu -->

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- main-footer -->
        <footer class="main-footer">
            <div class="widget-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contact</h3>
                                </div>
                                <div class="widget-content">
                                    <p>{{ setting('address') }}</p>
                                    <div class="phone"><a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">{{ setting('phone_display', setting('phone')) }}</a></div>
                                    @if (setting('phone2'))
                                        <div class="phone"><a href="tel:{{ preg_replace('/[^0-9+]/', '', explode(',', setting('phone2'))[0]) }}">{{ setting('phone2') }}</a></div>
                                    @endif
                                    <div class="email"><a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a></div>
                                    <div class="map-link">
                                        <a href="{{ setting('map_embed') ? 'https://www.google.com/maps?q=' . urlencode(setting('address_short', setting('address'))) : 'https://www.google.com/maps' }}" target="_blank" rel="noopener">
                                            <i class="flaticon-right-arrow"></i><span>Google Map</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>Useful Links</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="{{ route('about') }}"><i class="flaticon-right"></i><span>About Us</span></a></li>
                                        <li><a href="{{ route('products') }}"><i class="flaticon-right"></i><span>Products</span></a></li>
                                        <li><a href="{{ route('projects') }}"><i class="flaticon-right"></i><span>Projects</span></a></li>
                                        <li><a href="{{ route('services') }}"><i class="flaticon-right"></i><span>Services</span></a></li>
                                        <li><a href="{{ route('contact') }}"><i class="flaticon-right"></i><span>Contact Us</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>Services</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        @foreach ($navServices as $service)
                                            <li>
                                                <a href="{{ route('services.show', $service->slug) }}">
                                                    <i class="flaticon-right"></i><span>{{ $service->title }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget support-widget">
                                <div class="widget-title">
                                    <h3>Let's Build Something Great Together</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="list-item mb_25 clearfix">
                                        <li><i class="flaticon-approved"></i><span>90% Manufacturing in India</span></li>
                                        <li><i class="flaticon-approved"></i><span>All Spares Available Locally</span></li>
                                        <li><i class="flaticon-approved"></i><span>Immediate Support</span></li>
                                    </ul>
                                    <div class="link-box">
                                        <div class="icon-box"><i class="flaticon-chat"></i></div>
                                        <a href="{{ route('contact') }}"><span>Free <br>Consultation</span><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="bottom-inner">
                        <div class="copyright">
                            <p>{!! setting('copyright_text', 'Copyright &copy; ' . date('Y') . ' <a href="' . route('home') . '">' . setting('site_name', 'TEMAX') . '</a>. All rights reserved.') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->

        <!--Scroll to top-->
        <div class="scroll-to-top">
            <svg class="scroll-top-inner" viewbox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
            </svg>
        </div>

    </div>

    <!-- jquery plugins -->
    <script src="{{ asset('assets/js/jquery.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/parallax-scroll.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/scrolltop.min.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/odometer.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/nav-tool.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/jquery.lettering.min.js') }}?v={{ $assetVersion }}"></script>
    <script src="{{ asset('assets/js/jquery.circleType.js') }}?v={{ $assetVersion }}"></script>

    <!-- main-js -->
    <script src="{{ asset('assets/js/script.js') }}?v={{ $assetVersion }}"></script>

    @stack('scripts')

    {!! setting('custom_body_code') !!}
</body>

</html>
