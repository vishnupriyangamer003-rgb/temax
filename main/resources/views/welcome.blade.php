@extends('layouts.app')

@section('title', 'TEMAX - Leader in Furnace Camera Systems & High-Temperature Monitoring in India')
@section('meta_description', 'TEMAX manufactures high-temperature furnace camera systems, camera cooling systems, auto retraction systems and thermal imaging cameras for cement, thermal and glass industries in India.')

@php
    $serviceIcons = [
        'flaticon-zoom',
        'flaticon-steel',
        'flaticon-pistons',
        'flaticon-thunder-bolt',
        'flaticon-tools',
        'flaticon-gears',
    ];

    $industries = [
        [
            'name' => 'Cement',
            'text' => 'Furnace cameras watching kilns, coolers, cyclones and grates — live video for clinker production around the clock.',
            'points' => ['Kiln &amp; Cooler Cameras', 'Cyclone Jam Prevention', 'Under Grate Monitoring'],
        ],
        [
            'name' => 'Thermal',
            'text' => 'Continuous in-furnace visibility for boilers and furnaces in captive and utility power plants — from 600MW units to process heaters.',
            'points' => ['Captive Power Plants', '600MW Utility Plants', 'Boiler Furnace Viewing'],
        ],
        [
            'name' => 'Glass',
            'text' => 'Video monitoring of glass melting furnaces — see the melt and flame live without opening the furnace.',
            'points' => ['Melting Furnace Cameras', 'Live Melt Visibility', 'Consistent Glass Quality'],
        ],
    ];

@endphp

