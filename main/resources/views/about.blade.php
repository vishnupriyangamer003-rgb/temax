@extends('layouts.app')

@section('title', 'About TEMAX - Furnace Camera Manufacturer Since 1996, Karur')

@section('content')

    @include('partials.page-title', ['pageTitle' => 'About Us'])

    <!-- about-style-three -->
    <section class="about-style-three alternat-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image image-1"><img src="{{ asset('assets/images/temax/production-unit.jpg') }}" alt="TEMAX production unit"></figure>
                        <figure class="image image-2"><img src="{{ asset('assets/images/temax/control-panel.jpg') }}" alt="TEMAX control panel"></figure>
                        <figure class="image image-3"><img src="{{ asset('assets/images/temax/camera-tube.jpg') }}" alt="TEMAX furnace camera tube"></figure>
                        <span class="rotate-text">Since, 1996</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title mb_35">
                            <h6>About Us</h6>
                            <h2>Leaders in <span>[Furnace Camera]</span> Manufacturing</h2>
                        </div>
                        <div class="text-box mb_30">
                            <p>Founded in 1996 in Karur, Tamil Nadu, TEMAX manufactures high-temperature
                                furnace camera systems, cooling systems, auto retraction systems and
                                thermal cameras for the cement, thermal and glass industries.</p>
                        </div>
                        <div class="inner-box">
                            <div class="row clearfix">
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
    <section class="company-section">
        <div class="bg-layer" style="background-image: url({{ asset('assets/images/background/company-bg.jpg') }});"></div>
        <div class="outer-container">
            <div class="outer-box clearfix">
                <div class="title-column">
                    <div class="sec-title light">
                        <h6>Company</h6>
                        <h2>Driven by Innovation, Built on Trust</h2>
                    </div>
                </div>
                <div class="single-column">
                    <div class="inner-box">
                        <div class="static-content">
                            <h6>about</h6>
                            <h3>Our Company</h3>
                            <p>TEMAX manufactures furnace camera systems...</p>
                            <div class="icon-box"><i class="flaticon-factory-1"></i></div>
                        </div>
                        <div class="overlay-content">
                            <h6>about</h6>
                            <h3>Our Company</h3>
                            <p>A furnace camera manufacturer based in Karur, Tamil Nadu — building
                                high-temperature imaging systems for cement, thermal and glass plants
                                since 1996.</p>
                            <h4>What we build</h4>
                            <ul class="list-item clearfix">
                                <li>Furnace Camera Systems</li>
                                <li>Cooling &amp; Retraction Systems</li>
                                <li>Thermal Camera Systems</li>
                            </ul>
                            <div class="link"><a href="{{ route('services') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="single-column">
                    <div class="inner-box">
                        <div class="static-content">
                            <h6>about</h6>
                            <h3>Our Mission</h3>
                            <p>To deliver reliable in-furnace visibility...</p>
                            <div class="icon-box"><i class="flaticon-goal"></i></div>
                        </div>
                        <div class="overlay-content">
                            <h6>about</h6>
                            <h3>Our Mission</h3>
                            <p>To give every plant safe, reliable and continuous visibility inside its
                                furnace — with technology that is economical, serviceable locally and
                                built to last.</p>
                            <h4>Our promise</h4>
                            <ul class="list-item clearfix">
                                <li>Immediate Support</li>
                                <li>Locally Available Spares</li>
                                <li>Customisation on Demand</li>
                            </ul>
                            <div class="link"><a href="{{ route('contact') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="single-column">
                    <div class="inner-box">
                        <div class="static-content">
                            <h6>about</h6>
                            <h3>Our Vision</h3>
                            <p>To lead high-temperature imaging in India...</p>
                            <div class="icon-box"><i class="flaticon-business-vision"></i></div>
                        </div>
                        <div class="overlay-content">
                            <h6>about</h6>
                            <h3>Our Vision</h3>
                            <p>To lead the industry with innovative, Made-in-India furnace viewing
                                technology that keeps Indian plants competitive, safe and efficient.</p>
                            <h4>Our direction</h4>
                            <ul class="list-item clearfix">
                                <li>Innovation in Imaging</li>
                                <li>90% Made in India</li>
                                <li>Quality Assurance</li>
                            </ul>
                            <div class="link"><a href="{{ route('projects') }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- company-section end -->


    <!-- chooseus-style-two -->
    <section class="chooseus-style-two">
        <div class="auto-container">
            <div class="sec-title mb_25 centred">
                <h6>Why Choose Us</h6>
                <h2>Top Reasons to <span>[Choose]</span> Us</h2>
                <p class="mt_12">Three decades of furnace viewing expertise.</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12 col-sm-12 left-column">
                    <div class="left-content">
                        <div class="chooseus-block-two">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-manufacturing"></i></div>
                                <h3><i class="flaticon-thunder-bolt"></i>Furnace Camera Specialists</h3>
                                <p>Three decades of high-temperature viewing
                                    experience across cement, thermal and glass
                                    plants in India.</p>
                            </div>
                        </div>
                        <div class="chooseus-block-two">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-manufacturing-1"></i></div>
                                <h3><i class="flaticon-thunder-bolt"></i>Locally Available Spares</h3>
                                <p>Economical, locally available spares keep
                                    your running costs down — with immediate
                                    support when you need it.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        <div class="image-shape" style="background-image: url({{ asset('assets/images/shape/shape-15.png') }});"></div>
                        <figure class="image"><img src="{{ asset('assets/images/temax/production-unit-2.jpg') }}" alt="TEMAX team at work"></figure>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 right-column">
                    <div class="right-content align-3">
                        <div class="chooseus-block-two">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-engineer"></i></div>
                                <h3><i class="flaticon-thunder-bolt"></i>90% Made in India</h3>
                                <p>Main modules only imported — everything
                                    else built and tested at our Karur
                                    production unit.</p>
                            </div>
                        </div>
                        <div class="chooseus-block-two">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-test"></i></div>
                                <h3><i class="flaticon-thunder-bolt"></i>Built for 2000&nbsp;°C</h3>
                                <p>Air and water cooled camera systems rated
                                    for the toughest furnace environments,
                                    customised on demand.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-style-two end -->


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
