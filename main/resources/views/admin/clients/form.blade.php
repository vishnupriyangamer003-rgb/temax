@extends('admin.layouts.app')

@section('title', $client ? 'Edit Client / Brand' : 'Add Client / Brand')
@section('page_title', $client ? 'Edit Client / Brand' : 'Add Client / Brand')

@section('content')
<div class="card" style="max-width:750px;">
    <div class="card-header">
        <h3>{{ $client ? 'Edit Client: ' . $client->name : 'New Client / Brand Logo' }}</h3>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card-body">
        <form action="{{ $client ? route('admin.clients.update', $client->id) : route('admin.clients.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if ($client)
                @method('PUT')
            @endif

            <div class="form-group">
                <label class="form-label" for="name">Company / Brand Name *</label>
                <input type="text" name="name" id="name" class="form-control"
                       placeholder="e.g. UltraTech Cement, JSW Steel, NTPC"
                       value="{{ old('name', $client->name ?? '') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="url">Website URL (Optional)</label>
                <input type="url" name="url" id="url" class="form-control"
                       placeholder="https://example.com"
                       value="{{ old('url', $client->url ?? '') }}">
            </div>

            <div class="form-group">
                <label class="form-label">Brand Logo {{ $client ? '' : '*' }}</label>
                @if ($client && $client->logo)
                    <div style="margin-bottom:12px; display:flex; align-items:center; gap:16px;">
                        <div style="width:120px; height:60px; background:#f8fafc; border:1px solid #cbd5e1; border-radius:6px; display:flex; align-items:center; justify-content:center; padding:6px;">
                            <img src="{{ asset($client->logo) }}" alt="" style="max-width:100%; max-height:100%; object-fit:contain;">
                        </div>
                        <span style="font-size:13px; color:var(--text-muted);">Current Logo: {{ $client->logo }}</span>
                    </div>
                @endif
                <input type="file" name="logo_file" class="form-control" accept="image/*" {{ $client ? '' : 'required' }}>
                <small style="color:var(--text-muted); display:block; margin-top:4px;">Recommended: Transparent PNG or SVG logo, approx 160x80px.</small>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                <div class="form-group">
                    <label class="form-label" for="sort_order">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control" min="0"
                           value="{{ old('sort_order', $client->sort_order ?? (\App\Models\Client::max("sort_order") + 1)) }}">
                </div>

                <div class="form-group" style="padding-top:28px;">
                    <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $client->is_active ?? true) ? 'checked' : '' }}>
                        <span class="form-label" style="margin:0;">Active / Visible</span>
                    </label>
                </div>
            </div>

            <div style="display:flex; gap:12px; margin-top:24px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ $client ? 'Update Client' : 'Create Client' }}
                </button>
                <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

