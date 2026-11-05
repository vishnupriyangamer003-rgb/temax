@extends('layouts.app')

@section('title', 'Our Services - Furnace Camera Systems, Cooling, Retraction & Thermal | TEMAX')

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

    <!-- service-page-section -->
    <section class="service-page-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="border-line"></div>
                <div class="row clearfix">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                            <div class="service-block-one">
                                <div class="inner-box">
                                    <div class="image-inner">
                                        <span class="count-text">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                        <div class="image-box">
                                            <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-6.png') }});"></div>
                                            <figure class="image"><img src="{{ asset($service->image ?: 'assets/images/service/service-1.jpg') }}" alt="{{ $service->title }}"></figure>
                                            <div class="icon-box"><i class="{{ $serviceIcons[$loop->index % count($serviceIcons)] }}"></i></div>
                                        </div>
                                    </div>
                                    <div class="lower-content">
                                        <div class="block-title">
                                            <div class="line-shape"></div>
                                            <h3><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></h3>
                                        </div>
                                        <p>{{ \Illuminate\Support\Str::limit($service->summary, 130) }}</p>
                                        <div class="btn-box"><a href="{{ route('services.show', $service->slug) }}"><i class="flaticon-right-arrow"></i><span>Read More</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- service-page-section end -->

    @include('partials.cta')

@endsection
