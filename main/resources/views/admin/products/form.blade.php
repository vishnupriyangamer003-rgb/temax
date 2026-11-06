@extends('admin.layouts.app')

@section('title', ($category ? 'Edit ' . $category->title : 'Add Product Category'))
@section('page_title', ($category ? 'Edit Category' : 'Create Category'))

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Back to Categories
    </a>
</div>

<div class="card" style="max-width:800px;">
    <div class="card-header">
        <h3>{{ $category ? 'Edit Category: ' . $category->title : 'New Category' }}</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $category ? route('admin.products.update', $category->id) : route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($category)
                @method('PUT')
            @endif

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Category Title *</label>
                <input type="text" name="title" value="{{ old('title', $category->title ?? '') }}" required style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Description</label>
                <textarea name="description" rows="3" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">{{ old('description', $category->description ?? '') }}</textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Products List (one per line: Name or Name :: short description)</label>
                <textarea name="items_text" rows="8" placeholder="Furnace Camera Tube :: 1/3 Sony CCD sensor&#10;Inclined 90° Camera :: Full HD 1080p" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:14px; font-family:monospace;">{{ old('items_text', $itemsText ?? '') }}</textarea>
                <small style="color:var(--text-muted); display:block; margin-top:4px;">Format: <code>Product Name :: Brief description</code></small>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Category Image</label>
                @if (!empty($category->image))
                    <div style="margin-bottom:10px;">
                        <img src="{{ asset($category->image) }}" alt="" style="max-width:200px; height:auto; border-radius:6px; border:1px solid var(--border);">
                    </div>
                @endif
                <input type="file" name="image_file" accept="image/*" style="font-size:14px;">
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:24px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order ?? 0) }}" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px;">
                </div>
                <div style="display:flex; align-items:center; padding-top:24px;">
                    <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }} style="width:18px; height:18px; accent-color:var(--accent);">
                        <span style="font-weight:600; font-size:14px;">Active / Published</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                <span>{{ $category ? 'Update Category' : 'Save Category' }}</span>
            </button>
        </form>
    </div>
</div>
@endsection
