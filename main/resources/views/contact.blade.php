@extends('layouts.app')

@section('title', 'Contact TEMAX - Furnace Camera Enquiries, Karur | sales@temax.in')

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
                                                @if (setting('phone2'))<a href="tel:{{ preg_replace('/[^0-9+\s,]/', '', setting('phone2')) }}">{{ setting('phone2') }}</a><br>@endif
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


    <!-- contact-style-three -->
    <section class="contact-style-three">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                    <div class="map-inner">
                        <div class="map">
                            <iframe src="{{ setting('map_embed') }}" width="100%" height="500" frameborder="0" style="border:0; width: 100%" allowfullscreen="" aria-hidden="false" tabindex="0" title="TEMAX location map"></iframe>
                        </div>
                        <div class="map-content">
                            <h3>Karur</h3>
                            <p>{{ setting('address_short') }}<br>Tamil Nadu, India</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title mb_35">
                            <h6>Message Us</h6>
                            <h2>Have Questions? <span>[Message]</span> Us</h2>
                        </div>
                        <div class="form-inner">
                            <div id="form-flash" class="form-flash" style="display:none;"></div>
                            @if (session('success'))
                                <div class="form-flash success">{{ session('success') }}</div>
                            @endif
                            @if ($errors->first('enquiry'))
                                <div class="form-flash error">{{ $errors->first('enquiry') }}</div>
                            @endif

                            <form method="post" action="{{ route('enquiries.store') }}" id="enquiry-form">
                                @csrf
                                {{-- Honeypot: hidden from humans, filled by bots --}}
                                <div class="hp-field" aria-hidden="true">
                                    <label>Website<input type="text" name="website_hp" tabindex="-1" autocomplete="off"></label>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="{{ asset('assets/images/icons/icon-28.png') }}" alt=""></div>
                                            <input type="text" name="name" placeholder="Name *" required maxlength="100" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="{{ asset('assets/images/icons/icon-29.png') }}" alt=""></div>
                                            <input type="text" name="phone" placeholder="Phone *" required maxlength="25" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="{{ asset('assets/images/icons/icon-30.png') }}" alt=""></div>
                                            <input type="email" name="email" placeholder="Email" maxlength="190" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="form-group">
                                            <input type="text" name="location" placeholder="Plant / Location" maxlength="120" value="{{ old('location') }}" style="padding-left: 20px;">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="{{ asset('assets/images/icons/icon-31.png') }}" alt=""></div>
                                            <div class="select-box">
                                                <select name="service" class="wide">
                                                    <option value="">Service Required</option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->title }}" {{ old('service') === $service->title ? 'selected' : '' }}>{{ $service->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="{{ asset('assets/images/icons/icon-32.png') }}" alt=""></div>
                                            <textarea name="message" placeholder="Your Question" maxlength="3000">{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="message-btn">
                                            <button type="submit" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Submit Now</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-style-three end -->

    @include('partials.cta')

@endsection

@push('styles')
    <style>
        /* Off-screen honeypot field */
        .hp-field {
            position: absolute !important;
            left: -9999px !important;
            top: -9999px !important;
            height: 0;
            overflow: hidden;
        }

        .form-flash {
            position: relative;
            display: block;
            padding: 14px 20px;
            margin-bottom: 25px;
            font-size: 15px;
            line-height: 24px;
            background-color: #f3f5f9;
            border-left: 3px solid var(--theme-color);
        }

        .form-flash.success {
            background-color: #eafaf1;
            border-left-color: #2eae67;
            color: #1d7a44;
        }

        .form-flash.error {
            background-color: #fdeeee;
            border-left-color: #e2453c;
            color: #a02a24;
        }
    </style>
@endpush

@push('scripts')
    <script>
        jQuery(function ($) {
            var $form = $('#enquiry-form');
            var $flash = $('#form-flash');

            function showFlash(type, text) {
                $flash
                    .removeClass('success error')
                    .addClass(type)
                    .text(text)
                    .stop(true, true)
                    .fadeIn(200);
            }

            $form.on('submit', function (e) {
                e.preventDefault();

                var name = $.trim($form.find('[name="name"]').val());
                var phone = $.trim($form.find('[name="phone"]').val());

                if (name.length < 2) {
                    showFlash('error', 'Please enter your name.');
                    return;
                }

                if (!/^[0-9+\s\-()]{10,25}$/.test(phone)) {
                    showFlash('error', 'Please enter a valid phone number (at least 10 digits).');
                    return;
                }

                var $btn = $form.find('button[type="submit"]').prop('disabled', true);

                $.ajax({
                    url: $form.attr('action'),
                    method: 'POST',
                    data: $form.serialize(),
                    dataType: 'json'
                })
                .done(function (res) {
                    showFlash('success', res.msg || 'Thank you. Your enquiry has been received.');
                    $form[0].reset();
                    $form.find('select').each(function () {
                        if ($(this).data('nice-select')) {
                            $(this).niceSelect('update');
                        }
                    });
                })
                .fail(function (xhr) {
                    var res = xhr.responseJSON || {};
                    var msg = res.msg;

                    if (!msg && res.errors) {
                        var keys = Object.keys(res.errors);
                        if (keys.length) {
                            msg = res.errors[keys[0]][0];
                        }
                    }

                    showFlash('error', msg || 'Something went wrong. Please check your details and try again.');
                })
                .always(function () {
                    $btn.prop('disabled', false);
                });
            });
        });
    </script>
@endpush
