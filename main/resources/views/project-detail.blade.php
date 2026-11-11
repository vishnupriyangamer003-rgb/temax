@extends('layouts.app')

@section('title', $project->title . ' - TEMAX Projects')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($project->text), 160))

@section('content')

    @php
        $images = $project->images->values();
        $cover = $images->first()->path ?? 'assets/images/project/project-1.jpg';
        $gallery = $images->slice(1)->values();
    @endphp

    @include('partials.page-title', ['pageTitle' => 'Project Details'])

    <!-- project-details -->
    <section class="project-details">
        <div class="auto-container">
            <div class="upper-box mb_75">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <figure class="image-box"><img src="{{ asset($cover) }}" alt="{{ $project->title }}"></figure>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h2>{{ $project->title }}</h2>
                            <p>{{ $project->text }}</p>
                            @if (!empty($project->type) || !empty($project->place))
                                <h3>Project Scope</h3>
                                <ul class="list-style-one clearfix mt_25">
                                    @if (!empty($project->type))
                                        <li><i class="flaticon-check"></i><span>Industry: {{ $project->type }}</span></li>
                                    @endif
                                    @if (!empty($project->place))
                                        <li><i class="flaticon-check"></i><span>Location: {{ $project->place }}</span></li>
                                    @endif
                                    <li><i class="flaticon-check"></i><span>Supplied, installed and commissioned by TEMAX, Karur</span></li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-box mb_75">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-filter-1"></i></div>
                            <div class="inner">
                                <span>Category</span>
                                <h5>{{ $project->type ?: 'Project' }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-home"></i></div>
                            <div class="inner">
                                <span>Location</span>
                                <h5>{{ $project->place ?: 'India' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($gallery->count())
                <div class="lower-box pb_40">
                    <div class="text-box centred">
                        <h3>Project Gallery</h3>
                        <p>Images from this TEMAX installation.</p>
                    </div>
                    <div class="row clearfix">
                        @foreach ($gallery as $image)
                            <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                                <div class="single-item">
                                    <figure class="image-box"><img src="{{ asset($image->path) }}" alt="{{ $project->title }}"></figure>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($others->count())
                <div class="related-project">
                    <div class="vh-title">
                        <h6>More installations</h6>
                        <h2>Related <span>Projects</span></h2>
                    </div>
                    <div class="row clearfix vp-grid vp-grid--hover">
                        @foreach ($others as $other)
                            <div class="col-xl-4 col-md-6 col-sm-12 vp-col">
                                <article class="vp-card">
                                    <a class="vp-card-img vp-card-img-lg" href="{{ route('projects.show', $other->id) }}" tabindex="-1" aria-hidden="true">
                                        <img src="{{ asset(optional($other->images->first())->path ?: 'assets/images/project/project-1.jpg') }}" alt="{{ $other->title }}" loading="lazy">
                                    </a>
                                    <div class="vp-card-body">
                                        <span class="vp-card-tag">{{ $other->type ?: 'Project' }}</span>
                                        <h3><a href="{{ route('projects.show', $other->id) }}">{{ $other->title }}</a></h3>
                                        <div class="vp-extra">
                                            @if ($other->place)
                                                <p class="vp-card-place"><i class="flaticon-nut"></i> {{ $other->place }}</p>
                                            @endif
                                            <p>{{ \Illuminate\Support\Str::limit($other->text, 110) }}</p>
                                            <a href="{{ route('projects.show', $other->id) }}" class="vp-card-link">View project <i class="flaticon-right-arrow"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- project-details end -->

    @include('partials.cta')

@endsection
