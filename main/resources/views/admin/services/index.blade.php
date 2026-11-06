@extends('admin.layouts.app')

@section('title', 'Services')
@section('page_title', 'All Services')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Services & Solutions</h3>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Service
        </a>
    </div>

    <div class="card-body" style="padding:0;">
        @if ($services->count())
            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:1px solid var(--border);">
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Image</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Service Title</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Slug</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Features</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Order</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Status</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr style="border-bottom:1px solid var(--border);">
                            <td style="padding:12px 16px; width:70px;">
                                @if ($service->image)
                                    <img src="{{ asset($service->image) }}" alt="" style="width:50px; height:50px; object-fit:cover; border-radius:6px;">
                                @else
                                    <div style="width:50px; height:50px; background:#e2e8f0; border-radius:6px; display:flex; align-items:center; justify-content:center; color:#94a3b8;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td style="padding:12px 16px;">
                                <strong>{{ $service->title }}</strong>
                                @if ($service->badge)
                                    <span style="font-size:11px; background:#fef3c7; color:#92400e; padding:2px 6px; border-radius:4px; margin-left:6px;">{{ $service->badge }}</span>
                                @endif
                            </td>
                            <td style="padding:12px 16px; color:var(--text-muted); font-size:13px;">{{ $service->slug }}</td>
                            <td style="padding:12px 16px;">{{ $service->items_count }} items</td>
                            <td style="padding:12px 16px;">{{ $service->sort_order }}</td>
                            <td style="padding:12px 16px;">
                                <span style="font-size:12px; font-weight:600; padding:3px 8px; border-radius:6px; background:{{ $service->is_active ? '#dcfce7; color:#15803d;' : '#fee2e2; color:#b91c1c;' }}">
                                    {{ $service->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td style="padding:12px 16px;">
                                <div style="display:flex; gap:8px;">
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" onsubmit="return confirm('Delete this service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background:#fee2e2; color:#b91c1c;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="padding:30px; text-align:center; color:var(--text-muted); margin:0;">No services added yet.</p>
        @endif
    </div>
</div>
@endsection

