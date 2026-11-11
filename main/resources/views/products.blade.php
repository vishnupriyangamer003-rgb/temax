@extends('layouts.app')

@section('title', 'Products - Furnace Cameras, Cooling, Industry Systems & Thermal Cameras | TEMAX')
@section('meta_description', 'High-temperature industrial products by TEMAX: Furnace camera tubes, inclined 90° cameras, kiln cowl shell cameras, SS 316 cooling and auto retraction systems, sensor and control panels, and thermal cameras.')

@section('content')

    @include('partials.page-title', ['pageTitle' => 'Products'])

    @php
        $totalProducts = $categories->sum(fn ($c) => $c->items->count());
        $itemImages = [
            'furnace camera tube' => 'kiln-camera.jpg',
            'inclined 90' => 'camera-tube.jpg',
            '15 feet furnace camera' => 'products/long-camera.svg',
            'fixed camera for cement' => 'products/fixed-camera.svg',
            'under grate' => 'under-grate.jpg',
            'cowl shell' => 'products/cowl-camera.svg',
            'retrofit camera' => 'retrofit-camera.jpg',
            'specialised furnace' => 'custom-camera.png',
            'ss 316 cooling' => 'cooling-system.jpg',
            'auto retraction' => 'auto-retraction.png',
            'sensor panel' => 'products/sensor-panel.svg',
            'control panel' => 'control-panel.jpg',
            'air cooling' => 'products/air-cooling.svg',
            'cyclone' => 'products/cyclone-camera.svg',
            'captive power' => 'captive-power.jpg',
            '600mw' => 'power-600mw.jpg',
            'glass melting' => 'glass-furnace.png',
            'cement cooler' => 'cement-cooler.png',
            'zylo' => 'products/thermal-zylo.svg',
            'dpc' => 'products/thermal-dpc.svg',
            'kiln shell monitoring' => 'products/thermal-shell.svg',
            'thermal' => 'thermal-camera.jpg',
        ];
        $imageFor = function ($name, $fallback) use ($itemImages) {
            $n = \Illuminate\Support\Str::lower($name);
            foreach ($itemImages as $key => $file) {
                if (str_contains($n, $key)) { return 'assets/images/temax/' . $file; }
            }
            return $fallback ?: 'assets/images/service/service-1.jpg';
        };
    @endphp

    <!-- products portfolio: search + category filter + card grid -->
    <section class="vp-section">
        <div class="auto-container">
            <div class="vh-title">
                <h6>Products</h6>
                <h2>Explore Our <span>Product</span> Range</h2>
                <p>High-temperature viewing systems for every plant need.</p>
            </div>

            <div class="vp-bar" id="vp-bar">
                <label class="vp-search">
                    <span class="visually-hidden">Search products</span>
                    <input type="search" id="vp-search" placeholder="Search products..." autocomplete="off">
                </label>
                <div class="vp-chips" role="group" aria-label="Filter by category">
                    <button type="button" class="vp-chip is-active" data-cat="all">All <small>{{ $totalProducts }}</small></button>
                    @foreach ($categories as $category)
                        <button type="button" class="vp-chip" data-cat="cat-{{ $category->id }}">{{ $category->title }} <small>{{ $category->items->count() }}</small></button>
                    @endforeach
                </div>
            </div>

            <p class="vp-count" aria-live="polite"><span id="vp-shown">{{ $totalProducts }}</span> of {{ $totalProducts }} products</p>

            <div class="row clearfix vp-grid">
                @foreach ($categories as $category)
                    @foreach ($category->items as $item)
                        <div class="col-xl-3 col-md-6 col-sm-12 vp-col" data-cat="cat-{{ $category->id }}" data-text="{{ \Illuminate\Support\Str::lower($item->name . ' ' . $item->description . ' ' . $category->title) }}">
                            <article class="vp-card">
                                <figure class="vp-card-img"><img src="{{ asset($imageFor($item->name, $category->image)) }}" alt="{{ $item->name }}" loading="lazy"></figure>
                                <div class="vp-card-body">
                                    <span class="vp-card-tag">{{ $category->title }}</span>
                                    <h3>{{ $item->name }}</h3>
                                    @if ($item->description)
                                        <p>{{ $item->description }}</p>
                                    @endif
                                    <a href="{{ route('contact') }}" class="vp-card-link">Request a quote <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @endforeach
            </div>

            <p class="vp-empty" id="vp-empty" hidden>No products match your search.</p>
        </div>
    </section>

    @include('partials.cta')

@endsection

@push('scripts')
    <script>
        (function () {
            var bar = document.getElementById('vp-bar');
            if (!bar) return;
            var input = document.getElementById('vp-search');
            var chips = bar.querySelectorAll('.vp-chip');
            var cols = document.querySelectorAll('.vp-col');
            var shown = document.getElementById('vp-shown');
            var empty = document.getElementById('vp-empty');
            var cat = 'all';

            function apply() {
                var q = input.value.trim().toLowerCase(), n = 0;
                Array.prototype.forEach.call(cols, function (c) {
                    var ok = (cat === 'all' || c.getAttribute('data-cat') === cat) &&
                             (q === '' || c.getAttribute('data-text').indexOf(q) !== -1);
                    c.hidden = !ok;
                    if (ok) n++;
                });
                shown.textContent = n;
                empty.hidden = n !== 0;
            }
            Array.prototype.forEach.call(chips, function (chip) {
                chip.addEventListener('click', function () {
                    cat = chip.getAttribute('data-cat');
                    Array.prototype.forEach.call(chips, function (c) { c.classList.toggle('is-active', c === chip); });
                    apply();
                });
            });
            input.addEventListener('input', apply);
        })();
    </script>
@endpush
