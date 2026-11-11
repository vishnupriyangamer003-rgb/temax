@extends('layouts.app')

@section('title', 'Contact TEMAX - Furnace Camera Enquiries, Karur | sales@temax.in')
@section('meta_description', 'Contact TEMAX in Karur, Tamil Nadu. Reach our technical sales team for furnace camera quotes, site visits, cooling systems and custom engineering: +91 4324 226787, sales@temax.in')

@section('content')

    @include('partials.page-title', ['pageTitle' => 'Contact Us'])

    <!-- contact-style-two -->
    <section class="contact-style-two">
        <div class="auto-container">
            <div class="tabs-box">
                <div class="tabs-content">
                    <div class="tab active-tab" id="contact-office">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                <div class="info-block-one">
                                    <div class="inner-box">
                                        <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-24.png') }});"></div>
                                        <div class="title-box">
                                            <h3>Location</h3>
                                            <h6>Conveniently located to meet.</h6>
                                        </div>
                                        <div class="text-box">
                                            <p>{{ setting('address') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                <div class="info-block-one">
                                    <div class="inner-box">
                                        <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-24.png') }});"></div>
                                        <div class="title-box">
                                            <h3>Reach Us</h3>
                                            <h6>Call or email for assistance.</h6>
                                        </div>
                                        <div class="text-box">
                                            <p>
                                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">{{ setting('phone_display', setting('phone')) }}</a><br>
                                                @if (setting('phone2'))
                                                    @foreach (array_filter(array_map('trim', explode(',', setting('phone2')))) as $p2)
                                                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $p2) }}">{{ format_phone($p2) }}</a><br>
                                                    @endforeach
                                                @endif
                                                <a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                <div class="info-block-one">
                                    <div class="inner-box">
                                        <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-24.png') }});"></div>
                                        <div class="title-box">
                                            <h3>Business Hours</h3>
                                            <h6>Connect during office hours.</h6>
                                        </div>
                                        <div class="text-box">
                                            <p>{{ setting('working_hours') }}<br> <span class="text">Sun: Closed</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-style-two end -->

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
