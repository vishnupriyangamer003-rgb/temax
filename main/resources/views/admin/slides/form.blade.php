@extends('admin.layouts.app')

@section('title', $slide ? 'Edit Slide' : 'Add Slide')
@section('page_title', $slide ? 'Edit Banner Slide' : 'Add Banner Slide')

@section('content')
<div class="card" style="max-width:750px;">
    <div class="card-header">
        <h3>{{ $slide ? 'Edit: ' . $slide->title . ' ' . $slide->highlight : 'New Banner Slide' }}</h3>
        <a href="{{ route('admin.slides.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back to List</a>
    </div>

    <div class="card-body">
        <form action="{{ $slide ? route('admin.slides.update', $slide->id) : route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($slide) @method('PUT') @endif

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                <div class="form-group">
                    <label class="form-label" for="title">Heading *</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="e.g. See" value="{{ old('title', $slide->title ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="highlight">Highlighted words (orange)</label>
                    <input type="text" name="highlight" id="highlight" class="form-control" placeholder="e.g. Inside Your Furnace" value="{{ old('highlight', $slide->highlight ?? '') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="text">Description</label>
                <textarea name="text" id="text" rows="3" class="form-control">{{ old('text', $slide->text ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Banner Image {{ $slide ? '' : '*' }}</label>
                @if ($slide && $slide->image)
                    <div style="margin-bottom:10px;"><img src="{{ asset($slide->image) }}" alt="" style="max-width:260px; height:auto; border-radius:6px; border:1px solid #e2e8f0;"></div>
                @endif
                <input type="file" name="image_file" class="form-control" accept="image/*" {{ $slide ? '' : 'required' }}>
                <small style="color:var(--text-muted); display:block; margin-top:4px;">Wide landscape photo, at least 1600×700px.</small>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                <div class="form-group">
                    <label class="form-label" for="sort_order">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control" min="0" value="{{ old('sort_order', $slide->sort_order ?? (\App\Models\HomeSlide::max('sort_order') + 1)) }}">
                </div>
                <div class="form-group" style="padding-top:28px;">
                    <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slide->is_active ?? true) ? 'checked' : '' }}>
                        <span class="form-label" style="margin:0;">Active / Visible</span>
                    </label>
                </div>
            </div>

            <div style="display:flex; gap:12px; margin-top:24px;">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ $slide ? 'Update Slide' : 'Create Slide' }}</button>
                <a href="{{ route('admin.slides.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
