@extends('admin.layouts.app')

@section('title', 'Enquiry #' . $enquiry->id)
@section('page_title', 'Enquiry Details')

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Back to Enquiries
    </a>
</div>

<div class="card" style="max-width:800px;">
    <div class="card-header">
        <h3>Enquiry from {{ $enquiry->name }}</h3>
        <span style="font-size:12px; font-weight:600; padding:4px 10px; border-radius:6px; background:#e0f2fe; color:#0369a1;">
            {{ ucfirst($enquiry->status) }}
        </span>
    </div>
    <div class="card-body">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:20px; margin-bottom:24px;">
            <div>
                <small style="color:var(--text-muted); text-transform:uppercase; font-size:12px; font-weight:600;">Phone</small>
                <div style="font-size:16px; font-weight:600; margin-top:4px;">
                    <a href="tel:{{ $enquiry->phone }}" style="color:var(--accent); text-decoration:none;">{{ $enquiry->phone }}</a>
                </div>
            </div>
            <div>
                <small style="color:var(--text-muted); text-transform:uppercase; font-size:12px; font-weight:600;">Email</small>
                <div style="font-size:16px; font-weight:600; margin-top:4px;">
                    <a href="mailto:{{ $enquiry->email }}" style="color:var(--accent); text-decoration:none;">{{ $enquiry->email ?: '—' }}</a>
                </div>
            </div>
            <div>
                <small style="color:var(--text-muted); text-transform:uppercase; font-size:12px; font-weight:600;">Service Required</small>
                <div style="font-size:16px; font-weight:600; margin-top:4px;">{{ $enquiry->service_required ?: 'General Enquiry' }}</div>
            </div>
            <div>
                <small style="color:var(--text-muted); text-transform:uppercase; font-size:12px; font-weight:600;">Received At</small>
                <div style="font-size:15px; margin-top:4px;">{{ $enquiry->created_at->format('M d, Y h:i A') }}</div>
            </div>
        </div>

        <div style="background:#f8fafc; padding:20px; border-radius:8px; border:1px solid var(--border); margin-bottom:24px;">
            <small style="color:var(--text-muted); text-transform:uppercase; font-size:12px; font-weight:600; display:block; margin-bottom:8px;">Message / Details</small>
            <p style="font-size:15px; line-height:1.6; margin:0; white-space:pre-wrap;">{{ $enquiry->message ?: 'No message provided.' }}</p>
        </div>

        <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:16px; border-top:1px solid var(--border); padding-top:20px;">
            <form method="POST" action="{{ route('admin.enquiries.status', $enquiry->id) }}" style="display:flex; align-items:center; gap:10px;">
                @csrf
                @method('PATCH')
                <label style="font-weight:600; font-size:14px;">Update Status:</label>
                <select name="status" style="padding:8px 12px; border:1px solid var(--border); border-radius:6px; font-size:14px;">
                    @foreach (\App\Models\Enquiry::STATUSES as $key => $label)
                        <option value="{{ $key }}" {{ $enquiry->status === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>

            <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry->id) }}" onsubmit="return confirm('Delete this enquiry?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm" style="background:#fee2e2; color:#b91c1c;">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

