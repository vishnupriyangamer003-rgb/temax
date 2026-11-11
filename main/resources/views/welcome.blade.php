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

    $projectGroups = ['All' => $homeProjects->values()];
    foreach ($homeProjects->groupBy('type') as $type => $group) {
        if ($type !== null && $type !== '') {
            $projectGroups[$type] = $group->values();
        }
    }

    $workingSteps = $homeServices->first() ? $homeServices->first()->steps->values() : collect();
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
                    <div class="vh-frame">
                        <img src="{{ asset('assets/images/temax/production-unit-2.png') }}?v={{ file_exists(base_path('../assets/images/temax/production-unit-2.png')) ? filemtime(base_path('../assets/images/temax/production-unit-2.png')) : '2' }}" alt="TEMAX production unit">
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

@push('styles')
    <style>
        .temax-industries-section .inner-container {
            position: relative;
            display: block;
            margin-left: 0 !important;
            padding-left: 0 !important;
            margin-right: 0 !important;
            border-top: 1px solid #e4e9ec;
            border-bottom: 1px solid #e4e9ec;
            padding-top: 25px;
            padding-bottom: 25px;
        }

        .temax-industries-section .inner-container::before,
        .temax-industries-section .inner-container::after {
            display: none !important;
        }

        .temax-industries-section .tab-btn-box {
            position: relative;
            margin: 0;
        }

        .temax-industries-section .tab-btns .tab-btn {
            position: relative;
            display: block;
            font-size: 20px;
            line-height: 28px;
            font-family: var(--title-font);
            font-weight: 600;
            color: var(--title-color);
            padding: 22px 28px;
            cursor: pointer;
            border-bottom: 1px solid #e4e9ec;
            border-left: 1px solid #e4e9ec;
            transition: all 300ms ease;
            background: #fff;
        }

        .temax-industries-section .tab-btns .tab-btn:hover {
            color: var(--theme-color);
            background: #fbfcfd;
        }

        .temax-industries-section .tab-btns .tab-btn.active-btn {
            color: var(--theme-color);
            background: #f6f9fc;
            border-left: 3px solid var(--theme-color);
        }

        /* 600MW Power Plant Camera System box moved below Cement / Thermal / Glass tabs */
        .temax-industries-section .single-box {
            position: relative !important;
            left: auto !important;
            top: auto !important;
            width: 100% !important;
            margin-top: 26px;
            padding: 0;
        }

        .temax-industries-section .single-box .inner-box {
            position: relative;
            display: block;
            padding: 22px;
            background: #f8fafc;
            border: 1px solid #e4e9ec;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(20, 42, 59, 0.05);
        }

        .temax-industries-section .single-box .inner-box .image-box {
            position: relative;
            display: block;
            overflow: hidden;
            border-radius: 8px;
            aspect-ratio: 16 / 10;
        }

        .temax-industries-section .single-box .inner-box .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 500ms ease;
        }

        .temax-industries-section .single-box .inner-box:hover .image-box img {
            transform: scale(1.03);
        }

        .temax-industries-section .single-box .inner-box .lower-content {
            position: relative;
            display: block;
            padding-top: 18px;
        }

        .temax-industries-section .single-box .inner-box .lower-content .shape {
            position: absolute;
            right: 0;
            top: 18px;
            width: 70px;
            height: 51px;
            background-repeat: no-repeat;
            opacity: 0.6;
        }

        .temax-industries-section .single-box .inner-box .lower-content h2 {
            display: block;
            font-size: 46px;
            line-height: 1;
            margin-bottom: 5px;
            color: var(--title-color);
            font-weight: 700;
        }

        .temax-industries-section .single-box .inner-box .lower-content h2 span {
            font-weight: 300;
            color: var(--theme-color);
            font-size: 32px;
            margin-left: 3px;
        }

        .temax-industries-section .single-box .inner-box .lower-content h5 {
            display: block;
            font-size: 17px;
            line-height: 24px;
            color: #555d65;
            font-weight: 600;
            margin: 0;
        }

        /* Industry card: reduced width & aligned */
        .temax-industries-section .content-column {
            display: flex;
            justify-content: flex-start;
        }

        .temax-industries-section .tabs-content {
            width: 100%;
            max-width: 460px;
        }

        .temax-industries-section .tabs-box .content-box {
            position: relative;
            display: block;
            width: 100%;
            max-width: 460px;
            margin: 0;
            margin-left: 0;
            padding: 42px 36px 46px 36px;
            background-color: var(--secondary-color);
            border-radius: 10px;
            box-shadow: 0 16px 36px rgba(18, 25, 33, 0.16);
            text-align: left;
        }

        .temax-industries-section .tabs-box .content-box h6 {
            display: block;
            font-size: 14px;
            line-height: 22px;
            color: var(--theme-color);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .temax-industries-section .tabs-box .content-box h3 {
            display: block;
            font-size: 28px;
            line-height: 36px;
            color: #fff;
            font-weight: 600;
            margin-bottom: 14px;
        }

        .temax-industries-section .tabs-box .content-box p {
            color: #b0b7bd;
            font-size: 15px;
            line-height: 25px;
            margin-bottom: 24px;
        }

        .temax-industries-section .tabs-box .content-box .list-item {
            display: block;
            margin-bottom: 28px;
            padding: 0;
        }

        .temax-industries-section .tabs-box .content-box .list-item li {
            position: relative;
            display: block;
            color: #d1d6dc;
            font-size: 15px;
            line-height: 24px;
            padding-left: 28px;
            margin-bottom: 10px;
        }

        .temax-industries-section .tabs-box .content-box .list-item li:before {
            position: absolute;
            content: "\f117";
            font-family: 'flaticon_metallic';
            left: 0;
            top: 2px;
            font-size: 14px;
            color: var(--theme-color);
        }

        .temax-industries-section .tabs-box .content-box .list-item li:last-child {
            margin-bottom: 0;
            margin-top: 4px;
        }

        .temax-industries-section .tabs-box .content-box .list-item li:last-child::before {
            display: none;
        }

        .temax-industries-section .tabs-box .content-box .list-item li a {
            color: var(--theme-color);
            font-weight: 600;
            font-size: 14px;
            transition: color 300ms ease;
        }

        .temax-industries-section .tabs-box .content-box .list-item li a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .temax-industries-section .tabs-box .content-box .link-box a {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 14px;
            font-size: 14px;
            line-height: 20px;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            justify-content: flex-start;
            padding: 10px 18px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 6px;
            transition: all 300ms ease;
        }

        .temax-industries-section .tabs-box .content-box .link-box a:hover {
            background: var(--theme-color);
            color: #fff;
        }

        .temax-industries-section .tabs-box .content-box .link-box a i {
            position: relative;
            display: inline-block;
            width: auto;
            height: auto;
            line-height: 1;
            font-size: 15px;
            color: var(--theme-color);
            background: transparent;
            text-align: center;
            transition: color 300ms ease;
        }

        .temax-industries-section .tabs-box .content-box .link-box a:hover i {
            color: #fff;
            background: transparent;
        }

        /* Scoped styles for Services section */
        .temax-service-section .upper-box {
            position: relative;
            padding: 70px 40px 30px 40px;
        }

        .temax-service-section .single-service-box {
            position: relative !important;
            top: auto !important;
            right: auto !important;
            left: auto !important;
            bottom: auto !important;
            width: 100% !important;
            max-width: 375px;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            transition: transform 300ms ease, box-shadow 300ms ease;
        }

        .temax-service-section .single-service-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 36px rgba(0, 0, 0, 0.12);
        }

        .temax-service-section .single-service-box .inner-box {
            position: relative;
            display: block;
        }

        .temax-service-section .single-service-box .inner-box .image {
            position: relative;
            display: block;
            overflow: hidden;
        }

        .temax-service-section .single-service-box .inner-box .image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 500ms ease;
        }

        .temax-service-section .single-service-box:hover .inner-box .image img {
            transform: scale(1.04);
        }

        .temax-service-section .single-service-box .lower-content {
            position: relative;
            padding: 24px 28px 28px 28px;
            background: #ffffff;
        }

        .temax-service-section .single-service-box .lower-content h3 {
            font-size: 22px;
            line-height: 30px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--title-color, #1a1e21);
        }

        .temax-service-section .single-service-box .lower-content p {
            font-size: 14px;
            line-height: 22px;
            color: #66696b;
            margin-bottom: 18px;
        }

        .temax-service-section .single-service-box .lower-content a {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            line-height: 24px;
            color: var(--title-color, #1a1e21);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            transition: color 300ms ease;
        }

        .temax-service-section .single-service-box .lower-content a:hover {
            color: var(--theme-color);
        }

        .temax-service-section .single-service-box .lower-content a i {
            font-size: 18px;
            color: var(--theme-color);
            transition: transform 300ms ease;
        }

        .temax-service-section .single-service-box .lower-content a:hover i {
            transform: translateX(4px);
        }

        .temax-service-section .service-right-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
            padding-left: 15px;
        }

        .temax-service-section .service-right-inner .sec-title {
            flex: 1 1 340px;
            max-width: 440px;
            padding-left: 0 !important;
        }

        .temax-service-section .service-right-inner .sec-title h6 {
            position: relative;
            display: inline-block;
            font-size: 14px;
            line-height: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--theme-color);
            margin-bottom: 8px;
        }

        .temax-service-section .service-right-inner .sec-title h2 {
            font-size: 38px;
            line-height: 46px;
            font-weight: 700;
            color: var(--title-color, #1a1e21);
            margin-bottom: 12px;
        }

        .temax-service-section .service-right-inner .sec-title p {
            font-size: 15px;
            line-height: 24px;
            color: #66696b;
            margin: 0;
        }

        .temax-service-section .service-right-inner .count-box {
            flex: 0 0 auto;
            position: relative;
            min-width: 200px;
            padding-left: 10px;
        }

        .temax-service-section .service-right-inner .count-box h2 {
            font-size: 100px;
            line-height: 90px;
            font-weight: 700;
            color: var(--title-color, #1a1e21);
            margin-bottom: 6px;
        }

        .temax-service-section .service-right-inner .count-box h2 span {
            font-size: 52px;
            color: var(--theme-color);
        }

        .temax-service-section .service-right-inner .count-box h5 {
            font-size: 16px;
            line-height: 24px;
            font-weight: 600;
            color: #4b5259;
        }

        .temax-service-section .service-right-inner .count-box .shape {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 80px;
            height: 110px;
            background-repeat: no-repeat;
            background-size: contain;
            opacity: 0.35;
            pointer-events: none;
        }

        .temax-service-section .lower-box {
            position: relative;
            margin-right: 0 !important;
            padding-right: 0 !important;
            border-top: 1px solid #dbdfe3;
            padding-top: 30px;
            margin-top: 35px;
        }

        .temax-service-section .lower-box .owl-nav {
            position: absolute;
            top: -55px;
            right: 20px;
            left: auto !important;
            bottom: auto !important;
            display: flex;
            gap: 8px;
            z-index: 5;
        }

        .temax-service-section .lower-box .owl-nav button {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            line-height: 44px;
            background-color: #ffffff;
            border: 1px solid #dbdfe3;
            border-radius: 4px;
            text-align: center;
            font-size: 20px;
            color: #66696b;
            transition: all 300ms ease;
            cursor: pointer;
        }

        .temax-service-section .lower-box .owl-nav button.owl-prev {
            border-bottom: 1px solid #dbdfe3 !important;
        }

        .temax-service-section .lower-box .owl-nav button:hover {
            color: #ffffff;
            background-color: var(--theme-color);
            border-color: var(--theme-color);
        }

        /* Scoped styles for service-block-three cards in service-section */
        .temax-service-section .service-block-three {
            margin-bottom: 20px;
        }

        .temax-service-section .service-block-three .inner-box {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 440px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            padding: 34px 30px 36px 36px;
            margin-bottom: 0;
            overflow: hidden;
            transition: all 400ms ease;
        }

        .temax-service-section .service-block-three .inner-box:hover {
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.12);
        }

        .temax-service-section .service-block-three .inner-box h6 {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.08em;
            color: #a5aaaf;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .temax-service-section .service-block-three .inner-box .title-box {
            margin-bottom: 18px;
            padding-bottom: 18px;
        }

        .temax-service-section .service-block-three .inner-box .title-box h2 {
            font-size: 22px;
            line-height: 30px;
            font-weight: 700;
            min-height: 60px;
        }

        .temax-service-section .service-block-three .inner-box p {
            font-size: 14px;
            line-height: 24px;
            color: #66696b;
            margin-bottom: 24px;
            min-height: 72px;
        }

        .temax-service-section .service-block-three .inner-box .icon-box {
            background-color: #f0f4f8;
            color: var(--theme-color);
            transition: all 300ms ease;
        }

        .temax-service-section .service-block-three .inner-box .link-box a {
            background-color: #f0f4f8;
            color: var(--theme-color);
            border-radius: 4px;
            transition: all 300ms ease;
        }

        .temax-service-section .service-block-three .inner-box .link-box a:hover {
            background-color: var(--theme-color);
            color: #ffffff;
        }

        .temax-service-section .service-block-three .inner-box .overlay-content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: rgba(22, 26, 29, 0.94);
            border-radius: 8px;
            padding: 34px 30px 36px 36px;
        }

        .temax-service-section .service-block-three .inner-box .overlay-content .overlay-bg {
            opacity: 0.22;
        }

        .temax-service-section .service-block-three .inner-box .overlay-content .icon-box {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--theme-color);
        }

        .temax-service-section .service-block-three .inner-box .overlay-content h6 {
            color: #dbdfe3;
        }

        .temax-service-section .service-block-three .inner-box .overlay-content .title-box h2 a {
            color: #ffffff;
        }

        .temax-service-section .service-block-three .inner-box .overlay-content p {
            color: #c4c9ce;
        }

        .temax-service-section .service-block-three .inner-box .overlay-content .theme-btn.btn-three {
            background-color: var(--theme-color);
            color: #ffffff;
            border-radius: 4px;
            transition: all 300ms ease;
        }

        .temax-service-section .service-block-three .inner-box .overlay-content .theme-btn.btn-three i {
            color: #ffffff;
        }

        .temax-service-section .service-block-three .inner-box .overlay-content .theme-btn.btn-three:hover {
            background-color: #ffffff;
            color: var(--title-color);
        }

        .temax-service-section .service-block-three .inner-box .overlay-content .theme-btn.btn-three:hover i {
            color: var(--theme-color);
        }

        @media (max-width: 991px) {
            .temax-industries-section .single-box {
                margin-top: 24px;
                margin-bottom: 24px;
            }

            .temax-industries-section .content-column {
                justify-content: flex-start;
                margin-top: 24px;
            }

            .temax-industries-section .tabs-content,
            .temax-industries-section .tabs-box .content-box {
                max-width: 100%;
                padding: 34px 26px;
            }

            .temax-service-section .upper-box {
                padding: 45px 20px 20px 20px !important;
            }

            .temax-service-section .service-left-column {
                margin-bottom: 30px;
            }

            .temax-service-section .single-service-box {
                max-width: 100%;
                margin: 0 auto;
            }

            .temax-service-section .service-right-inner {
                padding-left: 0;
                gap: 20px;
            }

            .temax-service-section .service-right-inner .sec-title h2 {
                font-size: 32px;
                line-height: 40px;
            }

            .temax-service-section .service-right-inner .count-box h2 {
                font-size: 80px;
                line-height: 75px;
            }

            .temax-service-section .service-right-inner .count-box h2 span {
                font-size: 42px;
            }

            .temax-service-section .lower-box {
                margin-top: 25px;
                padding-top: 20px;
            }

            .temax-service-section .lower-box .owl-nav {
                display: none !important;
            }
        }

        @media (max-width: 575px) {
            .temax-service-section .service-right-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .temax-service-section .service-right-inner .count-box {
                min-width: 100%;
                padding-left: 0;
            }
        }

        /* About section image enhancements */
        .about-section .inner-content .image-box .image img {
            border-radius: 14px;
            box-shadow: 0 16px 40px rgba(15, 30, 45, 0.16);
            transition: transform 0.4s ease;
        }

        .about-section .inner-content .image-box:hover .image img {
            transform: scale(1.02);
        }

        .about-section .inner-content .award-box {
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
        }

        .about-section .inner-content .image-box .image-content {
            border-radius: 12px;
            box-shadow: 0 12px 32px rgba(15, 30, 45, 0.14);
        }

        @media (max-width: 1199px) {
            .about-section .inner-content .image-box {
                margin-left: 30px !important;
            }
            .about-section .inner-content .image-box .image img {
                max-width: 100% !important;
                float: none !important;
                height: auto !important;
                width: 100%;
            }
            .about-section .inner-content .award-box {
                left: -15px;
                top: 40px;
                z-index: 3;
            }
        }

        @media (max-width: 991px) {
            .about-section .inner-content .image-box {
                margin-left: 0 !important;
                margin-top: 30px;
            }
            .about-section .inner-content .image-box .image img {
                max-width: 100% !important;
                float: none !important;
                height: auto !important;
                width: 100%;
            }
            .about-section .inner-content .award-box {
                left: 15px;
                top: 20px;
                z-index: 3;
            }
        }

        @media (max-width: 575px) {
            .about-section .inner-content .award-box {
                top: 15px;
                left: 15px;
                padding: 14px 14px;
                width: 160px;
            }
            .about-section .inner-content .award-box h5 {
                font-size: 14px;
                line-height: 18px;
            }
            .about-section .inner-content .image-box .image-content {
                bottom: 15px;
                left: 15px;
                width: calc(100% - 30px);
                max-width: 320px;
                padding: 14px 18px;
            }
        }
        /* Clients Section Enhancement */
        .clients-section {
            padding: 95px 0px 105px 0px;
            background-color: #f7f9fb;
        }

        .clients-section .sec-title h2 {
            font-size: 38px;
            line-height: 48px;
        }

        .clients-section .inner-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(18, 38, 58, 0.04);
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .clients-section .clients-box {
            display: flex;
            flex-wrap: wrap;
        }

        .clients-section .clients-box .clients-logo {
            min-height: 125px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 26px;
        }

        .clients-section .clients-box .clients-logo a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .clients-section .clients-box .clients-logo img {
            max-height: 60px;
            max-width: 170px;
            width: auto;
            height: auto;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.75;
            transition: all 0.3s ease;
        }

        .clients-section .clients-box .clients-logo:hover img {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.08);
        }

        .clients-section .content-box {
            padding: 24px 10px;
            text-align: center;
        }

        .clients-section .content-box h3 {
            font-size: 22px;
            line-height: 30px;
            margin-bottom: 20px;
        }

        .clients-section .content-box .theme-btn {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            white-space: nowrap !important;
            flex-wrap: nowrap !important;
            text-wrap: nowrap !important;
            width: auto !important;
            min-width: 150px;
            max-width: 100%;
            padding: 13px 22px !important;
            font-size: 14px !important;
            line-height: 20px !important;
            letter-spacing: 0.5px;
            gap: 8px !important;
            border-radius: 4px;
        }

        .clients-section .content-box .theme-btn span {
            white-space: nowrap !important;
            text-wrap: nowrap !important;
            display: inline-block !important;
            flex-shrink: 0;
        }

        .clients-section .content-box .theme-btn i {
            font-size: 17px !important;
            flex-shrink: 0;
            top: 0 !important;
        }

        @media (max-width: 991px) {
            .clients-section .inner-container {
                padding: 20px 10px;
            }

            .clients-section .content-column {
                margin: 30px 0;
            }
        }
    </style>
@endpush

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
