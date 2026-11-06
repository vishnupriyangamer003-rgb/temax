@extends('layouts.app')

@section('title', 'About TEMAX - Furnace Camera Manufacturer Since 1996, Karur')
@section('meta_description', 'Learn about TEMAX, established in 1996 in Karur, Tamil Nadu. 90% Indian manufacturing of industrial furnace camera systems with local spares and immediate technical support.')

@section('content')

    @include('partials.page-title', ['pageTitle' => 'About Us'])

    <!-- about-style-three -->
    <section class="about-style-three alternat-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box temax-about-gallery">
                        <figure class="image image-1"><img src="{{ asset('assets/images/temax/production-unit.jpg') }}" alt="TEMAX production unit"></figure>
                        <figure class="image image-2"><img src="{{ asset('assets/images/temax/control-panel.jpg') }}" alt="TEMAX control panel"></figure>
                        <figure class="image image-3"><img src="{{ asset('assets/images/temax/camera-tube.jpg') }}" alt="TEMAX furnace camera tube"></figure>
                        <span class="rotate-text">Since, 1996</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title mb_20">
                            <h6>About Us</h6>
                            <h2>Leader in <span class="text-nowrap">[Furnace&nbsp;Camera]</span> Manufacturing</h2>
                        </div>
                        <div class="text-box mb_25">
                            <p>Founded in 1996 in Karur, Tamil Nadu, TEMAX manufactures high-temperature
                                furnace camera systems, cooling systems, auto retraction systems and
                                thermal cameras for the cement, thermal and glass industries.</p>
                        </div>
                        <div class="inner-box">
                            <div class="row align-items-stretch clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 left-column">
                                    <div class="left-content">
                                        <div class="icon-box"><i class="flaticon-manufacturing"></i></div>
                                        <h3>Industry Expertise</h3>
                                        <p>Three decades of high-temperature
                                            viewing experience across India...</p>
                                        <ul class="list-item clearfix">
                                            <li><img src="{{ asset('assets/images/icons/icon-27.png') }}" alt=""><span>Furnace camera specialists since 1996</span></li>
                                            <li><img src="{{ asset('assets/images/icons/icon-27.png') }}" alt=""><span>Cement, thermal &amp; glass plants</span></li>
                                            <li><img src="{{ asset('assets/images/icons/icon-27.png') }}" alt=""><span>90% made in India</span></li>
                                        </ul>
                                        <div class="btn-box"><a href="{{ route('services') }}" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 award-column">
                                    <div class="award-box">
                                        <h4>Milestone</h4>
                                        <div class="award-image align-3"><img src="{{ asset('assets/images/icons/award-2.png') }}" alt=""></div>
                                        <h6>2016</h6>
                                        <h5>First Furnace Camera
                                            for Kiln Application</h5>
                                        <span class="text">developed by TEMAX</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-style-three end -->


    <!-- history-section -->
    <section class="history-section bg-color-1">
        <div class="outer-container">
            <div class="sec-title centred mb_45 pl_15 pr_15">
                <h6>History</h6>
                <h2>A <span>[Timeline]</span> of Furnace <br>&amp; Camera Innovation</h2>
            </div>
            <div class="tabs-box">
                <div class="tabs-content">
                    <div class="tab active-tab" id="hist-tab-1">
                        <div class="tabs-inner">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <figure class="image-box"><img src="{{ asset('assets/images/resource/history-1.jpg') }}" alt="Founded 1996"></figure>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="title-text">
                                            <div class="title-shape"></div>
                                            <h2>Foundation Year 1996</h2>
                                        </div>
                                        <p>TEMAX was established in Karur, Tamil Nadu as a furnace camera
                                            manufacturing company — building high-temperature viewing systems
                                            for Indian industry with a focus on precision, quality and
                                            meeting client needs.</p>
                                        <h5>From a workshop to a trusted name, built on precision and passion.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab" id="hist-tab-2">
                        <div class="tabs-inner">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <figure class="image-box"><img src="{{ asset('assets/images/resource/history-2.jpg') }}" alt="First kiln camera 2016"></figure>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="title-text">
                                            <div class="title-shape"></div>
                                            <h2>First Kiln Camera 2016</h2>
                                        </div>
                                        <p>TEMAX developed the first furnace camera for kiln application in
                                            2016 — giving cement plant operators their first live view inside
                                            the kiln and starting the range of retrofit, cowl shell and under
                                            grate cameras that followed.</p>
                                        <h5>A reference installation that started the TEMAX furnace camera range.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab" id="hist-tab-3">
                        <div class="tabs-inner">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <figure class="image-box"><img src="{{ asset('assets/images/resource/history-3.jpg') }}" alt="TEMAX today"></figure>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="title-text">
                                            <div class="title-shape"></div>
                                            <h2>Three Decades Today</h2>
                                        </div>
                                        <p>With 90% of production in India, all spares available locally and
                                            customisation possible with immediate support, TEMAX cameras now
                                            run in cement, thermal and glass plants — including 600MW utility
                                            power plants across the country.</p>
                                        <h5>Thirty years of furnace viewing expertise, made in India.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-btn-box">
                    <ul class="tab-btns tab-buttons">
                        <li class="tab-btn active-btn" data-tab="#hist-tab-1">1996</li>
                        <li class="tab-btn" data-tab="#hist-tab-2">2016</li>
                        <li class="tab-btn" data-tab="#hist-tab-3">Today</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- history-section end -->


    <!-- company-section -->
    <section class="company-section temax-company-redesign">
        <div class="bg-layer" style="background-image: url({{ asset('assets/images/background/company-bg.jpg') }});"></div>
        <div class="bg-overlay"></div>
        <div class="auto-container">
            <div class="company-header-wrap mb_50">
                <div class="row align-items-end clearfix">
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="sec-title light mb_0">
                            <h6>Company</h6>
                            <h2>Driven by Innovation, <br><span>[Built on Trust]</span></h2>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="company-header-desc">
                            <p>Three decades of high-temperature imaging expertise — delivering reliable in-furnace visibility, rapid local spares, and round-the-clock plant support across India.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix d-flex flex-wrap">
                <!-- Our Company -->
                <div class="col-lg-4 col-md-6 col-sm-12 temax-card-col mb_30">
                    <div class="temax-company-card">
                        <div class="card-inner">
                            <div class="card-top-bar">
                                <div class="card-icon-box">
                                    <i class="flaticon-factory-1"></i>
                                </div>
                                <span class="card-number">01</span>
                            </div>

                            <div class="card-title-group">
                                <span class="card-tag">about</span>
                                <h3 class="card-heading">Our Company</h3>
                            </div>

                            <p class="card-description">
                                A furnace camera manufacturer based in Karur, Tamil Nadu — building high-temperature imaging systems for cement, thermal and glass plants since 1996.
                            </p>

                            <div class="card-feature-box">
                                <h4 class="feature-box-title">
                                    <span class="feature-dot"></span>
                                    What we build
                                </h4>
                                <ul class="feature-items">
                                    <li><i class="flaticon-check"></i><span>Furnace Camera Systems</span></li>
                                    <li><i class="flaticon-check"></i><span>Cooling &amp; Retraction Systems</span></li>
                                    <li><i class="flaticon-check"></i><span>Thermal Camera Systems</span></li>
                                </ul>
                            </div>

                            <div class="card-action">
                                <a href="{{ route('services') }}" class="card-action-btn">
                                    <span>Read More</span>
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Our Mission -->
                <div class="col-lg-4 col-md-6 col-sm-12 temax-card-col mb_30">
                    <div class="temax-company-card">
                        <div class="card-inner">
                            <div class="card-top-bar">
                                <div class="card-icon-box">
                                    <i class="flaticon-goal"></i>
                                </div>
                                <span class="card-number">02</span>
                            </div>

                            <div class="card-title-group">
                                <span class="card-tag">about</span>
                                <h3 class="card-heading">Our Mission</h3>
                            </div>

                            <p class="card-description">
                                To give every plant safe, reliable and continuous visibility inside its furnace — with technology that is economical, serviceable locally and built to last.
                            </p>

                            <div class="card-feature-box">
                                <h4 class="feature-box-title">
                                    <span class="feature-dot"></span>
                                    Our promise
                                </h4>
                                <ul class="feature-items">
                                    <li><i class="flaticon-check"></i><span>Immediate Support</span></li>
                                    <li><i class="flaticon-check"></i><span>Locally Available Spares</span></li>
                                    <li><i class="flaticon-check"></i><span>Customisation on Demand</span></li>
                                </ul>
                            </div>

                            <div class="card-action">
                                <a href="{{ route('contact') }}" class="card-action-btn">
                                    <span>Read More</span>
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Our Vision -->
                <div class="col-lg-4 col-md-6 col-sm-12 temax-card-col mb_30">
                    <div class="temax-company-card">
                        <div class="card-inner">
                            <div class="card-top-bar">
                                <div class="card-icon-box">
                                    <i class="flaticon-business-vision"></i>
                                </div>
                                <span class="card-number">03</span>
                            </div>

                            <div class="card-title-group">
                                <span class="card-tag">about</span>
                                <h3 class="card-heading">Our Vision</h3>
                            </div>

                            <p class="card-description">
                                To lead the industry with innovative, Made-in-India furnace viewing technology that keeps Indian plants competitive, safe and efficient.
                            </p>

                            <div class="card-feature-box">
                                <h4 class="feature-box-title">
                                    <span class="feature-dot"></span>
                                    Our direction
                                </h4>
                                <ul class="feature-items">
                                    <li><i class="flaticon-check"></i><span>Innovation in Imaging</span></li>
                                    <li><i class="flaticon-check"></i><span>90% Made in India</span></li>
                                    <li><i class="flaticon-check"></i><span>Quality Assurance</span></li>
                                </ul>
                            </div>

                            <div class="card-action">
                                <a href="{{ route('projects') }}" class="card-action-btn">
                                    <span>Read More</span>
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- company-section end -->


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
                                    <div class="tab {{ $index === 0 ? 'active-tab' : '' }}" id="about-testimonial-tab-{{ $item->id }}">
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
                                    <li class="tab-btn {{ $index === 0 ? 'active-btn' : '' }}" data-tab="#about-testimonial-tab-{{ $item->id }}">
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


    <!-- features-section -->
    <section class="features-section">
        <div class="bg-layer" style="background-image: url({{ asset('assets/images/background/feature-bg.jpg') }});"></div>
        <div class="auto-container">
            <div class="title-box mb_50">
                <div class="sec-title">
                    <h6>Features</h6>
                    <h2>Highlighted Service <span>[Features]</span></h2>
                    <p class="mt_12">Discover our high-temperature viewing systems.</p>
                </div>
                <div class="rotate-text">
                    <span class="curved-circle">Partner in Success: Here's Why .</span>
                </div>
            </div>
            <div class="inner-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 left-column">
                        <div class="left-content">
                            <div class="title-box">
                                <div class="title-shape"></div>
                                <h3>Manufacturing <br>Plant</h3>
                            </div>
                            <p>Our Karur production unit builds and tests
                                every camera system — from tube to control
                                panel — ensuring precision and durability
                                in every unit.</p>
                            <div class="link-text-box"><a href="{{ route('services') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="tabs-box">
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li class="tab-btn active-btn" data-tab="#feat-tab-1">
                                        <div class="icon-box"><i class="flaticon-filter"></i></div>
                                        <h4>Infrastructure</h4>
                                    </li>
                                    <li class="tab-btn" data-tab="#feat-tab-2">
                                        <div class="icon-box"><i class="flaticon-filter"></i></div>
                                        <h4>Quality Assurance</h4>
                                    </li>
                                    <li class="tab-btn" data-tab="#feat-tab-3">
                                        <div class="icon-box"><i class="flaticon-filter"></i></div>
                                        <h4>Research and Development</h4>
                                    </li>
                                    <li class="tab-btn" data-tab="#feat-tab-4">
                                        <div class="icon-box"><i class="flaticon-filter"></i></div>
                                        <h4>Field Support</h4>
                                    </li>
                                </ul>
                                <div class="tabs-content">
                                    <div class="tab active-tab" id="feat-tab-1">
                                        <figure class="image-box"><img src="{{ asset('assets/images/resource/feature-1.jpg') }}" alt="Manufacturing infrastructure"></figure>
                                    </div>
                                    <div class="tab" id="feat-tab-2">
                                        <figure class="image-box"><img src="{{ asset('assets/images/resource/feature-2.jpg') }}" alt="Quality assurance"></figure>
                                    </div>
                                    <div class="tab" id="feat-tab-3">
                                        <figure class="image-box"><img src="{{ asset('assets/images/resource/feature-3.jpg') }}" alt="Research and development"></figure>
                                    </div>
                                    <div class="tab" id="feat-tab-4">
                                        <figure class="image-box"><img src="{{ asset('assets/images/resource/feature-4.jpg') }}" alt="Field support"></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-section end -->

    @include('partials.cta')

