@extends('layouts.app')

@section('title', 'Projects & Installations - TEMAX Furnace Camera Systems Across India')

@section('content')

    @php
        $typeIndex = [];
        foreach ($types as $i => $type) {
            $typeIndex[$type] = $i + 1;
        }

        $countByType = $projects->groupBy('type');
    @endphp

    @include('partials.page-title', ['pageTitle' => 'Projects'])

    <!-- project-style-three -->
    <section class="project-style-three">
        <div class="auto-container">
            @if ($projects->count())
                <div class="sortable-masonry">
                    <div class="filters centred">
                        <ul class="filter-tabs filter-btns mb_55">
                            <li class="active filter" data-role="button" data-filter=".all"><i class="flaticon-nut"></i><span>All [{{ $projects->count() }}]</span></li>
                            @foreach ($types as $type)
                                <li class="filter" data-role="button" data-filter=".cat-{{ $typeIndex[$type] }}"><span>{{ $type }} [{{ $countByType[$type]->count() ?? 0 }}]</span></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="items-container row clearfix">
                        @foreach ($projects as $project)
                            <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all {{ isset($typeIndex[$project->type]) ? 'cat-' . $typeIndex[$project->type] : '' }}">
                                <div class="project-block-two">
                                    <div class="inner-box">
                                        <div class="bg-layer" style="background-image: url({{ asset(optional($project->images->first())->path ?: 'assets/images/project/project-1.jpg') }});"></div>
                                        <div class="upper-box">
                                            <h3><a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></h3>
                                        </div>
                                        <div class="lower-box">
                                            <h6><i class="flaticon-nut"></i><span>{{ $project->type ?: 'Project' }}</span></h6>
                                            <div class="link"><a href="{{ route('projects.show', $project->id) }}"><i class="flaticon-right-arrow"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="sec-title centred mb_45">
                    <h6>Our Track Record</h6>
                    <h2>Projects Coming <span>[Soon]</span></h2>
                    <p class="mt_12">New installations are being added to this section.</p>
                </div>
            @endif
        </div>
    </section>
    <!-- project-style-three end -->

    @include('partials.cta')

@endsection
