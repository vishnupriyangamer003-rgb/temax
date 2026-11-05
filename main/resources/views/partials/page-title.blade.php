{{-- Inner page banner: title + breadcrumb + logo/stat strip (Metallic "page-title" section) --}}
<section class="page-title">
    <div class="bg-layer" style="background-image: url({{ asset('assets/images/background/page-title.jpg') }});"></div>
    <div class="outer-container">
        <div class="content-box">
            <h1>{{ $pageTitle }}</h1>
            <ul class="bread-crumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="flaticon-right"></i></li>
                <li><span>{{ $pageTitle }}</span></li>
            </ul>
        </div>
    </div>
    <div class="based-content">
        <div class="inner">
            <div class="logo-box">
                <figure class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/temax/logo.png') }}" alt="{{ setting('site_name', 'TEMAX') }}"></a>
                </figure>
                <h5>Based In <br>Karur, India.</h5>
            </div>
            <div class="single-item">
                <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-1.png') }});"></div>
                <h2>1996</h2>
                <h5>Founded &amp; Serving <br>Since.</h5>
            </div>
        </div>
        <span class="rotate-text">Established Since, 1996</span>
    </div>
</section>