@endsection

@push('styles')
    <style>
        /* =========================================================
           About Style Three (Since 1996 & Leader in Furnace Camera)
           Equal columns, zero empty space, aligned heights
           ========================================================= */
        .about-style-three.alternat-2 {
            padding: 75px 0 80px;
        }

        .about-style-three.alternat-2 > .auto-container > .row {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
        }

        .about-style-three.alternat-2 .image-column {
            display: flex;
            flex-direction: column;
        }

        .about-style-three.alternat-2 .image-box.temax-about-gallery {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
            grid-template-rows: repeat(2, minmax(0, 1fr));
            gap: 14px;
            height: 100% !important;
            min-height: 520px;
            margin: 0;
            padding: 0;
        }

        .about-style-three.alternat-2 .temax-about-gallery .image {
            position: relative;
            inset: auto;
            display: block;
            min-width: 0;
            min-height: 0;
            margin: 0;
            overflow: hidden;
            border-radius: 14px;
            background: #e8edf1;
            box-shadow: 0 12px 30px rgba(20, 42, 59, 0.12);
        }

        .about-style-three.alternat-2 .temax-about-gallery .image-1 {
            grid-column: 1;
            grid-row: 1 / span 2;
        }

        .about-style-three.alternat-2 .temax-about-gallery .image-2 {
            grid-column: 2;
            grid-row: 1;
        }

        .about-style-three.alternat-2 .temax-about-gallery .image-3 {
            grid-column: 2;
            grid-row: 2;
        }

        .about-style-three.alternat-2 .temax-about-gallery .image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .about-style-three.alternat-2 .temax-about-gallery .image-1 img {
            object-position: 68% center;
        }

        .about-style-three.alternat-2 .temax-about-gallery .image:hover img {
            transform: scale(1.035);
        }

        .about-style-three.alternat-2 .temax-about-gallery .rotate-text {
            top: auto;
            right: 18px;
            bottom: 18px;
            z-index: 1;
            padding: 11px 16px;
            border-radius: 6px;
            font-size: 13px;
            line-height: 1.2;
            letter-spacing: 0.08em;
            transform: none;
            box-shadow: 0 6px 18px rgba(20, 42, 59, 0.2);
        }

        .about-style-three.alternat-2 .temax-about-gallery .rotate-text::before {
            display: none;
        }

        /* Content Column Balance */
        .about-style-three.alternat-2 .content-column {
            display: flex;
            flex-direction: column;
        }

        .about-style-three.alternat-2 .content-box {
            display: flex;
            flex-direction: column;
            height: 100%;
            margin-top: 0;
            padding-left: 10px;
        }

        .about-style-three.alternat-2 .content-box .sec-title {
            margin-bottom: 20px;
        }

        .about-style-three.alternat-2 .content-box .text-box {
            margin-bottom: 24px;
        }

        .about-style-three.alternat-2 .content-box .inner-box {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .about-style-three.alternat-2 .content-box .inner-box > .row {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            flex: 1;
        }

        .about-style-three.alternat-2 .content-box .inner-box .left-column,
        .about-style-three.alternat-2 .content-box .inner-box .award-column {
            display: flex;
            flex-direction: column;
        }

        .about-style-three.alternat-2 .content-box .inner-box .left-content {
            display: flex;
            flex-direction: column;
            height: 100%;
            padding-right: 10px;
        }

        .about-style-three.alternat-2 .content-box .inner-box .left-content .icon-box {
            width: 64px;
            height: 72px;
            line-height: 78px;
            font-size: 30px;
            margin-bottom: 16px;
        }

        .about-style-three.alternat-2 .content-box .inner-box .left-content h3 {
            font-size: 21px;
            line-height: 28px;
            margin-bottom: 8px;
        }

        .about-style-three.alternat-2 .content-box .inner-box .left-content p {
            font-size: 15px;
            line-height: 23px;
            margin-bottom: 14px;
            color: #55606a;
        }

        .about-style-three.alternat-2 .content-box .inner-box .left-content .list-item {
            margin-bottom: 20px;
        }

        .about-style-three.alternat-2 .content-box .inner-box .left-content .list-item li {
            margin-bottom: 8px;
            font-size: 14.5px;
        }

        .about-style-three.alternat-2 .content-box .inner-box .left-content .btn-box {
            margin-top: auto;
            padding-top: 6px;
        }

        .about-style-three.alternat-2 .content-box .award-box {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100% !important;
            min-height: 100%;
            padding: 32px 28px;
            background-color: #f0f4f8;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .about-style-three.alternat-2 .content-box .award-box .award-image {
            margin-bottom: 22px;
        }

        .about-style-three.alternat-2 .content-box .award-box h6 {
            font-size: 15px;
            margin-bottom: 4px;
            color: #64748b;
        }

        .about-style-three.alternat-2 .content-box .award-box h5 {
            font-size: 18px;
            line-height: 25px;
            margin-bottom: 12px;
            color: var(--primary);
        }

        .about-style-three.alternat-2 .content-box .award-box .text {
            margin-top: 4px;
        }

        @media (max-width: 991px) {
            .about-style-three.alternat-2 {
                padding: 60px 0;
            }

            .about-style-three.alternat-2 .image-box.temax-about-gallery {
                height: 380px !important;
                min-height: auto;
                margin-bottom: 35px;
            }

            .about-style-three.alternat-2 .content-box {
                padding-left: 0;
            }

            .about-style-three.alternat-2 .content-box .inner-box .award-column {
                margin-top: 25px;
            }

            .about-style-three.alternat-2 .content-box .award-box {
                padding: 28px 22px;
            }
        }

        @media (max-width: 575px) {
            .about-style-three.alternat-2 .image-box.temax-about-gallery {
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                grid-template-rows: minmax(0, 1.2fr) minmax(0, 0.8fr);
                gap: 9px;
                height: 300px !important;
            }

            .about-style-three.alternat-2 .temax-about-gallery .image-1 {
                grid-column: 1 / span 2;
                grid-row: 1;
            }

            .about-style-three.alternat-2 .temax-about-gallery .image-2 {
                grid-column: 1;
                grid-row: 2;
            }

            .about-style-three.alternat-2 .temax-about-gallery .image-3 {
                grid-column: 2;
                grid-row: 2;
            }
        }

        /* TEMAX Company Values Redesign */
        .company-section.temax-company-redesign {
            position: relative;
            padding: 110px 0 85px !important;
            background-color: #0b151e;
            overflow: hidden;
        }

        .company-section.temax-company-redesign .bg-layer {
            position: absolute !important;
            inset: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.16;
            mix-blend-mode: luminosity;
        }

        .company-section.temax-company-redesign .bg-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 20%, rgba(25, 47, 66, 0.75) 0%, rgba(11, 21, 30, 0.96) 80%);
            pointer-events: none;
        }

        .company-section.temax-company-redesign .company-header-wrap {
            position: relative;
            z-index: 2;
        }

        .company-section.temax-company-redesign .company-header-desc {
            padding-left: 24px;
            border-left: 2px solid rgba(240, 87, 26, 0.5);
        }

        .company-section.temax-company-redesign .company-header-desc p {
            margin: 0;
            font-size: 16px;
            line-height: 28px;
            color: rgba(255, 255, 255, 0.75);
        }

        .company-section.temax-company-redesign .temax-card-col {
            display: flex;
        }

        .company-section.temax-company-redesign .temax-company-card {
            position: relative;
            z-index: 2;
            width: 100%;
            display: flex;
            flex-direction: column;
            background: rgba(18, 30, 42, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.28);
            transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), 
                        border-color 0.4s ease, 
                        box-shadow 0.4s ease;
            backdrop-filter: blur(8px);
        }

        .company-section.temax-company-redesign .temax-company-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: rgba(255, 255, 255, 0.12);
            transition: all 0.4s ease;
        }

        .company-section.temax-company-redesign .temax-company-card:hover {
            transform: translateY(-8px);
            border-color: rgba(240, 87, 26, 0.45);
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.4), 0 0 30px rgba(240, 87, 26, 0.16);
        }

        .company-section.temax-company-redesign .temax-company-card:hover::before {
            background: linear-gradient(90deg, #f0571a 0%, #ff8547 100%);
            height: 4px;
        }

        .company-section.temax-company-redesign .card-inner {
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 38px 32px 34px;
        }

        .company-section.temax-company-redesign .card-top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .company-section.temax-company-redesign .card-icon-box {
            position: relative;
            width: 62px;
            height: 62px;
            border-radius: 14px;
            background: rgba(240, 87, 26, 0.12);
            border: 1px solid rgba(240, 87, 26, 0.28);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: #f0571a;
            transition: all 0.35s ease;
        }

        .company-section.temax-company-redesign .temax-company-card:hover .card-icon-box {
            background: #f0571a;
            color: #ffffff;
            border-color: #f0571a;
            transform: scale(1.06);
            box-shadow: 0 8px 22px rgba(240, 87, 26, 0.42);
        }

        .company-section.temax-company-redesign .card-number {
            font-family: var(--title-font);
            font-size: 34px;
            font-weight: 800;
            line-height: 1;
            color: rgba(255, 255, 255, 0.14);
            letter-spacing: -0.02em;
            transition: color 0.35s ease;
        }

        .company-section.temax-company-redesign .temax-company-card:hover .card-number {
            color: rgba(240, 87, 26, 0.42);
        }

        .company-section.temax-company-redesign .card-title-group {
            margin-bottom: 14px;
        }

        .company-section.temax-company-redesign .card-tag {
            display: inline-block;
            font-size: 13px;
            line-height: 1.2;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--theme-color);
            margin-bottom: 6px;
        }

        .company-section.temax-company-redesign .card-heading {
            font-size: 24px;
            line-height: 32px;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
        }

        .company-section.temax-company-redesign .card-description {
            font-size: 15px;
            line-height: 25px;
            color: #a7b6c4;
            margin-bottom: 22px;
            flex-grow: 1;
        }

        .company-section.temax-company-redesign .card-feature-box {
            background: rgba(255, 255, 255, 0.035);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 24px;
        }

        .company-section.temax-company-redesign .feature-box-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            line-height: 1.2;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #ffffff;
            margin-bottom: 12px;
        }

        .company-section.temax-company-redesign .feature-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: var(--theme-color);
            display: inline-block;
        }

        .company-section.temax-company-redesign .feature-items {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .company-section.temax-company-redesign .feature-items li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            line-height: 20px;
            color: #cfd8e2;
            padding: 6px 0;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.06);
        }

        .company-section.temax-company-redesign .feature-items li:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .company-section.temax-company-redesign .feature-items li:first-child {
            padding-top: 0;
        }

        .company-section.temax-company-redesign .feature-items li i {
            color: var(--theme-color);
            font-size: 12px;
            line-height: 1;
            flex-shrink: 0;
        }

        .company-section.temax-company-redesign .card-action {
            margin-top: auto;
        }

        .company-section.temax-company-redesign .card-action-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 13px 20px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #ffffff;
            font-size: 14px;
            line-height: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .company-section.temax-company-redesign .card-action-btn i {
            font-size: 15px;
            color: var(--theme-color);
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .company-section.temax-company-redesign .temax-company-card:hover .card-action-btn,
        .company-section.temax-company-redesign .card-action-btn:hover {
            background: var(--theme-color);
            border-color: var(--theme-color);
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(240, 87, 26, 0.36);
        }

        .company-section.temax-company-redesign .temax-company-card:hover .card-action-btn i,
        .company-section.temax-company-redesign .card-action-btn:hover i {
            color: #ffffff;
            transform: translateX(4px);
        }

        @media (max-width: 991px) {
            .company-section.temax-company-redesign {
                padding: 85px 0 60px !important;
            }

            .company-section.temax-company-redesign .company-header-desc {
                margin-top: 20px;
                padding-left: 0;
                border-left: none;
                border-top: 2px solid rgba(240, 87, 26, 0.45);
                padding-top: 15px;
            }
        }

        @media (max-width: 575px) {
            .company-section.temax-company-redesign .card-inner {
                padding: 30px 22px 26px;
            }

            .company-section.temax-company-redesign .card-heading {
                font-size: 21px;
            }
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
    </style>
@endpush
