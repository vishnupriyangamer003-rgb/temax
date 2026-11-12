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
                <div class="col-lg-4 col-6"><div class="va-fact"><i class="flaticon-factory-1"></i><strong>1996</strong><span>Founded in Karur, Tamil Nadu</span></div></div>
                <div class="col-lg-4 col-6"><div class="va-fact"><i class="flaticon-trophy"></i><strong>30+</strong><span>Years of experience</span></div></div>
                <div class="col-lg-4 col-6"><div class="va-fact"><i class="flaticon-manufacturing"></i><strong>90%</strong><span>Made in India</span></div></div>
                <div class="col-lg-4 col-6"><div class="va-fact"><i class="flaticon-engineer"></i><strong>100+</strong><span>Plants served</span></div></div>
                <div class="col-lg-4 col-6"><div class="va-fact"><i class="flaticon-manufacturing-1"></i><strong>2000&nbsp;°C</strong><span>Operating environment rating</span></div></div>
                <div class="col-lg-4 col-6"><div class="va-fact"><i class="flaticon-zoom"></i><strong>1080p</strong><span>HD image, 960+ TV lines</span></div></div>
            </div>
        </div>
    </section>

    <!-- timeline -->
    <section class="va-timeline-sec">
        <div class="auto-container">
            <div class="vh-title text-center">
                <h6>Our Journey</h6>
                <h2>A timeline of furnace &amp; camera innovation</h2>
            </div>
            <ol class="va-timeline">
                <li class="va-tl-item">
                    <span class="va-tl-year">1996</span>
                    <div class="va-tl-card">
                        <h4>Foundation Year 1996</h4>
                        <p>TEMAX was established in Karur, Tamil Nadu as a furnace camera manufacturing company — building high-temperature viewing systems for Indian industry with a focus on precision, quality and meeting client needs. From a workshop to a trusted name, built on precision and passion.</p>
                    </div>
                </li>
                <li class="va-tl-item">
                    <span class="va-tl-year">2016</span>
                    <div class="va-tl-card">
                        <h4>First Kiln Camera 2016</h4>
                        <p>TEMAX developed the first furnace camera for kiln application in 2016 — giving cement plant operators their first live view inside the kiln and starting the range of retrofit, cowl shell and under grate cameras that followed. A reference installation that started the TEMAX furnace camera range.</p>
                    </div>
                </li>
                <li class="va-tl-item">
                    <span class="va-tl-year">Today</span>
                    <div class="va-tl-card">
                        <h4>Three Decades Today</h4>
                        <p>With 90% of production in India, all spares available locally and customisation possible with immediate support, TEMAX cameras now run in cement, thermal and glass plants — including 600MW utility power plants across the country. Thirty years of furnace viewing expertise, made in India.</p>
                    </div>
                </li>
            </ol>
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

    @include('partials.cta')

@endsection
