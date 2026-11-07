@extends('layouts.app')

@section('title', 'Products - Furnace Cameras, Cooling, Industry Systems & Thermal Cameras | TEMAX')
@section('meta_description', 'High-temperature industrial products by TEMAX: Furnace camera tubes, inclined 90° cameras, kiln cowl shell cameras, SS 316 cooling systems, and kiln shell thermal cameras.')

@section('content')

    @php
        $catIcons = ['flaticon-zoom', 'flaticon-steel', 'flaticon-pistons', 'flaticon-thunder-bolt'];
    @endphp

    @include('partials.page-title', ['pageTitle' => 'Products'])

    <!-- products-section -->
    <section class="products-section">
        <div class="auto-container">
            <div class="sec-title mb_45 centred">
                <h6>Products</h6>
                <h2>Explore Our <span>Product</span> Range</h2>
                <p class="mt_12">High-temperature viewing systems for every plant need.</p>
            </div>
            <div class="row clearfix">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-6 col-sm-12 product-column d-flex">
                        <div class="product-block-one w-100 wow fadeInUp animated" data-wow-delay="{{ str_pad($loop->index * 300, 4, '0', STR_PAD_LEFT) }}ms" data-wow-duration="1500ms">
                            <div class="inner-box d-flex flex-column h-100 w-100">
                                <div class="light-icon"><img src="{{ asset('assets/images/icons/icon-18.png') }}" alt=""></div>
                                <h3>{{ $category->title }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit($category->description, 110) }}</p>
                                <h6>{{ $category->items->count() }} products</h6>
                                <div class="icon-box"><i class="{{ $catIcons[$loop->index % count($catIcons)] }}"></i></div>
                                <div class="btn-box"><a href="#cat-{{ \Illuminate\Support\Str::slug($category->title) }}"><i class="flaticon-right-arrow"></i><span>View Items</span></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- products-section end -->

    <!-- product categories detail -->
    <section class="product-catalog-section">
        <div class="auto-container">
            @foreach ($categories as $category)
                <div class="product-cat-block" id="cat-{{ \Illuminate\Support\Str::slug($category->title) }}">
                    <div class="row clearfix align-items-center">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column {{ $loop->index % 2 === 1 ? 'order-lg-2' : '' }}">
                            <figure class="image-box">
                                <img src="{{ asset($category->image ?: 'assets/images/service/service-1.jpg') }}" alt="{{ $category->title }}">
                            </figure>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column {{ $loop->index % 2 === 1 ? 'order-lg-1' : '' }}">
                            <div class="content-box">
                                <div class="sec-title mb_25">
                                    <h6>Product Range</h6>
                                    <h2>{{ $category->title }}</h2>
                                </div>
                                <p class="cat-desc">{{ $category->description }}</p>
                                <ul class="product-items clearfix">
                                    @foreach ($category->items as $item)
                                        <li>
                                            <div class="item-icon"><i class="flaticon-tick"></i></div>
                                            <div class="item-inner">
                                                <h4>{{ $item->name }}</h4>
                                                @if ($item->description)
                                                    <p>{{ $item->description }}</p>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('contact') }}" class="theme-btn btn-one mt_15"><i class="flaticon-right-arrow"></i><span>Request a Quote</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- product categories end -->

    @include('partials.cta')

@endsection

@push('styles')
    <style>
        .product-catalog-section {
            position: relative;
            padding: 20px 0 112px;
        }

        .product-cat-block {
            padding: 70px 0;
            border-top: 1px solid #e6e9ed;
            scroll-margin-top: 120px;
        }

        .product-cat-block:first-child {
            border-top: 0;
            padding-top: 20px;
        }

        .product-cat-block .image-box {
            position: relative;
            display: block;
            overflow: hidden;
            border-radius: 8px;
        }

        .product-cat-block .image-box img {
            display: block;
            width: 100%;
            height: 100%;
            min-height: 380px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-cat-block .cat-desc {
            margin-bottom: 25px;
        }

        .product-items {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px 24px;
            margin: 0 0 20px;
            padding: 0;
            list-style: none;
        }

        @media (max-width: 767px) {
            .product-items {
                grid-template-columns: 1fr;
                gap: 8px;
            }
        }

        .product-items li {
            position: relative;
            display: block;
            padding: 10px 0 10px 30px;
            border-bottom: 1px solid #edf0f4;
        }

        .product-items li .item-icon {
            position: absolute;
            left: 0;
            top: 12px;
            font-size: 16px;
            color: var(--theme-color);
        }

        .product-items li .item-inner {
            padding-left: 0;
        }

        .product-items li h4 {
            display: block;
            font-size: 16px;
            line-height: 22px;
            font-family: var(--title-font);
            font-weight: 600;
            color: var(--title-color);
            margin: 0 0 3px;
        }

        .product-items li p {
            display: block;
            margin: 0;
            font-size: 13.5px;
            line-height: 19px;
            color: #6b7280;
        }
    </style>
@endpush
