{{-- Reusable company slogan banner (above footer) --}}
<section class="download-section temax-slogan-section">
    <div class="bg-layer"></div>
    <div class="auto-container">
        <div class="slogan-wrapper">
            <div class="slogan-content">
                <div class="icon-box"><i class="flaticon-approved"></i></div>
                <div class="inner">
                    <h4>{!! setting('cta_slogan', 'Pioneering High-Temperature Furnace &amp; Kiln Viewing Systems Since 1996 — Precision Engineered in India.') !!}</h4>
                </div>
            </div>
            <div class="slogan-action">
                <a href="{{ route('contact') }}" class="theme-btn btn-two text-nowrap">
                    <span>{{ setting('cta_btn_text', 'Contact Us') }}</span>
                    <i class="flaticon-right-arrow"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <style>
        .download-section.temax-slogan-section {
            padding: 24px 0;
            position: relative;
            background-color: var(--theme-color);
            overflow: hidden;
        }

        .download-section.temax-slogan-section .bg-layer {
            position: absolute;
            top: 0;
            right: 0;
            width: 35%;
            height: 100%;
            background-color: #fc682d;
            clip-path: polygon(15% 0, 100% 0, 100% 100%, 0% 100%);
        }

        .download-section.temax-slogan-section .slogan-wrapper {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .download-section.temax-slogan-section .slogan-content {
            display: flex;
            align-items: center;
            gap: 22px;
            flex: 1;
            min-width: 0;
        }

        .download-section.temax-slogan-section .slogan-content .icon-box {
            width: 54px;
            height: 54px;
            min-width: 54px;
            background: rgba(255, 255, 255, 0.22);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 26px;
            flex-shrink: 0;
        }

        .download-section.temax-slogan-section .slogan-content h4 {
            color: #ffffff;
            font-size: 21px;
            line-height: 30px;
            font-weight: 600;
            margin: 0;
            letter-spacing: -0.2px;
        }

        .download-section.temax-slogan-section .slogan-action {
            flex-shrink: 0;
        }

        .download-section.temax-slogan-section .slogan-action .theme-btn {
            background-color: #ffffff;
            color: var(--title-color);
            padding: 14px 28px;
            font-size: 14px;
            font-weight: 700;
            border-radius: 6px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.35s ease;
        }

        .download-section.temax-slogan-section .slogan-action .theme-btn:hover {
            background-color: var(--secondary-color);
            color: #ffffff;
        }

        .download-section.temax-slogan-section .slogan-action .theme-btn:hover i {
            color: var(--theme-color);
        }

        @media (max-width: 991px) {
            .download-section.temax-slogan-section {
                padding: 28px 0;
            }

            .download-section.temax-slogan-section .slogan-wrapper {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .download-section.temax-slogan-section .slogan-content {
                flex-direction: column;
                gap: 12px;
            }

            .download-section.temax-slogan-section .slogan-content h4 {
                font-size: 18px;
                line-height: 26px;
            }

            .download-section.temax-slogan-section .bg-layer {
                width: 100%;
                clip-path: none;
            }
        }
    </style>
@endpush
