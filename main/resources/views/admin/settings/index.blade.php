@extends('admin.layouts.app')

@section('title', 'Site Settings')
@section('page_title', 'Configuration & Settings')

@section('content')
<div class="card" style="max-width:900px;">
    <div class="card-header">
        <h3>General Company & Website Settings</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h4 style="font-size:15px; color:var(--primary); margin-bottom:16px; border-bottom:1px solid var(--border); padding-bottom:8px;">Company Information</h4>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:16px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Site Name</label>
                    <input type="text" name="settings[site_name]" value="{{ old('settings.site_name', $values['site_name'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Tagline</label>
                    <input type="text" name="settings[tagline]" value="{{ old('settings.tagline', $values['tagline'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:16px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Primary Phone</label>
                    <input type="text" name="settings[phone]" value="{{ old('settings.phone', $values['phone'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Additional Phone Numbers (comma separated)</label>
                    <input type="text" name="settings[phone2]" value="{{ old('settings.phone2', $values['phone2'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:16px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Sales Email</label>
                    <input type="email" name="settings[email]" value="{{ old('settings.email', $values['email'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">WhatsApp Number (with country code, no +)</label>
                    <input type="text" name="settings[whatsapp]" value="{{ old('settings.whatsapp', $values['whatsapp'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Full Office Address</label>
                <textarea name="settings[address]" rows="2" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">{{ old('settings.address', $values['address'] ?? '') }}</textarea>
            </div>

            <h4 style="font-size:15px; color:var(--primary); margin:28px 0 16px; border-bottom:1px solid var(--border); padding-bottom:8px;">SEO & Social Meta</h4>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Meta Title</label>
                <input type="text" name="settings[meta_title]" value="{{ old('settings.meta_title', $values['meta_title'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Meta Description</label>
                <textarea name="settings[meta_description]" rows="3" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">{{ old('settings.meta_description', $values['meta_description'] ?? '') }}</textarea>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Meta Keywords</label>
                <input type="text" name="settings[meta_keywords]" value="{{ old('settings.meta_keywords', $values['meta_keywords'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                <span>Save All Settings</span>
            </button>
        </form>
    </div>
</div>
@endsection
