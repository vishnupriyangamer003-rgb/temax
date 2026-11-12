@extends('layouts.app')

@section('title', 'Projects & Installations - TEMAX Furnace Camera Systems Across India')
@section('meta_description', 'View successful TEMAX installations across cement plants, 600MW thermal utility plants, captive power plants and glass furnaces across India.')

@section('content')

    @php
        $featured = $projects->where('is_featured', true);
        $others = $projects->where('is_featured', false);
        $countByType = $projects->groupBy('type');
        $countByClient = $projects->groupBy('client');
        $img = fn ($p) => asset(optional($p->images->first())->path ?: 'assets/images/project/project-1.jpg');
        $attrs = fn ($p) => 'data-cat="type-' . \Illuminate\Support\Str::slug($p->type) . '" data-client="' . e(\Illuminate\Support\Str::lower((string) $p->client)) . '" data-name="' . e(\Illuminate\Support\Str::lower($p->title)) . '"';
    @endphp

    @include('partials.page-title', ['pageTitle' => 'Projects'])

    <section class="vp-section">
        <div class="auto-container">
            @if ($projects->count())
                <div class="vh-title">
                    <h6>Our Track Record</h6>
                    <h2>Projects &amp; <span>Installations</span></h2>
                    <p>Real TEMAX cameras working in plants across India.</p>
                </div>

                <div class="row clearfix vpj-layout">
                    {{-- side tab: filters --}}
                    <aside class="col-lg-3 col-md-12" id="vp-bar">
                        <div class="vpj-side">
                            <button type="button" class="vpj-side-toggle" aria-expanded="false" aria-controls="vpj-side-body">Filter projects <i class="fas fa-sliders-h"></i></button>
                            <div class="vpj-side-body" id="vpj-side-body">
                                    <div class="vpj-group" data-group="client">
                                        <h4>Client</h4>
                                        <div class="vpj-chips">
                                            <button type="button" class="vpj-chip is-active" data-client="all">All clients <small>{{ $projects->count() }}</small></button>
                                            @foreach ($clients as $client)
                                                <button type="button" class="vpj-chip" data-client="{{ \Illuminate\Support\Str::lower($client) }}">{{ $client }} <small>{{ $countByClient[$client]->count() ?? 0 }}</small></button>
                                            @endforeach
                                        </div>
                                        @unless ($clients->count())<p class="vpj-hint">Client names will appear here once added.</p>@endunless
                                    </div>
                                

                                <div class="vpj-group" data-group="cat">
                                    <h4>Industry</h4>
                                    <div class="vpj-chips">
                                        <button type="button" class="vpj-chip is-active" data-cat="all">All industries <small>{{ $projects->count() }}</small></button>
                                        @foreach ($types as $type)
                                            <button type="button" class="vpj-chip" data-cat="type-{{ \Illuminate\Support\Str::slug($type) }}">{{ $type }} <small>{{ $countByType[$type]->count() ?? 0 }}</small></button>
                                        @endforeach
                                    </div>
                                </div>

                                <button type="button" class="vpj-clear" id="vpj-clear">Clear filters</button>
                            </div>
                        </div>
                    </aside>

                    {{-- results --}}
                    <div class="col-lg-9 col-md-12">
                        <p class="vp-count" aria-live="polite"><span id="vp-shown">{{ $projects->count() }}</span> of {{ $projects->count() }} projects</p>

                        @if ($featured->count())
                            <div class="vpj-section" data-section>
                                <h3 class="vpj-heading"><i class="fas fa-star"></i> Featured projects</h3>
                                @foreach ($featured as $project)
                                    <article class="vpj-item vpj-feature" {!! $attrs($project) !!}>
                                        <a class="vpj-feature-img" href="{{ route('projects.show', $project->id) }}" tabindex="-1" aria-hidden="true"><img src="{{ $img($project) }}" alt="{{ $project->title }}" loading="lazy"></a>
                                        <div class="vpj-feature-body">
                                            <span class="vpj-badge"><i class="fas fa-star"></i> Featured</span>
                                            <p class="vpj-client">{{ $project->client ?: ($project->place ?: 'TEMAX customer') }}</p>
                                            <h3><a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></h3>
                                            <p class="vpj-meta"><span class="vp-card-tag">{{ $project->type ?: 'Project' }}</span>@if ($project->place)<span><i class="flaticon-nut"></i> {{ $project->place }}</span>@endif</p>
                                            <p>{{ \Illuminate\Support\Str::limit($project->text, 170) }}</p>
                                            <a href="{{ route('projects.show', $project->id) }}" class="vp-card-link">View project <i class="flaticon-right-arrow"></i></a>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        @endif

                        @if ($others->count())
                            <div class="vpj-section" data-section>
                                @if ($featured->count())<h3 class="vpj-heading">All projects</h3>@endif
                                <div class="row clearfix vp-grid">
                                    @foreach ($others as $project)
                                        <div class="col-xl-6 col-md-6 col-sm-12 vpj-item" {!! $attrs($project) !!}>
                                            <article class="vp-card">
                                                <a class="vp-card-img vp-card-img-lg" href="{{ route('projects.show', $project->id) }}" tabindex="-1" aria-hidden="true"><img src="{{ $img($project) }}" alt="{{ $project->title }}" loading="lazy"></a>
                                                <div class="vp-card-body">
                                                    <p class="vpj-client">{{ $project->client ?: ($project->place ?: 'TEMAX customer') }}</p>
                                                    <h3><a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></h3>
                                                    <span class="vp-card-tag">{{ $project->type ?: 'Project' }}</span>
                                                    @if ($project->place)
                                                        <p class="vp-card-place"><i class="flaticon-nut"></i> {{ $project->place }}</p>
                                                    @endif
                                                    <a href="{{ route('projects.show', $project->id) }}" class="vp-card-link">View project <i class="flaticon-right-arrow"></i></a>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <p class="vp-empty" id="vp-empty" hidden>No projects match your filters.</p>
                    </div>
                </div>
            @else
                <div class="vh-title text-center">
                    <h6>Our Track Record</h6>
                    <h2>Projects Coming <span>Soon</span></h2>
                    <p>New installations are being added to this section.</p>
                </div>
            @endif
        </div>
    </section>

    @include('partials.cta')

