@extends('layouts.app')

@section('title', $service->title . ' - TEMAX Services')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($service->summary ?: $service->lead), 160))

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
