@extends('layouts.app')

@section('title', 'Projects & Installations - TEMAX Furnace Camera Systems Across India')
@section('meta_description', 'View successful TEMAX installations across cement plants, 600MW thermal utility plants, captive power plants and glass furnaces across India.')

@section('content')

    @php
        $countByType = $projects->groupBy('type');
    @endphp

    @include('partials.page-title', ['pageTitle' => 'Projects'])

    <!-- projects portfolio: category filter + card grid (same style as Products) -->
    <section class="vp-section">
        <div class="auto-container">
            @if ($projects->count())
                <div class="vh-title">
                    <h6>Our Track Record</h6>
                    <h2>Projects &amp; <span>Installations</span></h2>
                    <p>Real TEMAX cameras working in plants across India.</p>
                </div>

                <div class="vp-bar" id="vp-bar">
                    <label class="vp-search">
                        <span class="visually-hidden">Search projects</span>
                        <input type="search" id="vp-search" placeholder="Search projects..." autocomplete="off">
                    </label>
                    <div class="vp-chips" role="group" aria-label="Filter by industry">
                        <button type="button" class="vp-chip is-active" data-cat="all">All <small>{{ $projects->count() }}</small></button>
                        @foreach ($types as $type)
                            <button type="button" class="vp-chip" data-cat="type-{{ \Illuminate\Support\Str::slug($type) }}">{{ $type }} <small>{{ $countByType[$type]->count() ?? 0 }}</small></button>
                        @endforeach
                    </div>
                </div>

                <p class="vp-count" aria-live="polite"><span id="vp-shown">{{ $projects->count() }}</span> of {{ $projects->count() }} projects</p>

                <div class="row clearfix vp-grid">
                    @foreach ($projects as $project)
                        <div class="col-xl-4 col-md-6 col-sm-12 vp-col" data-cat="type-{{ \Illuminate\Support\Str::slug($project->type) }}" data-text="{{ \Illuminate\Support\Str::lower($project->title . ' ' . $project->text . ' ' . $project->place . ' ' . $project->type) }}">
                            <article class="vp-card">
                                <a class="vp-card-img vp-card-img-lg" href="{{ route('projects.show', $project->id) }}" tabindex="-1" aria-hidden="true">
                                    <img src="{{ asset(optional($project->images->first())->path ?: 'assets/images/project/project-1.jpg') }}" alt="{{ $project->title }}" loading="lazy">
                                </a>
                                <div class="vp-card-body">
                                    <span class="vp-card-tag">{{ $project->type ?: 'Project' }}</span>
                                    <h3><a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></h3>
                                    @if ($project->place)
                                        <p class="vp-card-place"><i class="flaticon-nut"></i> {{ $project->place }}</p>
                                    @endif
                                    <p>{{ \Illuminate\Support\Str::limit($project->text, 110) }}</p>
                                    <a href="{{ route('projects.show', $project->id) }}" class="vp-card-link">View project <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <p class="vp-empty" id="vp-empty" hidden>No projects match your search.</p>
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
