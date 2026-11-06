@extends('layouts.app')

@section('title', 'Our Services - Furnace Camera Systems, Cooling, Retraction & Thermal | TEMAX')
@section('meta_description', 'Explore TEMAX services including furnace camera systems, SS 316 camera cooling systems, pneumatic auto retraction, thermal imaging, retrofits, upgrades and customized industrial monitoring solutions.')

@section('content')

    @include('partials.page-title', ['pageTitle' => 'Services'])

    @php
        $serviceIcons = [
            'flaticon-zoom',
            'flaticon-steel',
            'flaticon-pistons',
            'flaticon-thunder-bolt',
            'flaticon-tools',
            'flaticon-gears',
        ];
    @endphp

    <!-- service-page-two-section -->
    <section class="service-page-two-section temax-services-page">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-three">
                            <div class="inner-box">
                                <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-19.png') }});"></div>
                                <div class="icon-box"><i class="{{ $serviceIcons[$loop->index % count($serviceIcons)] }}"></i></div>
                                <h6>Service {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</h6>
                                <div class="title-box">
                                    <div class="title-shape"></div>
                                    <h2><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></h2>
                                </div>
                                <p>{{ \Illuminate\Support\Str::limit($service->summary, 120) }}</p>
                                <div class="link-box"><a href="{{ route('services.show', $service->slug) }}"><i class="flaticon-right-arrow"></i></a></div>
                                <div class="overlay-content">
                                    <div class="overlay-bg" style="background-image: url({{ asset($service->image ?: 'assets/images/resource/block-bg.jpg') }});"></div>
                                    <div class="icon-box"><i class="{{ $serviceIcons[$loop->index % count($serviceIcons)] }}"></i></div>
                                    <h6>Service {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</h6>
                                    <div class="title-box">
                                        <div class="title-shape"></div>
                                        <h2><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></h2>
                                    </div>
                                    <p>{{ \Illuminate\Support\Str::limit($service->summary, 120) }}</p>
                                    <div class="btn-box"><a href="{{ route('services.show', $service->slug) }}" class="theme-btn btn-three"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- service-page-two-section end -->

    @include('partials.cta')

@endsection

@push('styles')
    <style>
        .temax-services-page {
            padding: 120px 0px 90px 0px;
            background-color: #f0f4f8;
        }

        .temax-services-page .service-block {
            margin-bottom: 30px;
        }

        .temax-services-page .service-block-three .inner-box {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 440px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            padding: 34px 30px 36px 36px;
            overflow: hidden;
            transition: all 400ms ease;
        }

        .temax-services-page .service-block-three .inner-box:hover {
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.12);
        }

        .temax-services-page .service-block-three .inner-box h6 {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.08em;
            color: #a5aaaf;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .temax-services-page .service-block-three .inner-box .title-box {
            margin-bottom: 18px;
            padding-bottom: 18px;
        }

        .temax-services-page .service-block-three .inner-box .title-box h2 {
            font-size: 22px;
            line-height: 30px;
            font-weight: 700;
            min-height: 60px;
        }

        .temax-services-page .service-block-three .inner-box p {
            font-size: 14px;
            line-height: 24px;
            color: #66696b;
            margin-bottom: 24px;
            min-height: 72px;
        }

        .temax-services-page .service-block-three .inner-box .icon-box {
            background-color: #f0f4f8;
            color: var(--theme-color);
            transition: all 300ms ease;
        }

        .temax-services-page .service-block-three .inner-box .link-box a {
            background-color: #f0f4f8;
            color: var(--theme-color);
            border-radius: 4px;
            transition: all 300ms ease;
        }

        .temax-services-page .service-block-three .inner-box .link-box a:hover {
            background-color: var(--theme-color);
            color: #ffffff;
        }

        .temax-services-page .service-block-three .inner-box .overlay-content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: rgba(22, 26, 29, 0.94);
            border-radius: 8px;
            padding: 34px 30px 36px 36px;
        }

        .temax-services-page .service-block-three .inner-box .overlay-content .overlay-bg {
            opacity: 0.22;
        }

        .temax-services-page .service-block-three .inner-box .overlay-content .icon-box {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--theme-color);
        }

        .temax-services-page .service-block-three .inner-box .overlay-content h6 {
            color: #dbdfe3;
        }

        .temax-services-page .service-block-three .inner-box .overlay-content .title-box h2 a {
            color: #ffffff;
        }

        .temax-services-page .service-block-three .inner-box .overlay-content p {
            color: #c4c9ce;
        }

        .temax-services-page .service-block-three .inner-box .overlay-content .theme-btn.btn-three {
            background-color: var(--theme-color);
            color: #ffffff;
            border-radius: 4px;
            transition: all 300ms ease;
        }

        .temax-services-page .service-block-three .inner-box .overlay-content .theme-btn.btn-three i {
            color: #ffffff;
        }

        .temax-services-page .service-block-three .inner-box .overlay-content .theme-btn.btn-three:hover {
            background-color: #ffffff;
            color: var(--title-color);
        }

        .temax-services-page .service-block-three .inner-box .overlay-content .theme-btn.btn-three:hover i {
            color: var(--theme-color);
        }
    </style>
@endpush
