{{-- Reusable contact CTA bar (Metallic "download-section", repurposed — no PDFs on this site) --}}
<section class="download-section">
    <div class="bg-layer"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                <div class="single-item pr_35">
                    <div class="text-box">
                        <div class="icon-box"><i class="flaticon-chat"></i></div>
                        <div class="inner">
                            <h4>Talk to Our Engineers</h4>
                            <h6>{{ setting('email') }}</h6>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="cta-arrow"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                <div class="single-item pl_35">
                    <div class="text-box">
                        <div class="icon-box"><i class="flaticon-phone"></i></div>
                        <div class="inner">
                            <h4>Request a Free Quote</h4>
                            <h6>{{ setting('phone_display', setting('phone')) }}</h6>
                        </div>
                    </div>
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}" class="cta-arrow"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <style>
        /* CTA arrows inside the download-section bar (theme styles only target <button>) */
        .download-section .single-item .cta-arrow {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 50px;
            line-height: 54px;
            background-color: #fff;
            text-align: center;
            font-size: 20px;
            color: var(--title-color);
            text-decoration: none;
            transition: all 500ms ease;
        }

        .download-section .single-item .cta-arrow:hover {
            color: var(--theme-color);
        }
    </style>
@endpush
