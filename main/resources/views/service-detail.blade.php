@extends('layouts.app')

@section('title', $service->title . ' - TEMAX Services')

@section('content')

    @php
        $itemIcons = ['flaticon-zoom', 'flaticon-steel', 'flaticon-pistons', 'flaticon-thunder-bolt', 'flaticon-tools', 'flaticon-gears'];
    @endphp

    @include('partials.page-title', ['pageTitle' => $service->title])

    <!-- service-details -->
    <section class="service-details">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="service-details-content">
                        <div class="content-one mb_40">
                            <h2>{{ $service->title }}</h2>
                            <figure class="image-box"><img src="{{ asset($service->image ?: 'assets/images/service/service-1.jpg') }}" alt="{{ $service->title }}"></figure>
                            <p>{{ $service->lead ?: $service->summary }}</p>

                            @if (!empty($service->intro) && count($service->intro))
                                <div class="text-box mt_30">
                                    <h3>Specifications</h3>
                                </div>
                                <ul class="list-style-one clearfix mt_25">
                                    @foreach ($service->intro as $spec)
                                        <li><i class="flaticon-check"></i><span>{{ $spec }}</span></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        @if ($service->items->count())
                            <div class="content-two mb_45">
                                <div class="text-box">
                                    <h3>{{ $service->items_title ?: 'Key Features' }}</h3>
                                    <p>{{ $service->summary }}</p>
                                </div>
                                <div class="two-item-carousel owl-carousel owl-theme nav-style-one">
                                    @foreach ($service->items as $item)
                                        <div class="product-block-one">
                                            <div class="inner-box">
                                                <div class="light-icon"><img src="{{ asset('assets/images/icons/icon-18.png') }}" alt=""></div>
                                                <h3>{{ $item->title }}</h3>
                                                <p>{{ $item->text }}</p>
                                                <div class="icon-box"><i class="{{ $itemIcons[$loop->index % count($itemIcons)] }}"></i></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (!empty($service->points) && count($service->points))
                            <div class="content-three pb_20">
                                <div class="text-box">
                                    <h3>Why It Matters</h3>
                                    <p>Reasons plants across India choose this TEMAX system.</p>
                                </div>
                                <ul class="list-style-one clearfix mt_25">
                                    @foreach ($service->points as $point)
                                        <li><i class="flaticon-check"></i><span>{{ $point }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="service-sidebar">
                        <div class="sidebar-widget category-widget mb_30">
                            <div class="widget-title">
                                <h3>Our Services</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @foreach ($services as $other)
                                        <li>
                                            <a href="{{ route('services.show', $other->slug) }}" class="{{ $other->id === $service->id ? 'current' : '' }}">
                                                <i class="static-icon flaticon-right"></i><i class="overlay-icon flaticon-right-arrow"></i>{{ $other->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="contact-widget">
                            <div class="inner-box centred">
                                <h2>Didn't find the <span>right plan?</span> Reach out for <span>custom solution.</span></h2>
                                <div class="icon-box"><div class="icon"><i class="flaticon-headphones"></i></div></div>
                                <h4><a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">{{ setting('phone_display', setting('phone')) }}</a></h4>
                                <p><a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a></p>
                                <a href="{{ route('contact') }}" class="theme-btn"><i class="flaticon-right-arrow"></i><span>Appointment</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-details end -->

    @include('partials.cta')

@endsection
