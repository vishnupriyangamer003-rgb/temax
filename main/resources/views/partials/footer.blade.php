        <!-- main-footer (Velss layout: about / links / contact / map, then copyright bar) -->
        <footer class="main-footer rs-footer">
            <div class="widget-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget about-widget">
                                <div class="footer-logo">
                                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/temax/logo.png') }}" alt="{{ setting('site_name', 'TEMAX') }}"></a>
                                </div>
                                <ul class="list-item clearfix">
                                    <li><i class="flaticon-approved"></i><span>90% Manufacturing in India</span></li>
                                    <li><i class="flaticon-approved"></i><span>All Spares Available Locally</span></li>
                                    <li><i class="flaticon-approved"></i><span>Immediate Support</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>Useful Links</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="{{ route('home') }}"><i class="flaticon-right"></i><span>Home</span></a></li>
                                        <li><a href="{{ route('about') }}"><i class="flaticon-right"></i><span>About Us</span></a></li>
                                        <li><a href="{{ route('products') }}"><i class="flaticon-right"></i><span>Products</span></a></li>
                                        <li><a href="{{ route('projects') }}"><i class="flaticon-right"></i><span>Projects</span></a></li>
                                        <li><a href="{{ route('services') }}"><i class="flaticon-right"></i><span>Services</span></a></li>
                                        <li><a href="{{ route('contact') }}"><i class="flaticon-right"></i><span>Contact Us</span></a></li>
                                        <li><a href="{{ route('admin.login') }}"><i class="flaticon-right"></i><span>Admin Login</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contact Information</h3>
                                </div>
                                <div class="widget-content">
                                    <p>{{ setting('address') }}</p>
                                    <div class="phone"><a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">{{ setting('phone_display', setting('phone')) }}</a></div>
                                    @if (setting('phone2'))
                                        @foreach (array_filter(array_map('trim', explode(',', setting('phone2')))) as $p2)
                                            <div class="phone"><a href="tel:{{ preg_replace('/[^0-9+]/', '', $p2) }}">{{ format_phone($p2) }}</a></div>
                                        @endforeach
                                    @endif
                                    <div class="email"><a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>Our Services</h3>
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