@endsection

@push('scripts')
    <script>
        (function () {
            var bar = document.getElementById('vp-bar');
            if (!bar) return;
            var items = document.querySelectorAll('.vpj-item');
            var sections = document.querySelectorAll('[data-section]');
            var shown = document.getElementById('vp-shown');
            var empty = document.getElementById('vp-empty');
            var state = { cat: 'all', client: 'all' };

            function apply() {
                var n = 0;
                Array.prototype.forEach.call(items, function (it) {
                    var ok = (state.cat === 'all' || it.getAttribute('data-cat') === state.cat) &&
                             (state.client === 'all' || it.getAttribute('data-client') === state.client);
                    it.hidden = !ok;
                    if (ok) n++;
                });
                Array.prototype.forEach.call(sections, function (s) { s.hidden = !s.querySelector('.vpj-item:not([hidden])'); });
                shown.textContent = n;
                empty.hidden = n !== 0;
            }
            Array.prototype.forEach.call(bar.querySelectorAll('.vpj-group[data-group]'), function (group) {
                var key = group.getAttribute('data-group');
                var btns = group.querySelectorAll('.vpj-chip');
                Array.prototype.forEach.call(btns, function (b) {
                    b.addEventListener('click', function () {
                        state[key] = b.getAttribute('data-' + key);
                        Array.prototype.forEach.call(btns, function (x) { x.classList.toggle('is-active', x === b); });
                        apply();
                    });
                });
            });
            document.getElementById('vpj-clear').addEventListener('click', function () {
                state.cat = 'all'; state.client = 'all';
                Array.prototype.forEach.call(bar.querySelectorAll('.vpj-group[data-group]'), function (g) {
                    Array.prototype.forEach.call(g.querySelectorAll('.vpj-chip'), function (x, i) { x.classList.toggle('is-active', i === 0); });
                });
                apply();
            });
            var toggle = bar.querySelector('.vpj-side-toggle');
            toggle.addEventListener('click', function () {
                var open = bar.querySelector('.vpj-side').classList.toggle('is-open');
                toggle.setAttribute('aria-expanded', open);
            });
        })();
    </script>
@endpush
