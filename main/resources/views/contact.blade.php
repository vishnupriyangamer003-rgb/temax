@extends('layouts.app')

@section('title', 'Contact TEMAX - Furnace Camera Enquiries, Karur | sales@temax.in')
@section('meta_description', 'Contact TEMAX in Karur, Tamil Nadu. Reach our technical sales team for furnace camera quotes, site visits, cooling systems and custom engineering: +91 4324 226787, sales@temax.in')

@section('content')

    @include('partials.page-title', ['pageTitle' => 'Contact Us'])

    <!-- contact info cards -->
    <section class="vc-info">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vc-card">
                        <div class="vc-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <h3>Location</h3>
                        <p class="vc-sub">Conveniently located to meet.</p>
                        <address>{{ setting('address') }}</address>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vc-card">
                        <div class="vc-icon"><i class="fas fa-phone-alt"></i></div>
                        <h3>Reach Us</h3>
                        <p class="vc-sub">Call or email for assistance.</p>
                        <ul class="vc-links">
                            <li><a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">{{ setting('phone_display', setting('phone')) }}</a></li>
                            @if (setting('phone2'))
                                @foreach (array_filter(array_map('trim', explode(',', setting('phone2')))) as $p2)
                                    <li><a href="tel:{{ preg_replace('/[^0-9+]/', '', $p2) }}">{{ format_phone($p2) }}</a></li>
                                @endforeach
                            @endif
                            <li><a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="vc-card">
                        <div class="vc-icon"><i class="far fa-clock"></i></div>
                        <h3>Business Hours</h3>
                        <p class="vc-sub">Connect during office hours.</p>
                        <ul class="vc-links vc-hours">
                            <li>{{ setting('working_hours') }}</li>
                            <li class="vc-closed">Sun: Closed</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact info cards end -->

    <!-- map section: full-width map with overlay card -->
    <section class="vm-section">
        <div class="vm-map">
            <iframe src="{{ setting('map_embed') }}" width="100%" height="480" style="border:0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="TEMAX location map"></iframe>
            <div class="auto-container vm-overlay-wrap">
                <div class="vm-card">
                    <h3>TEMAX, Karur</h3>
                    <p class="vm-addr">{{ setting('address') }}</p>
                    <ul class="vm-list">
                        <li><i class="fas fa-phone-alt"></i><a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">{{ setting('phone_display', setting('phone')) }}</a></li>
                        <li><i class="far fa-envelope"></i><a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a></li>
                        <li><i class="far fa-clock"></i><span>{{ setting('working_hours') }}</span></li>
                    </ul>
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode(setting('address')) }}" class="theme-btn btn-one" target="_blank" rel="noopener"><i class="flaticon-right-arrow"></i><span>Get directions</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- map section end -->

    @include('partials.cta')

@endsection
