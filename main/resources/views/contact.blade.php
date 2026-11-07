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
                            <h2>Have Questions? <span>Message</span> Us</h2>
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

                                    {{-- Secure Anti-Spam Verification Box --}}
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="secure-captcha-card">
                                            <div class="captcha-checkbox-row">
                                                <label class="captcha-check-label" for="captcha_verify">
                                                    <input type="checkbox" name="captcha_verify" id="captcha_verify" value="1" required>
                                                    <span class="captcha-custom-checkbox"><i class="fas fa-check"></i></span>
                                                    <span class="captcha-check-text">I am human &amp; verify this enquiry *</span>
                                                </label>
                                                <div class="captcha-shield-badge">
                                                    <i class="fas fa-shield-alt"></i>
                                                    <span>Anti-Spam Verified</span>
                                                </div>
                                            </div>

                                            <div class="captcha-math-row">
                                                <div class="math-question-badge">
                                                    <i class="fas fa-calculator"></i>
                                                    <span>Security Check:</span>
                                                    <strong id="captcha-question">{{ $captchaQuestion ?? '3 + 4' }}</strong>
                                                    <span>=</span>
                                                </div>
                                                <input type="number" name="captcha_answer" id="captcha_answer" class="captcha-math-input" placeholder="Answer *" required autocomplete="off">
                                                <button type="button" id="refresh-captcha" class="captcha-refresh-btn" title="Refresh Security Question">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                                <input type="hidden" name="captcha_token" id="captcha_token" value="{{ $captchaToken ?? '' }}">
                                            </div>

                                            <div class="captcha-note">
                                                <i class="fas fa-shield-virus"></i>
                                                <span>Promotional links &amp; web addresses are strictly blocked. Form saves to our system &amp; connects via WhatsApp.</span>
                                            </div>
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
            border-radius: 6px;
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

        /* Secure Anti-Spam Captcha Card */
        .secure-captcha-card {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 16px 20px;
            margin-bottom: 25px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .secure-captcha-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        }

        .captcha-checkbox-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding-bottom: 12px;
            border-bottom: 1px dashed #e2e8f0;
        }

        .captcha-check-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            user-select: none;
            margin-bottom: 0;
        }

        .captcha-check-label input[type="checkbox"] {
            display: none;
        }

        .captcha-custom-checkbox {
            width: 24px;
            height: 24px;
            border: 2px solid #94a3b8;
            border-radius: 6px;
            background: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .captcha-custom-checkbox i {
            color: #ffffff;
            font-size: 13px;
            display: none;
        }

        .captcha-check-label input[type="checkbox"]:checked + .captcha-custom-checkbox {
            background: var(--theme-color);
            border-color: var(--theme-color);
        }

        .captcha-check-label input[type="checkbox"]:checked + .captcha-custom-checkbox i {
            display: block;
        }

        .captcha-check-text {
            font-size: 14.5px;
            font-weight: 600;
            color: #1e293b;
        }

        .captcha-shield-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 600;
            color: #0369a1;
            background: #e0f2fe;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .captcha-shield-badge i {
            font-size: 13px;
            color: #0284c7;
        }

        .captcha-math-row {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            padding-top: 12px;
        }

        .math-question-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #0f172a;
            color: #ffffff;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
        }

        .math-question-badge i {
            color: var(--theme-color);
        }

        .math-question-badge strong {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #fbbf24;
        }

        .captcha-math-input {
            width: 100px !important;
            height: 42px !important;
            padding: 6px 12px !important;
            background: #ffffff !important;
            border: 1.5px solid #cbd5e1 !important;
            border-radius: 6px !important;
            font-size: 16px !important;
            font-weight: 700 !important;
            color: #0f172a !important;
            text-align: center !important;
            transition: border-color 0.2s ease;
        }

        .captcha-math-input:focus {
            border-color: var(--theme-color) !important;
            outline: none !important;
        }

        .captcha-refresh-btn {
            width: 42px;
            height: 42px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #475569;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .captcha-refresh-btn:hover {
            background: #f1f5f9;
            color: var(--theme-color);
            border-color: var(--theme-color);
        }

        .captcha-note {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 10px;
            font-size: 12px;
            color: #64748b;
            line-height: 1.4;
        }

        .captcha-note i {
            color: #10b981;
            font-size: 12px;
        }

        /* WhatsApp action link in success banner */
        .form-flash a.wa-btn-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
            padding: 8px 16px;
            background: #25d366;
            color: #ffffff !important;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s ease;
        }

        .form-flash a.wa-btn-link:hover {
            background: #1ebd56;
            color: #ffffff !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        jQuery(function ($) {
            var $form = $('#enquiry-form');
            var $flash = $('#form-flash');

            function showFlash(type, html) {
                $flash
                    .removeClass('success error')
                    .addClass(type)
                    .html(html)
                    .stop(true, true)
                    .fadeIn(200);
            }

            // Refresh Captcha Question via AJAX
            $('#refresh-captcha').on('click', function () {
                var $btn = $(this);
                var $icon = $btn.find('i').addClass('fa-spin');
                $.getJSON('{{ route("captcha.refresh") }}', function (res) {
                    if (res.ok && res.question) {
                        $('#captcha-question').text(res.question);
                        $('#captcha_token').val(res.token);
                        $('#captcha_answer').val('');
                    }
                }).always(function () {
                    setTimeout(function () { $icon.removeClass('fa-spin'); }, 400);
                });
            });

            $form.on('submit', function (e) {
                e.preventDefault();

                var name = $.trim($form.find('[name="name"]').val());
                var phone = $.trim($form.find('[name="phone"]').val());
                var email = $.trim($form.find('[name="email"]').val());
                var location = $.trim($form.find('[name="location"]').val());
                var service = $.trim($form.find('[name="service"]').val());
                var message = $.trim($form.find('[name="message"]').val());
                var isVerified = $form.find('[name="captcha_verify"]').is(':checked');
                var captchaAns = $.trim($form.find('[name="captcha_answer"]').val());

                if (name.length < 2) {
                    showFlash('error', '<i class="fas fa-exclamation-triangle"></i> Please enter your name (at least 2 characters).');
                    return;
                }

                if (!/^[0-9+\s\-()]{10,25}$/.test(phone)) {
                    showFlash('error', '<i class="fas fa-exclamation-triangle"></i> Please enter a valid phone number (at least 10 digits).');
                    return;
                }

                // Anti-link validation (blocks promotional spam)
                var linkRegex = /(https?:\/\/|www\.[a-z0-9\-\.]+|[a-z0-9\-\.]+\.(com|org|net|io|ru|xyz|biz|info|site|online|top|me|co|cc|in|us|cn|live|shop|club|fun|buzz|icu|vip|pro)\b|<a\b|\[url|href=)/i;
                if (linkRegex.test(name) || linkRegex.test(location) || linkRegex.test(message) || linkRegex.test(service)) {
                    showFlash('error', '<i class="fas fa-ban"></i> Links, promotional URLs, and website addresses are strictly not permitted. Please remove any web addresses before submitting.');
                    return;
                }

                if (!isVerified) {
                    showFlash('error', '<i class="fas fa-shield-alt"></i> Please verify that you are human by checking the security checkbox.');
                    return;
                }

                if (!captchaAns) {
                    showFlash('error', '<i class="fas fa-calculator"></i> Please solve the security check question.');
                    return;
                }

                var $btn = $form.find('button[type="submit"]').prop('disabled', true);
                var originalBtnHtml = $btn.html();
                $btn.html('<i class="fas fa-spinner fa-spin"></i><span>Securing &amp; Submitting...</span>');

                $.ajax({
                    url: $form.attr('action'),
                    method: 'POST',
                    data: $form.serialize(),
                    dataType: 'json'
                })
                .done(function (res) {
                    if (res.ok) {
                        var waUrl = res.whatsapp_url;
                        var successHtml = '<div style="display:flex; flex-direction:column; gap:8px;">'
                            + '<div><i class="fas fa-check-circle" style="color:#1d7a44; margin-right:6px;"></i><strong>' + (res.msg || 'Thank you! Your enquiry has been received and saved.') + '</strong></div>';

                        if (waUrl) {
                            successHtml += '<div>Opening WhatsApp to connect directly with our engineering team...</div>'
                                + '<div><a href="' + waUrl + '" class="wa-btn-link" target="_blank"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a></div>';
                        }
                        successHtml += '</div>';

                        showFlash('success', successHtml);

                        // Reset form fields
                        $form[0].reset();
                        $form.find('select').each(function () {
                            if ($(this).data('nice-select')) {
                                $(this).niceSelect('update');
                            }
                        });

                        // Refresh captcha challenge for next submission
                        $('#refresh-captcha').trigger('click');

                        // Redirect to WhatsApp with pre-filled message
                        if (waUrl) {
                            setTimeout(function () {
                                window.location.href = waUrl;
                            }, 1200);
                        }
                    } else {
                        showFlash('error', '<i class="fas fa-exclamation-circle"></i> ' + (res.msg || 'Submission error. Please check details and try again.'));
                        $('#refresh-captcha').trigger('click');
                    }
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

                    showFlash('error', '<i class="fas fa-exclamation-circle"></i> ' + (msg || 'Something went wrong. Please check your details and try again.'));
                    $('#refresh-captcha').trigger('click');
                })
                .always(function () {
                    $btn.prop('disabled', false);
                    $btn.html(originalBtnHtml);
                });
            });
        });
    </script>
@endpush
