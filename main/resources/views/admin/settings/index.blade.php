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

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:16px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Phone shown on site</label>
                    <input type="text" name="settings[phone_display]" value="{{ old('settings.phone_display', $values['phone_display'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Short Address (map card)</label>
                    <input type="text" name="settings[address_short]" value="{{ old('settings.address_short', $values['address_short'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Working Hours (Contact page)</label>
                <input type="text" name="settings[working_hours]" value="{{ old('settings.working_hours', $values['working_hours'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Google Map Embed URL (Contact page map)</label>
                <input type="text" name="settings[map_embed]" value="{{ old('settings.map_embed', $values['map_embed'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Footer About Text</label>
                <textarea name="settings[footer_about]" rows="2" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">{{ old('settings.footer_about', $values['footer_about'] ?? '') }}</textarea>
            </div>

            <h4 style="font-size:15px; color:var(--primary); margin:28px 0 16px; border-bottom:1px solid var(--border); padding-bottom:8px;">Homepage Section Headings (Services, Projects &amp; Clients)</h4>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:16px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Services Subtitle</label>
                    <input type="text" name="settings[services_subtitle]" value="{{ old('settings.services_subtitle', $values['services_subtitle'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Services Title (HTML allowed)</label>
                    <input type="text" name="settings[services_title]" value="{{ old('settings.services_title', $values['services_title'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:16px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Projects Subtitle</label>
                    <input type="text" name="settings[projects_subtitle]" value="{{ old('settings.projects_subtitle', $values['projects_subtitle'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Projects Title (HTML allowed)</label>
                    <input type="text" name="settings[projects_title]" value="{{ old('settings.projects_title', $values['projects_title'] ?? '') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:16px;">
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Clients / Customers Subtitle</label>
                    <input type="text" name="settings[clients_subtitle]" value="{{ old('settings.clients_subtitle', $values['clients_subtitle'] ?? 'Customers') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Clients Title (HTML allowed)</label>
                    <input type="text" name="settings[clients_title]" value="{{ old('settings.clients_title', $values['clients_title'] ?? 'Our Valued <span>Customers</span>') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                </div>
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Clients Tagline</label>
                <input type="text" name="settings[clients_tagline]" value="{{ old('settings.clients_tagline', $values['clients_tagline'] ?? 'Delivering quality, innovation, and precision.') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
            </div>

            <h4 style="font-size:15px; color:var(--primary); margin:28px 0 16px; border-bottom:1px solid var(--border); padding-bottom:8px;">Bottom Slogan Banner (Above Footer)</h4>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Company Slogan (One sentence)</label>
                <input type="text" name="settings[cta_slogan]" value="{{ old('settings.cta_slogan', $values['cta_slogan'] ?? 'Pioneering High-Temperature Furnace &amp; Kiln Viewing Systems Since 1996 — Precision Engineered in India.') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:6px;">Button Text</label>
                <input type="text" name="settings[cta_btn_text]" value="{{ old('settings.cta_btn_text', $values['cta_btn_text'] ?? 'Contact Us') }}" style="width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
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

