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

    <!-- banner-section -->
    <section class="banner-section p_relative">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-2.png') }});"></div>
        <div class="banner-top-section">
            <div class="outer-container">
                <div class="based-content">
                    <div class="inner">
                        <div class="logo-box">
                            <figure class="logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/temax/logo.png') }}?v={{ file_exists(base_path('../assets/images/temax/logo.png')) ? filemtime(base_path('../assets/images/temax/logo.png')) : '2' }}" alt="{{ setting('site_name', 'TEMAX') }}"></a>
                            </figure>
                            <h5>Based In <br>Karur, India.</h5>
                        </div>
                        <div class="single-item">
                            <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-1.png') }});"></div>
                            <h2>30<span>+</span></h2>
                            <h5>Years in Furnace <br>Camera Systems.</h5>
                        </div>
                    </div>
                    <span class="rotate-text">Established Since, 1996</span>
                </div>
                <div class="inner-box">
                    <div class="content-box">
                        <div class="video-box">
                            <div class="bg-color"></div>
                            <div class="video-bg" style="background-image: url({{ asset('assets/images/temax/kiln-camera.jpg') }});"></div>
                        </div>
                        <h2>Experts <br>in <span>[Furnace Cameras]</span></h2>
                        <p>High-temperature imaging <br>for cement, thermal &amp; glass.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
            <div class="slide-item p_relative">
                <div class="pattern-layer-2" style="background-image: url({{ asset('assets/images/shape/shape-3.png') }});"></div>
                <div class="bg-layer" style="background-image: url({{ asset('assets/images/temax/kiln-camera.jpg') }});"></div>
                <div class="outer-container clearfix">
                    <div class="content-box">
                        <figure class="image-layer rotate-me"><img src="{{ asset('assets/images/resource/megnat-1.png') }}" alt=""></figure>
                        <div class="inner-box">
                            <h2>See <span>Inside Your <br>Furnace.</span></h2>
                            <p>Live, continuous furnace viewing — TEMAX
                                camera systems built for cement, thermal
                                and glass plants since 1996.</p>
                            <div class="btn-box"><a href="{{ route('services') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item p_relative">
                <div class="pattern-layer-2" style="background-image: url({{ asset('assets/images/shape/shape-3.png') }});"></div>
                <div class="bg-layer" style="background-image: url({{ asset('assets/images/temax/dispatch.jpg') }});"></div>
                <div class="outer-container clearfix">
                    <div class="content-box">
                        <figure class="image-layer rotate-me"><img src="{{ asset('assets/images/resource/megnat-1.png') }}" alt=""></figure>
                        <div class="inner-box">
                            <h2>Cooling &amp; <span>Retraction <br>Systems.</span></h2>
                            <p>SS 316 cooling and pneumatic auto
                                retraction protect camera and operator
                                in environments up to 2000&nbsp;°C.</p>
                            <div class="btn-box"><a href="{{ route('products') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item p_relative">
                <div class="pattern-layer-2" style="background-image: url({{ asset('assets/images/shape/shape-3.png') }});"></div>
                <div class="bg-layer" style="background-image: url({{ asset('assets/images/temax/thermal-camera.jpg') }});"></div>
                <div class="outer-container clearfix">
                    <div class="content-box">
                        <figure class="image-layer rotate-me"><img src="{{ asset('assets/images/resource/megnat-1.png') }}" alt=""></figure>
                        <div class="inner-box">
                            <h2>Thermal <span>Kiln Shell <br>Monitoring.</span></h2>
                            <p>Temperature-reading thermal cameras track
                                hot spots and coating loss across the
                                entire kiln length.</p>
                            <div class="btn-box"><a href="{{ route('projects') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-right-content">
            <div class="inner-box">
                <div class="mail-box">
                    <a href="mailto:{{ setting('email') }}"><i class="flaticon-share"></i><span>{{ setting('email') }}</span></a>
                </div>
                @php
                    $bannerSocials = array_filter([
                        'facebook'  => setting('facebook'),
                        'twitter'   => setting('twitter'),
                        'instagram' => setting('instagram'),
                        'linkedin'  => setting('linkedin'),
                        'youtube'   => setting('youtube'),
                    ]);
                    $bannerSocialIcons = [
                        'facebook'  => 'flaticon-facebook',
                        'twitter'   => 'flaticon-twitter',
                        'instagram' => 'flaticon-instagram-logo',
                        'linkedin'  => 'flaticon-linkedin',
                        'youtube'   => 'flaticon-youtube',
                    ];
                @endphp
                @if (!empty($bannerSocials))
                    <ul class="social-links">
                        <li><h5>On Socials</h5></li>
                        @foreach ($bannerSocials as $network => $socialUrl)
                            <li><a href="{{ $socialUrl }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($network) }}"><i class="{{ $bannerSocialIcons[$network] }}"></i></a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- intro-section -->
    <section class="intro-section pt_75">
        <div class="outer-container p_relative pl_75 pr_75">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 intro-block">
                    <div class="intro-block-one">
                        <div class="inner-box">
                            <div class="content-box">
                                <div class="icon-box">
                                    <div class="icon"><img src="{{ asset('assets/images/icons/icon-2.png') }}" alt=""></div>
                                    <div class="overlay-icon"><img src="{{ asset('assets/images/icons/icon-1.png') }}" alt=""></div>
                                </div>
                                <div class="text-box">
                                    <h6>Our</h6>
                                    <h3>Identity</h3>
                                    <p>Furnace Cameras <br>Since 1996.</p>
                                </div>
                            </div>
                            <div class="image-box">
                                <span class="rotate-text">&nbsp;About&nbsp;us&nbsp;</span>
                                <div class="bar-box">
                                    <div class="bar bar-1"></div>
                                    <div class="bar bar-2"></div>
                                    <div class="bar bar-3"></div>
                                </div>
                                <figure class="image"><img src="{{ asset('assets/images/resource/intro-1.png') }}" alt="TEMAX identity"></figure>
                                <div class="link-box">
                                    <a href="{{ route('about') }}"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 intro-block">
                    <div class="intro-block-one">
                        <div class="inner-box">
                            <div class="content-box">
                                <div class="icon-box">
                                    <div class="icon"><img src="{{ asset('assets/images/icons/icon-4.png') }}" alt=""></div>
                                    <div class="overlay-icon"><img src="{{ asset('assets/images/icons/icon-3.png') }}" alt=""></div>
                                </div>
                                <div class="text-box">
                                    <h6>Our</h6>
                                    <h3>Stability</h3>
                                    <p>90% Made <br>in India.</p>
                                </div>
                            </div>
                            <div class="image-box">
                                <span class="rotate-text">Made&nbsp;in&nbsp;India</span>
                                <div class="bar-box">
                                    <div class="bar bar-1"></div>
                                    <div class="bar bar-2"></div>
                                    <div class="bar bar-3"></div>
                                </div>
                                <figure class="image"><img src="{{ asset('assets/images/resource/intro-2.png') }}" alt="Made in India"></figure>
                                <div class="link-box">
                                    <a href="{{ route('about') }}"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 intro-block">
                    <div class="intro-block-one">
                        <div class="inner-box">
                            <div class="content-box">
                                <div class="icon-box">
                                    <div class="icon"><img src="{{ asset('assets/images/icons/icon-5.png') }}" alt=""></div>
                                    <div class="overlay-icon"><img src="{{ asset('assets/images/icons/icon-6.png') }}" alt=""></div>
                                </div>
                                <div class="text-box">
                                    <h6>Our</h6>
                                    <h3>Technology</h3>
                                    <p>HD, Thermal <br>&amp; Custom Builds.</p>
                                </div>
                            </div>
                            <div class="image-box">
                                <span class="rotate-text">Innovation</span>
                                <div class="bar-box">
                                    <div class="bar bar-1"></div>
                                    <div class="bar bar-2"></div>
                                    <div class="bar bar-3"></div>
                                </div>
                                <figure class="image"><img src="{{ asset('assets/images/resource/intro-3.png') }}" alt="Innovation"></figure>
                                <div class="link-box">
                                    <a href="{{ route('products') }}"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro-section end -->

    <!-- about-section -->
    <section class="about-section pt_120 pb_120">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-4.png') }});"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title mb_45">
                            <h6>About Us</h6>
                            <h2>Leader in <span class="text-nowrap">[Furnace&nbsp;Camera]</span> Manufacturing</h2>
                        </div>
                        <div class="inner-box">
                            <div class="single-team">
                                <h3>Engineered in Karur</h3>
                                <div class="link align-3"><a href="{{ route('about') }}"><i class="flaticon-right-arrow"></i></a></div>
                                <span class="rotate-text">Founder &amp; Leader</span>
                                <figure class="image-box"><img src="{{ asset('assets/images/resource/team-1.png') }}" alt="TEMAX founder &amp; leader"></figure>
                            </div>
                            <div class="text-box">
                                <h3>Three Decades of Furnace Viewing</h3>
                                <p>Since 1996 TEMAX has manufactured high-temperature
                                    furnace camera systems in Karur, Tamil Nadu — with
                                    90% of production in India, all spares available
                                    locally and customisation on demand.</p>
                                <a href="{{ route('about') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 inner-column">
                    <div class="inner-content">
                        <div class="award-box">
                            <ul class="icon-list">
                                <li><i class="flaticon-iso"></i></li>
                                <li><i class="flaticon-trophy"></i></li>
                            </ul>
                            <h5>Proudly Made in India.</h5>
                        </div>
                        <div class="image-box">
                            <figure class="image clearfix"><img src="{{ asset('assets/images/temax/production-unit-2.jpg') }}?v={{ file_exists(base_path('../assets/images/temax/production-unit-2.jpg')) ? filemtime(base_path('../assets/images/temax/production-unit-2.jpg')) : '2' }}" alt="TEMAX production unit"></figure>
                            <div class="image-content">
                                <div class="text-box">
                                    <h2>30<span>+</span></h2>
                                    <h5>Years of Experience.</h5>
                                </div>
                                <div class="video-box">
                                    <h5>Our&nbsp;Story</h5>
                                    <a href="{{ route('about') }}"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->

    <!-- service-section -->
    <section class="service-section temax-service-section">
        <div class="bg-layer" style="background-image: url({{ asset('assets/images/background/service-bg.jpg') }});"></div>
        <div class="auto-container">
            <div class="inner-container">
                <div class="upper-box">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 col-sm-12 service-left-column">
                            <div class="single-service-box">
                                <div class="inner-box">
                                    <figure class="image"><img src="{{ asset('assets/images/resource/service-1.png') }}" alt="Discover Our Complete Service Range"></figure>
                                    <div class="lower-content">
                                        <h3>Discover Our Complete Service Range.</h3>
                                        <p>Six product lines for high-temperature viewing.</p>
                                        <a href="{{ route('services') }}"><i class="flaticon-right-arrow"></i><span>All Services</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 service-right-column">
                            <div class="service-right-inner">
                                <div class="sec-title">
                                    <h6>{!! setting('services_subtitle', 'What we offer') !!}</h6>
                                    <h2>{!! setting('services_title', 'Our services &amp; solutions') !!}</h2>
                                    <p class="mt_12">Furnace cameras, cooling, retraction and thermal systems.</p>
                                </div>
                                <div class="count-box align-3">
                                    <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-5.png') }});"></div>
                                    <h2>90<span>%</span></h2>
                                    <h5>Made in India <br>with Precision.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lower-box">
                    <div class="three-item-carousel owl-carousel owl-theme owl-dots-none">
                        @foreach ($homeServices as $service)
                            <div class="service-block-three">
                                <div class="inner-box">
                                    <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-19.png') }});"></div>
                                    <div class="icon-box"><i class="{{ $serviceIcons[$loop->index % count($serviceIcons)] }}"></i></div>
                                    <h6>Service {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</h6>
                                    <div class="title-box">
                                        <div class="title-shape"></div>
                                        <h2><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></h2>
                                    </div>
                                    <p>{{ \Illuminate\Support\Str::limit($service->summary, 110) }}</p>
                                    <div class="link-box"><a href="{{ route('services.show', $service->slug) }}"><i class="flaticon-right-arrow"></i></a></div>
                                    <div class="overlay-content">
                                        <div class="overlay-bg" style="background-image: url({{ asset($service->image ?: 'assets/images/resource/block-bg.jpg') }});"></div>
                                        <div class="icon-box"><i class="{{ $serviceIcons[$loop->index % count($serviceIcons)] }}"></i></div>
                                        <h6>Service {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</h6>
                                        <div class="title-box">
                                            <div class="title-shape"></div>
                                            <h2><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></h2>
                                        </div>
                                        <p>{{ \Illuminate\Support\Str::limit($service->summary, 110) }}</p>
                                        <div class="btn-box"><a href="{{ route('services.show', $service->slug) }}" class="theme-btn btn-three"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-section end -->

    <!-- industries-section -->
    <section class="industries-section temax-industries-section">
        <div class="bg-layer" style="background-image: url({{ asset('assets/images/background/industries-bg.png') }});"></div>
        <div class="auto-container">
            <div class="sec-title mb_45">
                <h6>Industries Served</h6>
                <h2>Serving Diverse <span>[Sectors]</span></h2>
                <a href="{{ route('projects') }}"><i class="flaticon-right-arrow"></i><span>All Projects</span></a>
            </div>
            <div class="inner-container">
                <div class="tabs-box">
                    <div class="row clearfix align-items-start">
                        <div class="col-lg-6 col-md-12 col-sm-12 big-column">
                            <div class="tab-btn-box">
                                <ul class="tab-btns tab-buttons clearfix">
                                    @foreach ($industries as $index => $industry)
                                        <li class="tab-btn {{ $index === 0 ? 'active-btn' : '' }}" data-tab="#ind-tab-{{ $index + 1 }}">{{ $industry['name'] }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="single-box">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{ asset('assets/images/temax/power-600mw.jpg') }}" alt="600MW power plant camera system"></figure>
                                    <div class="lower-content">
                                        <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-7.png') }});"></div>
                                        <h2>600<span>MW</span></h2>
                                        <h5>Utility Power Plant <br>Camera System.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="tabs-content">
                                @foreach ($industries as $index => $industry)
                                    <div class="tab {{ $index === 0 ? 'active-tab' : '' }}" id="ind-tab-{{ $index + 1 }}">
                                        <div class="content-box">
                                            <h6>Industry {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</h6>
                                            <h3>{{ $industry['name'] }}</h3>
                                            <p>{{ $industry['text'] }}</p>
                                            <ul class="list-item clearfix">
                                                @foreach ($industry['points'] as $point)
                                                    <li>{!! $point !!}</li>
                                                @endforeach
                                                <li><a href="{{ route('projects') }}">and More....</a></li>
                                            </ul>
                                            <div class="link-box">
                                                <a href="{{ route('projects') }}"><i class="flaticon-right-arrow"></i><span>Find More About
                                                    <br>Industry</span></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-box">
                <div class="text-box">
                    <h2>Every Industry,</h2>
                    <h3>Tailored Furnace Camera Solutions.</h3>
                </div>
                <div class="right-column">
                    <div class="link-box">
                        <a href="{{ route('contact') }}"><i class="flaticon-calendar"></i><span>Make an <br>Appointment</span></a>
                    </div>
                    <div class="btn-box">
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}" class="theme-btn btn-three"><i class="flaticon-phone"></i><span>{{ setting('phone_display', setting('phone')) }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- industries-section end -->

    <!-- project-section -->
    <section class="project-section">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{ asset('assets/images/shape/shape-8.png') }});"></div>
            <div class="pattern-2 float-bob-y" style="background-image: url({{ asset('assets/images/shape/shape-9.png') }});"></div>
        </div>
        <div class="auto-container">
            <div class="upper-box mb_50 p_relative">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12 col-sm-12 count-column">
                        <div class="count-box align-3">
                            <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-5.png') }});"></div>
                            <h2>{{ $homeProjects->count() }}<span>+</span></h2>
                            <h5>Installations Across <br>Multiple Industries.</h5>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 title-column">
                        <div class="sec-title">
                            <h6>{!! setting('projects_subtitle', 'Our track record') !!}</h6>
                            <h2>{!! setting('projects_title', 'Projects &amp; installations') !!}</h2>
                            <p class="mt_12">Real TEMAX cameras working in plants across India.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-container">
                <div class="project-tab">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-12 col-sm-12 btn-column">
                            <div class="tab-btn-box z_99">
                                <ul class="tab-btns product-tab-btns clearfix">
                                    @foreach ($projectGroups as $groupName => $groupProjects)
                                        <li class="p-tab-btn {{ $loop->first ? 'active-btn' : '' }}" data-tab="#proj-{{ \Illuminate\Support\Str::slug($groupName) }}"><h6>{{ $groupName }}</h6></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 content-column">
                            <div class="p-tabs-content">
                                @foreach ($projectGroups as $groupName => $groupProjects)
                                    <div class="p-tab {{ $loop->first ? 'active-tab' : '' }}" id="proj-{{ \Illuminate\Support\Str::slug($groupName) }}">
                                        <div class="single-item-carousel owl-carousel owl-theme nav-style-one">
                                            @forelse ($groupProjects as $project)
                                                <div class="project-block-one">
                                                    <div class="inner-box">
                                                        <div class="bg-layer" style="background-image: url({{ asset(optional($project->images->first())->path ?: 'assets/images/project/project-1.jpg') }});"></div>
                                                        <span class="category">{{ $project->type ?: 'Project' }}</span>
                                                        <div class="content-box">
                                                            <h3>{{ $project->title }}</h3>
                                                            <p>{{ \Illuminate\Support\Str::limit($project->text, 90) }}</p>
                                                            <h6>Location</h6>
                                                            <span class="text">{{ $project->place }}</span>
                                                            <a href="{{ route('projects.show', $project->id) }}"><i class="flaticon-right-arrow"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="project-block-one">
                                                    <div class="inner-box">
                                                        <div class="bg-layer" style="background-image: url({{ asset('assets/images/project/project-1.jpg') }});"></div>
                                                        <span class="category">TEMAX</span>
                                                        <div class="content-box">
                                                            <h3>Projects Coming Soon</h3>
                                                            <p>New installations are being added to this section.</p>
                                                            <h6>Contact</h6>
                                                            <span class="text">{{ setting('email') }}</span>
                                                            <a href="{{ route('contact') }}"><i class="flaticon-right-arrow"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-section end -->

    <!-- working-section -->
    <section class="working-section">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-10.png') }});"></div>
        <div class="line-shape">
            <div class="line-1"></div>
            <div class="line-2"></div>
        </div>
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                    <div class="left-content pr_100">
                        <div class="sec-title light mb_45">
                            <h6>How we Work</h6>
                            <h2>From Enquiry to <span>[Installation]</span></h2>
                            <p class="mt_12">Design, build and install — all under one roof.</p>
                        </div>
                        <div class="inner-box">
                            <h4>Deliver <br>Excellence In</h4>
                            <h2>{{ $workingSteps->count() }}</h2>
                            <div class="single-box">
                                <div class="inner">
                                    <a href="{{ route('contact') }}"><i class="flaticon-right-arrow"></i></a>
                                    <h5>Simple, Proven,
                                    Innovative
                                   Steps</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 right-column">
                    <div class="right-content pl_100 pt_13 pb_10">
                        @if ($workingSteps->count())
                            <div class="tabs-box">
                                <ul class="tab-btns tab-buttons clearfix">
                                    @foreach ($workingSteps as $step)
                                        <li class="tab-btn {{ $loop->first ? 'active-btn' : '' }}" data-tab="#work-tab-{{ $loop->iteration }}">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</li>
                                    @endforeach
                                </ul>
                                <div class="tabs-content">
                                    @foreach ($workingSteps as $step)
                                        @php
                                            $nextStep = $workingSteps[($loop->index + 1) % $workingSteps->count()];
                                        @endphp
                                        <div class="tab {{ $loop->first ? 'active-tab' : '' }}" id="work-tab-{{ $loop->iteration }}">
                                            <div class="content-box">
                                                <span class="rotate-text">Step {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                                <h2>{{ $step->title }}</h2>
                                                <h6>{{ $step->text }}</h6>
                                                <figure class="image-box"><img src="{{ asset('assets/images/temax/production-unit.jpg') }}" alt="{{ $step->title }}"></figure>
                                                <h3>Details</h3>
                                                <p>{{ $step->text }}</p>
                                                <h2>{{ $nextStep->title }}</h2>
                                                <h6>{{ $nextStep->text }}</h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- working-section end -->

    <!-- chooseus-section -->
    <section class="chooseus-section">
        <div class="auto-container">
            <div class="sec-title centred mb_45">
                <h6>Why Choose Us</h6>
                <h2>Top Reasons to <span>[Choose]</span> Us</h2>
                <p class="mt_12">Three decades of furnace viewing expertise.</p>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape" style="background-image: url({{ asset('assets/images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-manufacturing"></i></div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="{{ route('about') }}">Furnace Camera Specialists</a></h3>
                            <p>Three decades of high-temperature viewing experience across cement, thermal and glass plants.</p>
                            <div class="link"><a href="{{ route('about') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape" style="background-image: url({{ asset('assets/images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-engineer"></i></div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="{{ route('about') }}">90% Made in India</a></h3>
                            <p>Main modules only imported — all spares available locally with immediate support.</p>
                            <div class="link"><a href="{{ route('about') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape" style="background-image: url({{ asset('assets/images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-manufacturing-1"></i></div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="{{ route('services') }}">Built for 2000&nbsp;°C</a></h3>
                            <p>Air and water cooled camera systems rated for the toughest furnace environments.</p>
                            <div class="link"><a href="{{ route('services') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape" style="background-image: url({{ asset('assets/images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-goal"></i></div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="{{ route('contact') }}">Cost-Effective Spares</a></h3>
                            <p>Economical, locally available spares keep your running costs down.</p>
                            <div class="link"><a href="{{ route('contact') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape" style="background-image: url({{ asset('assets/images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-test"></i></div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="{{ route('about') }}">Quality Assurance</a></h3>
                            <p>Every unit is built and tested at the TEMAX production unit in Karur.</p>
                            <div class="link"><a href="{{ route('about') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape" style="background-image: url({{ asset('assets/images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-certificate"></i></div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="{{ route('projects') }}">First for Kiln Cameras</a></h3>
                            <p>Developed the first furnace camera for kiln application in 2016.</p>
                            <div class="link"><a href="{{ route('projects') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-section end -->

    @if(isset($testimonials) && $testimonials->count())
    <!-- testimonial-section -->
    <section class="testimonial-section">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-13.png') }});"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                    <div class="left-content">
                        <figure class="image"><img src="{{ asset('assets/images/resource/men-1.png') }}" alt="TEMAX Client Reviews"></figure>
                        <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-12.png') }});"></div>
                        <div class="rating-box">
                            <h5>5.0</h5>
                            <div class="inner">
                                <ul class="rating"> 
                                    <li><i class="flaticon-star"></i></li>
                                    <li><i class="flaticon-star"></i></li>
                                    <li><i class="flaticon-star"></i></li>
                                    <li><i class="flaticon-star"></i></li>
                                    <li><i class="flaticon-star"></i></li>
                                </ul>
                                <h6>From 100+ Plants</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 right-column">
                    <div class="right-content">
                        <div class="sec-title light mb_25">
                            <h6>{{ setting('testimonials_subtitle', 'Testimonials') }}</h6>
                            <h2>{!! setting('testimonials_title', 'What our customers <br> say about us') !!}</h2>
                        </div>
                        <div class="tabs-box">
                            <div class="tabs-content">
                                @foreach($testimonials as $index => $item)
                                    <div class="tab {{ $index === 0 ? 'active-tab' : '' }}" id="testimonial-tab-{{ $item->id }}">
                                        <div class="testimonial-content">
                                            <div class="icon-box"><img src="{{ asset('assets/images/icons/icon-7.png') }}" alt="Quote"></div>
                                            @if($item->title)
                                                <h2>{{ $item->title }}</h2>
                                            @endif
                                            <p>{{ $item->content }}</p>
                                            <h3>{{ $item->name }}</h3>
                                            @if($item->designation || $item->company)
                                                <span class="designation">{{ $item->designation }}{{ $item->designation && $item->company ? ' — ' : '' }}{{ $item->company }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <ul class="tab-btns tab-buttons clearfix">
                                @foreach($testimonials as $index => $item)
                                    <li class="tab-btn {{ $index === 0 ? 'active-btn' : '' }}" data-tab="#testimonial-tab-{{ $item->id }}">
                                        <img src="{{ asset($item->avatar ?: 'assets/images/resource/testimonial-' . (($index % 5) + 1) . '.png') }}" alt="{{ $item->name }}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->
    @endif

    @if(isset($clients) && $clients->count())
    <!-- clients-section -->
    <section class="clients-section centred">
        <div class="auto-container">
            <div class="sec-title mb_45">
                <h6>{{ setting('clients_subtitle', 'Customers') }}</h6>
                <h2>{!! setting('clients_title', 'Our Valued <span>[Customers]</span>') !!}</h2>
                <p class="mt_12">{{ setting('clients_tagline', 'Delivering quality, innovation, and precision.') }}</p>
            </div>
            <div class="inner-container">
                <div class="row align-items-center">
                    @php
                        $half = ceil($clients->count() / 2);
                        $col1 = $clients->slice(0, $half);
                        $col2 = $clients->slice($half);
                    @endphp
                    <div class="col-lg-5 col-md-12 col-sm-12 clients-column">
                        <div class="clients-box clearfix">
                            @foreach($col1 as $c)
                                <figure class="clients-logo">
                                    @if($loop->iteration <= 2)<div class="border-bottom"></div>@endif
                                    <div class="border-right"></div>
                                    <a href="{{ $c->url ?: 'javascript:void(0);' }}" title="{{ $c->name }}" {{ $c->url ? 'target="_blank" rel="noopener"' : '' }}>
                                        <img src="{{ asset($c->logo) }}" alt="{{ $c->name }}">
                                    </a>
                                </figure>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h3>Strategic 
                                <span>Partnerships</span> 
                                with 100+ 
                                <span>Global Leaders</span></h3>
                            <a href="{{ route('contact') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Contact Us</span></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 clients-column">
                        <div class="clients-box clearfix">
                            @foreach($col2 as $c)
                                <figure class="clients-logo">
                                    @if($loop->iteration <= 2)<div class="border-bottom"></div>@endif
                                    <div class="border-left"></div>
                                    <a href="{{ $c->url ?: 'javascript:void(0);' }}" title="{{ $c->name }}" {{ $c->url ? 'target="_blank" rel="noopener"' : '' }}>
                                        <img src="{{ asset($c->logo) }}" alt="{{ $c->name }}">
                                    </a>
                                </figure>
                            @endforeach
                        </div>
                    </div>
                </div>
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

        @media (max-width: 991px) {
            .about-section .inner-content .image-box .image img {
                max-width: 100% !important;
                float: none !important;
                height: auto !important;
                width: 100%;
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
            padding: 30px 15px;
        }

        .clients-section .content-box h3 {
            font-size: 22px;
            line-height: 30px;
            margin-bottom: 20px;
        }

        /* Testimonial Section Adjustments */
        .testimonial-section {
            padding: 10px 0;
        }

        .testimonial-section .right-content .sec-title h2 {
            font-size: 34px;
            line-height: 44px;
            margin-bottom: 24px;
        }

        .testimonial-section .right-content .testimonial-content .icon-box {
            width: 76px;
            height: 76px;
            line-height: 76px;
            margin-bottom: 24px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .testimonial-section .right-content .testimonial-content .icon-box img {
            max-width: 36px;
        }

        .testimonial-section .right-content .testimonial-content h2 {
            font-size: 26px;
            line-height: 34px;
            margin-bottom: 16px;
            max-width: 100%;
            color: #fff;
        }

        .testimonial-section .right-content .testimonial-content p {
            font-size: 17px;
            line-height: 29px;
            color: #cbd5e1;
        }

        .testimonial-section .right-content .testimonial-content h3 {
            font-size: 20px;
            color: #fff;
            margin-top: 18px;
        }

        .testimonial-section .right-content .testimonial-content .designation {
            font-size: 13.5px;
            color: var(--theme-color);
            letter-spacing: 0.5px;
            margin-top: 4px;
        }

        .testimonial-section .right-content .tab-btns {
            margin-top: 32px;
        }

        .testimonial-section .right-content .tab-btns li {
            width: 64px;
            height: 64px;
            overflow: hidden;
        }

        .testimonial-section .right-content .tab-btns li img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
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
