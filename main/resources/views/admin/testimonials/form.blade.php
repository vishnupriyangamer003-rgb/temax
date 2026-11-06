@extends('admin.layouts.app')

@section('title', $testimonial ? 'Edit Testimonial' : 'Add Testimonial')
@section('page_title', $testimonial ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
<div class="card" style="max-width:850px;">
    <div class="card-header">
        <h3>{{ $testimonial ? 'Edit Testimonial: ' . $testimonial->name : 'New Customer Testimonial' }}</h3>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card-body">
        <form action="{{ $testimonial ? route('admin.testimonials.update', $testimonial->id) : route('admin.testimonials.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if ($testimonial)
                @method('PUT')
            @endif

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                <div class="form-group">
                    <label class="form-label" for="name">Person Name *</label>
                    <input type="text" name="name" id="name" class="form-control"
                           value="{{ old('name', $testimonial->name ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="designation">Designation / Role</label>
                    <input type="text" name="designation" id="designation" class="form-control"
                           placeholder="e.g. GM - Technical & Operations"
                           value="{{ old('designation', $testimonial->designation ?? '') }}">
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                <div class="form-group">
                    <label class="form-label" for="company">Company / Plant Name</label>
                    <input type="text" name="company" id="company" class="form-control"
                           placeholder="e.g. UltraTech Cement Ltd."
                           value="{{ old('company', $testimonial->company ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label" for="title">Headline / Summary Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                           placeholder="e.g. Continuous 24/7 Visibility in 1600°C Kiln"
                           value="{{ old('title', $testimonial->title ?? '') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="content">Testimonial Feedback / Review *</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $testimonial->content ?? '') }}</textarea>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px;">
                <div class="form-group">
                    <label class="form-label" for="rating">Star Rating (1-5)</label>
                    <select name="rating" id="rating" class="form-control">
                        @for ($r = 5; $r >= 1; $r--)
                            <option value="{{ $r }}" {{ old('rating', $testimonial->rating ?? 5) == $r ? 'selected' : '' }}>
                                {{ $r }} Stars {{ $r === 5 ? '(Excellent)' : '' }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="sort_order">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control" min="0"
                           value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
                </div>

                <div class="form-group" style="padding-top:28px;">
                    <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                        <span class="form-label" style="margin:0;">Active / Visible</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Client Avatar Image</label>
                @if ($testimonial && $testimonial->avatar)
                    <div style="margin-bottom:10px; display:flex; align-items:center; gap:12px;">
                        <img src="{{ asset($testimonial->avatar) }}" alt="" style="width:60px; height:60px; border-radius:50%; object-fit:cover; border:2px solid #cbd5e1;">
                        <span style="font-size:13px; color:var(--text-muted);">Current Avatar: {{ $testimonial->avatar }}</span>
                    </div>
                @endif
                <input type="file" name="avatar_file" class="form-control" accept="image/*">
                <small style="color:var(--text-muted); display:block; margin-top:4px;">Recommended: Square ratio 100x100px or larger. PNG or JPG.</small>
            </div>

            <div style="display:flex; gap:12px; margin-top:24px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ $testimonial ? 'Update Testimonial' : 'Create Testimonial' }}
                </button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

