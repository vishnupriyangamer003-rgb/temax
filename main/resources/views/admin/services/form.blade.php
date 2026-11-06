@extends('admin.layouts.app')

@section('title', ($service ? 'Edit ' . $service->title : 'Add Service'))
@section('page_title', ($service ? 'Edit Service' : 'Create Service'))

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Back to Services
    </a>
</div>

<div class="card" style="max-width:850px;">
    <div class="card-header">
        <h3>{{ $service ? 'Edit: ' . $service->title : 'New Service' }}</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $service ? route('admin.services.update', $service->id) : route('admin.services.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($service)
                @method('PUT')
            @endif

            <div style="display:grid; grid-template-columns:2fr 1fr; gap:20px; margin-bottom:20px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Service Title *</label>
                    <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" required style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
                </div>
                <div>
                    <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Badge (optional)</label>
                    <input type="text" name="badge" value="{{ old('badge', $service->badge ?? '') }}" placeholder="e.g. Core product" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
                </div>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Summary (short excerpt)</label>
                <textarea name="summary" rows="3" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">{{ old('summary', $service->summary ?? '') }}</textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Lead / Detailed Intro</label>
                <textarea name="lead" rows="3" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">{{ old('lead', $service->lead ?? '') }}</textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Key Features (one per line: Title | Description)</label>
                <textarea name="items_text" rows="5" placeholder="HD image quality | 960 and 1080 TV lines" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:14px; font-family:monospace;">{{ old('items_text', $itemsText ?? '') }}</textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Specifications / Bullet Points (one per line)</label>
                <textarea name="intro_text" rows="4" placeholder="Image sensor: 1/3 Sony Color CCD Sensor" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:14px; font-family:monospace;">{{ old('intro_text', $introText ?? '') }}</textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Service Cover Image</label>
                @if (!empty($service->image))
                    <div style="margin-bottom:10px;">
                        <img src="{{ asset($service->image) }}" alt="" style="max-width:200px; height:auto; border-radius:6px; border:1px solid var(--border);">
                    </div>
                @endif
                <input type="file" name="image_file" accept="image/*" style="font-size:14px;">
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:24px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px;">
                </div>
                <div style="display:flex; align-items:center; padding-top:24px;">
                    <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }} style="width:18px; height:18px; accent-color:var(--accent);">
                        <span style="font-weight:600; font-size:14px;">Active / Published</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                <span>{{ $service ? 'Update Service' : 'Save Service' }}</span>
            </button>
        </form>
    </div>
</div>
@endsection

