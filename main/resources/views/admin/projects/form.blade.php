@extends('admin.layouts.app')

@section('title', ($project ? 'Edit ' . $project->title : 'Add Project'))
@section('page_title', ($project ? 'Edit Project' : 'Create Project'))

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Back to Projects
    </a>
</div>

<div class="card" style="max-width:850px;">
    <div class="card-header">
        <h3>{{ $project ? 'Edit: ' . $project->title : 'New Project' }}</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $project ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($project)
                @method('PUT')
            @endif

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Project Title *</label>
                <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Location / Plant</label>
                    <input type="text" name="place" value="{{ old('place', $project->place ?? '') }}" placeholder="e.g. Cement plant, India" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
                </div>
                <div>
                    <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Industry / Filter Type</label>
                    <input type="text" name="type" value="{{ old('type', $project->type ?? '') }}" list="types-list" placeholder="e.g. Cement, Thermal, Glass" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
                    <datalist id="types-list">
                        @foreach ($types as $t)
                            <option value="{{ $t }}">
                        @endforeach
                    </datalist>
                </div>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Project Description</label>
                <textarea name="text" rows="5" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">{{ old('text', $project->text ?? '') }}</textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Project Photo (the first photo is the cover shown on the website)</label>
                @if ($project && $project->images->count())
                    <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:12px;">
                        @foreach ($project->images as $img)
                            <div style="position:relative;">
                                <img src="{{ asset($img->path) }}" alt="" style="width:80px; height:80px; object-fit:cover; border-radius:6px; border:1px solid var(--border);">
                            </div>
                        @endforeach
                    </div>
                @endif
                <input type="file" name="images[]" multiple accept="image/*" style="font-size:14px;">
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:24px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? (\App\Models\Project::max("sort_order") + 1)) }}" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px;">
                </div>
                <div style="display:flex; align-items:center; padding-top:24px;">
                    <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }} style="width:18px; height:18px; accent-color:var(--accent);">
                        <span style="font-weight:600; font-size:14px;">Active / Published</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                <span>{{ $project ? 'Update Project' : 'Save Project' }}</span>
            </button>
        </form>
    </div>
</div>
@endsection

