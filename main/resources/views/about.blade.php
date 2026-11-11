@extends('layouts.app')

@section('title', 'About TEMAX - Furnace Camera Manufacturer Since 1996, Karur')
@section('meta_description', 'Learn about TEMAX, established in 1996 in Karur, Tamil Nadu. 90% Indian manufacturing of industrial furnace camera systems with local spares and immediate technical support.')

@section('content')

    @include('partials.page-title', ['pageTitle' => 'About Us'])

    <!-- intro (centred paragraph + wide image) -->
    <section class="va-intro">
        <div class="auto-container">
            <div class="vh-title text-center">
                <h6>About Us</h6>
                <h2>Leader in <span class="text-nowrap">[Furnace&nbsp;Camera]</span> Manufacturing</h2>
            </div>
            <p class="va-lead">Founded in 1996 in Karur, Tamil Nadu, TEMAX manufactures high-temperature
                furnace camera systems, cooling systems, auto retraction systems and
                thermal cameras for the cement, thermal and glass industries.</p>
            <div class="va-copy">
                <p>The TEMAX Technical Development Team, founded in 1996, is an innovative, high-technology enterprise engaged in technical solutions for special high-temperature image detection and industrial process digital integration, as well as system development, manufacture, sale and service.</p>
                <p>With a self-owned brand, a strong marketing and service network and a strict production management system, TEMAX products are supplied all over India. Guided by the tenet &ldquo;market oriented and innovation for development&rdquo;, the company is devoted to being an industry leader in special automatic detection technology.</p>
                <p>TEMAX believes its responsibility is to satisfy every customer and user of its products and services by meeting their needs promptly and accurately, while maintaining the highest quality standards. Its state-of-the-art manufacturing facilities are backed by a continuous focus on new products, innovation, technology up-gradation and research and development.</p>
            </div>
            <figure class="va-hero"><img src="{{ asset('assets/images/temax/kiln-2016.png') }}" alt="TEMAX furnace camera on a rotary kiln"></figure>
        </div>
    </section>

    <!-- key facts -->
    <section class="va-facts">
        <div class="auto-container">
            <div class="vh-title text-center"><h2>Key facts</h2></div>
            <div class="row clearfix">
                <div class="col-lg-4 col-sm-6"><div class="va-fact"><i class="flaticon-factory-1"></i><strong>1996</strong><span>Founded in Karur, Tamil Nadu</span></div></div>
                <div class="col-lg-4 col-sm-6"><div class="va-fact"><i class="flaticon-trophy"></i><strong>30+</strong><span>Years of experience</span></div></div>
                <div class="col-lg-4 col-sm-6"><div class="va-fact"><i class="flaticon-manufacturing"></i><strong>90%</strong><span>Made in India</span></div></div>
                <div class="col-lg-4 col-sm-6"><div class="va-fact"><i class="flaticon-engineer"></i><strong>100+</strong><span>Plants served</span></div></div>
                <div class="col-lg-4 col-sm-6"><div class="va-fact"><i class="flaticon-manufacturing-1"></i><strong>2000&nbsp;°C</strong><span>Operating environment rating</span></div></div>
                <div class="col-lg-4 col-sm-6"><div class="va-fact"><i class="flaticon-zoom"></i><strong>1080p</strong><span>HD image, 960+ TV lines</span></div></div>
            </div>
        </div>
    </section>

    <!-- company in figures -->
    <section class="va-figures">
        <div class="auto-container">
            <div class="vh-title"><h2>The company in figures</h2></div>
            <table class="va-table">
                <tbody>
                    <tr><th>Year of founding</th><td>1996</td></tr>
                    <tr><th>Location</th><td>Karur, Tamil Nadu, India</td></tr>
                    <tr><th>Made in India</th><td>90%</td></tr>
                    <tr><th>First furnace camera for kiln application</th><td>2016</td></tr>
                    <tr><th>Industries served</th><td>Cement, Thermal, Glass</td></tr>
                    <tr><th>Core products</th><td>Furnace camera tube, cooling system, auto retraction system, thermal cameras</td></tr>
                    <tr><th>Image sensor</th><td>1/3&Prime; Sony colour CCD, more than 960 and 1080 TV lines (HD quality)</td></tr>
                    <tr><th>Maximum environment</th><td>Up to 2000 °C</td></tr>
                    <tr><th>Cooling</th><td>Air or water cooling (SS 316, corrosion free)</td></tr>
                    <tr><th>Furnace wall thickness</th><td>200 to 600 mm</td></tr>
                    <tr><th>Manufacturing</th><td>90% in India, spares available locally, customisation possible</td></tr>
                    <tr><th>Service area</th><td>Supplied all over India</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- story cards (Mission / Vision / History) -->
    <section class="va-stories">
        <div class="auto-container">
            <article class="va-story">
                <figure class="va-shape"><img src="{{ asset('assets/images/temax/control-panel.jpg') }}" alt="TEMAX control panel" loading="lazy"></figure>
                <div class="va-story-body">
                    <h3>Our Mission</h3>
                    <p>To give every plant safe, reliable and continuous visibility inside its furnace — with technology that is economical, serviceable locally and built to last.</p>
                    <ul class="vh-ticks">
                        <li>Immediate Support</li>
                        <li>Locally Available Spares</li>
                        <li>Customisation on Demand</li>
                    </ul>
                </div>
            </article>

            <article class="va-story va-story-rev">
                <figure class="va-shape"><img src="{{ asset('assets/images/temax/camera-tube.jpg') }}" alt="TEMAX furnace camera tube" loading="lazy"></figure>
                <div class="va-story-body">
                    <h3>Our Vision</h3>
                    <p>To lead the industry with innovative, Made-in-India furnace viewing technology that keeps Indian plants competitive, safe and efficient.</p>
                    <ul class="vh-ticks">
                        <li>Innovation in Imaging</li>
                        <li>90% Made in India</li>
                        <li>Quality Assurance</li>
                    </ul>
                </div>
            </article>

            <article class="va-story">
                <figure class="va-shape"><img src="{{ asset('assets/images/temax/production-tube.jpg') }}" alt="TEMAX team building furnace cameras" loading="lazy"></figure>
                <div class="va-story-body">
                    <h3>A timeline of furnace &amp; camera innovation</h3>
                    <h4>Foundation Year 1996</h4>
                    <p>TEMAX was established in Karur, Tamil Nadu as a furnace camera
                        manufacturing company — building high-temperature viewing systems
                        for Indian industry with a focus on precision, quality and
                        meeting client needs. From a workshop to a trusted name, built on precision and passion.</p>
                    <h4>First Kiln Camera 2016</h4>
                    <p>TEMAX developed the first furnace camera for kiln application in
                        2016 — giving cement plant operators their first live view inside
                        the kiln and starting the range of retrofit, cowl shell and under
                        grate cameras that followed. A reference installation that started the TEMAX furnace camera range.</p>
                    <h4>Three Decades Today</h4>
                    <p>With 90% of production in India, all spares available locally and
                        customisation possible with immediate support, TEMAX cameras now
                        run in cement, thermal and glass plants — including 600MW utility
                        power plants across the country. Thirty years of furnace viewing expertise, made in India.</p>
                </div>
            </article>
        </div>
    </section>

    <!-- production & technology -->
    <section class="va-sites">
        <div class="auto-container">
            <div class="vh-title">
                <h2>Manufacturing Plant</h2>
                <p>Our Karur production unit builds and tests every camera system — from tube to control
                    panel — ensuring precision and durability in every unit.</p>
            </div>
            <div class="row clearfix">
                <div class="col-xl-3 col-md-6 col-sm-6"><a class="va-site" href="{{ route('services') }}"><img src="{{ asset('assets/images/temax/production-unit-2.jpg') }}" alt="Infrastructure" loading="lazy"><span>Infrastructure</span></a></div>
                <div class="col-xl-3 col-md-6 col-sm-6"><a class="va-site" href="{{ route('services') }}"><img src="{{ asset('assets/images/temax/control-panel-inside.jpg') }}" alt="Quality Assurance" loading="lazy"><span>Quality Assurance</span></a></div>
                <div class="col-xl-3 col-md-6 col-sm-6"><a class="va-site" href="{{ route('services') }}"><img src="{{ asset('assets/images/temax/camera-tube.jpg') }}" alt="Research and Development" loading="lazy"><span>Research and Development</span></a></div>
                <div class="col-xl-3 col-md-6 col-sm-6"><a class="va-site" href="{{ route('services') }}"><img src="{{ asset('assets/images/temax/dispatch.jpg') }}" alt="Field Support" loading="lazy"><span>Field Support</span></a></div>
            </div>
        </div>
    </section>

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

    @include('partials.cta')

@endsection

@push('styles')
    <style>
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