@section('content')

    <!-- hero slider: simple auto-sliding image banner -->
    <section class="vh-slider" id="home-hero" aria-roledescription="carousel" aria-label="TEMAX highlights">
        <div class="vh-slides">
            <div class="vh-slide is-active" style="background-image: url({{ asset('assets/images/temax/kiln-camera.jpg') }});">
                <div class="vh-slide-overlay"></div>
                <div class="auto-container">
                    <div class="vh-slide-text">
                        <h1>See <span>Inside Your Furnace</span></h1>
                        <p>Live, continuous furnace viewing — TEMAX camera systems built for cement, thermal and glass plants since 1996.</p>
                        <a href="{{ route('services') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Read More</span></a>
                    </div>
                </div>
            </div>
            <div class="vh-slide" style="background-image: url({{ asset('assets/images/temax/dispatch.jpg') }});">
                <div class="vh-slide-overlay"></div>
                <div class="auto-container">
                    <div class="vh-slide-text">
                        <h2>Cooling &amp; <span>Retraction Systems</span></h2>
                        <p>SS 316 cooling and pneumatic auto retraction protect camera and operator in environments up to 2000&nbsp;°C.</p>
                        <a href="{{ route('products') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Read More</span></a>
                    </div>
                </div>
            </div>
            <div class="vh-slide" style="background-image: url({{ asset('assets/images/temax/thermal-camera.jpg') }});">
                <div class="vh-slide-overlay"></div>
                <div class="auto-container">
                    <div class="vh-slide-text">
                        <h2>Thermal <span>Kiln Shell Monitoring</span></h2>
                        <p>Temperature-reading thermal cameras track hot spots and coating loss across the entire kiln length.</p>
                        <a href="{{ route('projects') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Read More</span></a>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="vh-nav vh-prev" aria-label="Previous slide">&#10094;</button>
        <button type="button" class="vh-nav vh-next" aria-label="Next slide">&#10095;</button>
        <div class="vh-dots" role="tablist" aria-label="Choose slide"></div>
    </section>
    <!-- hero slider end -->

    <!-- intro-section (Identity / Stability / Technology) -->
    <section class="vh-intro">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vh-feature">
                        <h6>Our</h6><h3>Identity</h3>
                        <p>Furnace Cameras Since 1996.</p>
                        <a href="{{ route('about') }}" aria-label="About us"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vh-feature">
                        <h6>Our</h6><h3>Stability</h3>
                        <p>90% Made in India.</p>
                        <a href="{{ route('about') }}" aria-label="About us"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vh-feature">
                        <h6>Our</h6><h3>Technology</h3>
                        <p>HD, Thermal &amp; Custom Builds.</p>
                        <a href="{{ route('products') }}" aria-label="Products"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro-section end -->

    <!-- about-section (Velss layout: text left, framed image right) -->
    <section class="vh-about">
        <div class="auto-container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="vh-title">
                        <h6>About Us</h6>
                        <h2>Leader in <span class="text-nowrap">[Furnace&nbsp;Camera]</span> Manufacturing</h2>
                    </div>
                    <h3 class="vh-sub">Three Decades of Furnace Viewing</h3>
                    <p>Since 1996 TEMAX has manufactured high-temperature
                        furnace camera systems in Karur, Tamil Nadu — with
                        90% of production in India, all spares available
                        locally and customisation on demand.</p>
                    <ul class="vh-ticks">
                        <li>Engineered in Karur</li>
                        <li>Proudly Made in India</li>
                        <li>30+ Years of Experience</li>
                    </ul>
                    <a href="{{ route('about') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Read More</span></a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="vh-collage">
                        <img class="vh-collage-main" src="{{ asset('assets/images/temax/kiln-2016.png') }}" alt="TEMAX furnace camera on a rotary kiln" loading="lazy">
                        <img src="{{ asset('assets/images/temax/cement-cooler.png') }}" alt="TEMAX cement cooler camera" loading="lazy">
                        <img src="{{ asset('assets/images/temax/camera-furnace.jpg') }}" alt="TEMAX furnace camera unit" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->

    <!-- service-section (Velss layout: icon + title + text rows) -->
    <section class="vh-services">
        <div class="auto-container">
            <div class="vh-title text-center">
                <h6>{!! setting('services_subtitle', 'What we offer') !!}</h6>
                <h2>{!! setting('services_title', 'Our services &amp; solutions') !!}</h2>
                <p>Furnace cameras, cooling, retraction and thermal systems.</p>
            </div>
            <div class="vh-service-list">
                @foreach ($homeServices as $service)
                    <a class="vh-service-row" href="{{ route('services.show', $service->slug) }}">
                        <div class="vh-service-icon"><i class="{{ $serviceIcons[$loop->index % count($serviceIcons)] }}"></i></div>
                        <div class="vh-service-body">
                            <h3>{{ $service->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($service->summary, 160) }}</p>
                        </div>
                        <span class="vh-service-go"><i class="flaticon-right-arrow"></i></span>
                    </a>
                @endforeach
            </div>
            <div class="text-center vh-all"><a href="{{ route('services') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>All Services</span></a></div>
        </div>
    </section>
    <!-- service-section end -->

    <!-- industries-section (Velss layout: centred title, simple cards) -->
    <section class="vh-industries">
        <div class="auto-container">
            <div class="vh-title text-center">
                <h6>Industries Served</h6>
                <h2>Serving Diverse <span>Sectors</span></h2>
                <p>Every industry, tailored furnace camera solutions.</p>
            </div>
            <div class="row clearfix">
                @foreach ($industries as $index => $industry)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="vh-industry">
                            <span class="vh-industry-no">Industry {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <h3>{{ $industry['name'] }}</h3>
                            <p>{{ $industry['text'] }}</p>
                            <ul class="vh-ticks">
                                @foreach ($industry['points'] as $point)
                                    <li>{!! $point !!}</li>
                                @endforeach
                                <li><a href="{{ route('projects') }}">and More....</a></li>
                            </ul>
                            <a href="{{ route('projects') }}" class="vh-link">Find More About Industry <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="vh-feature-strip">
                <img src="{{ asset('assets/images/temax/power-600mw.jpg') }}" alt="600MW power plant camera system">
                <div class="vh-feature-strip-text">
                    <h3>600<span>MW</span> Utility Power Plant Camera System.</h3>
                    <p>Every Industry, Tailored Furnace Camera Solutions.</p>
                    <div class="vh-hero-actions">
                        <a href="{{ route('contact') }}" class="theme-btn btn-one"><i class="flaticon-calendar"></i><span>Make an Appointment</span></a>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}" class="theme-btn btn-two"><i class="flaticon-phone"></i><span>{{ setting('phone_display', setting('phone')) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="text-center vh-all"><a href="{{ route('projects') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>All Projects</span></a></div>
        </div>
    </section>
    <!-- industries-section end -->

    <!-- project-section (Velss layout: image cards with hover overlay) -->
    <section class="vh-projects">
        <div class="auto-container">
            <div class="vh-title text-center">
                <h6>{!! setting('projects_subtitle', 'Our track record') !!}</h6>
                <h2>{!! setting('projects_title', 'Projects &amp; installations') !!}</h2>
                <p>Real TEMAX cameras working in plants across India.</p>
            </div>
            <div class="row clearfix">
                @forelse ($homeProjects->take(4) as $project)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a class="vh-project" href="{{ route('projects.show', $project->id) }}">
                            <div class="vh-project-img" style="background-image: url({{ asset(optional($project->images->first())->path ?: 'assets/images/project/project-1.jpg') }});"></div>
                            <h3 class="vh-project-title">{{ $project->title }}</h3>
                            <div class="vh-project-hover">
                                <span class="category">{{ $project->type ?: 'Project' }}</span>
                                <h3>{{ $project->title }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit($project->text, 90) }}</p>
                                <small>{{ $project->place }}</small>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center"><p>New installations are being added to this section. <a href="{{ route('contact') }}">Contact us</a>.</p></div>
                @endforelse
            </div>
            <div class="text-center vh-all"><a href="{{ route('projects') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>All Projects</span></a></div>
        </div>
    </section>
    <!-- project-section end -->


    <!-- chooseus-section (simple icon + title + text grid) -->
    <section class="vh-reasons">
        <div class="auto-container">
            <div class="vh-title text-center">
                <h6>Why Choose Us</h6>
                <h2>Top Reasons to <span>Choose</span> Us</h2>
                <p>Three decades of furnace viewing expertise.</p>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vh-reason">
                        <i class="flaticon-manufacturing"></i>
                        <h3><a href="{{ route('about') }}">Furnace Camera Specialists</a></h3>
                        <p>Three decades of high-temperature viewing experience across cement, thermal and glass plants.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vh-reason">
                        <i class="flaticon-engineer"></i>
                        <h3><a href="{{ route('about') }}">90% Made in India</a></h3>
                        <p>Main modules only imported — all spares available locally with immediate support.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vh-reason">
                        <i class="flaticon-manufacturing-1"></i>
                        <h3><a href="{{ route('services') }}">Built for 2000&nbsp;°C</a></h3>
                        <p>Air and water cooled camera systems rated for the toughest furnace environments.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vh-reason">
                        <i class="flaticon-goal"></i>
                        <h3><a href="{{ route('contact') }}">Cost-Effective Spares</a></h3>
                        <p>Economical, locally available spares keep your running costs down.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vh-reason">
                        <i class="flaticon-test"></i>
                        <h3><a href="{{ route('about') }}">Quality Assurance</a></h3>
                        <p>Every unit is built and tested at the TEMAX production unit in Karur.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vh-reason">
                        <i class="flaticon-certificate"></i>
                        <h3><a href="{{ route('projects') }}">First for Kiln Cameras</a></h3>
                        <p>Developed the first furnace camera for kiln application in 2016.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-section end -->

    @if(isset($clients) && $clients->count())
    <!-- clients-section (Velss layout: single logo strip) -->
    <section class="vh-clients">
        <div class="auto-container">
            <div class="vh-title text-center">
                <h6>{{ setting('clients_subtitle', 'Customers') }}</h6>
                <h2>{!! setting('clients_title', 'Our Valued <span>Customers</span>') !!}</h2>
                <p>{{ setting('clients_tagline', 'Delivering quality, innovation, and precision.') }}</p>
            </div>
            <div class="vh-logos">
                @foreach($clients as $c)
                    <a href="{{ $c->url ?: 'javascript:void(0);' }}" title="{{ $c->name }}" {{ $c->url ? 'target="_blank" rel="noopener"' : '' }}>
                        <img src="{{ asset($c->logo) }}" alt="{{ $c->name }}">
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- clients-section end -->
    @endif

    <!-- download-section (contact CTA) -->
    @include('partials.cta')

@endsection

@push('scripts')
    <script>
        (function () {
            var root = document.getElementById('home-hero');
            if (!root) return;
            var slides = root.querySelectorAll('.vh-slide');
            var dotsBox = root.querySelector('.vh-dots');
            if (slides.length < 2) return;
            var idx = 0, timer = null, DELAY = 5000;
            var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            Array.prototype.forEach.call(slides, function (s, i) {
                var b = document.createElement('button');
                b.type = 'button';
                b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                b.addEventListener('click', function () { go(i); restart(); });
                dotsBox.appendChild(b);
            });
            var dots = dotsBox.querySelectorAll('button');

            function go(n) {
                idx = (n + slides.length) % slides.length;
                Array.prototype.forEach.call(slides, function (s, i) {
                    s.classList.toggle('is-active', i === idx);
                });
                Array.prototype.forEach.call(dots, function (d, i) {
                    d.classList.toggle('is-active', i === idx);
                });
            }
            function start() { if (!reduce) timer = setInterval(function () { go(idx + 1); }, DELAY); }
            function stop() { if (timer) { clearInterval(timer); timer = null; } }
            function restart() { stop(); start(); }

            root.querySelector('.vh-prev').addEventListener('click', function () { go(idx - 1); restart(); });
            root.querySelector('.vh-next').addEventListener('click', function () { go(idx + 1); restart(); });
            root.addEventListener('mouseenter', stop);
            root.addEventListener('mouseleave', start);
            document.addEventListener('visibilitychange', function () { document.hidden ? stop() : (stop(), start()); });

            var sx = null;
            root.addEventListener('touchstart', function (e) { sx = e.touches[0].clientX; }, { passive: true });
            root.addEventListener('touchend', function (e) {
                if (sx === null) return;
                var dx = e.changedTouches[0].clientX - sx; sx = null;
                if (Math.abs(dx) > 40) { go(idx + (dx < 0 ? 1 : -1)); restart(); }
            }, { passive: true });

            go(0);
            start();
        })();
    </script>
@endpush
