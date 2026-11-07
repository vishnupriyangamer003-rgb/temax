@extends('admin.layouts.app')

@section('title', 'Enquiries')
@section('page_title', 'Customer Enquiries')

@section('content')
<div class="card">
    <div class="card-header" style="flex-wrap: wrap; gap: 12px;">
        <div style="display:flex; gap:8px; flex-wrap:wrap;">
            <a href="{{ route('admin.enquiries.index') }}" class="btn {{ empty($status) ? 'btn-primary' : 'btn-secondary' }} btn-sm">
                All ({{ array_sum($counts->all()) }})
            </a>
            @foreach (\App\Models\Enquiry::STATUSES as $key => $label)
                <a href="{{ route('admin.enquiries.index', ['status' => $key]) }}" class="btn {{ $status === $key ? 'btn-primary' : 'btn-secondary' }} btn-sm">
                    {{ $label }} ({{ $counts[$key] ?? 0 }})
                </a>
            @endforeach
        </div>
    </div>

    <div class="card-body" style="padding:0;">
        @if ($enquiries->count())
            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; text-align:left;">
                    <thead>
                        <tr style="background:#f8fafc; border-bottom:1px solid var(--border);">
                            <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Name</th>
                            <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Phone / Email</th>
                            <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Service</th>
                            <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Date</th>
                            <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Status</th>
                            <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enquiries as $enquiry)
                            <tr style="border-bottom:1px solid var(--border);">
                                <td style="padding:14px 16px;"><strong>{{ $enquiry->name }}</strong></td>
                                <td style="padding:14px 16px;">
                                    <div>{{ $enquiry->phone }}</div>
                                    <small style="color:var(--text-muted);">{{ $enquiry->email }}</small>
                                </td>
                                <td style="padding:14px 16px;">{{ $enquiry->service ?: '—' }}</td>
                                <td style="padding:14px 16px;">{{ $enquiry->created_at->format('M d, Y h:i A') }}</td>
                                <td style="padding:14px 16px;">
                                    <span style="font-size:12px; font-weight:600; padding:3px 8px; border-radius:6px; background:#e0f2fe; color:#0369a1;">
                                        {{ ucfirst($enquiry->status) }}
                                    </span>
                                </td>
                                <td style="padding:14px 16px;">
                                    <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="padding:20px;">
                {{ $enquiries->links() }}
            </div>
        @else
            <p style="padding:30px; text-align:center; color:var(--text-muted); margin:0;">No enquiries found.</p>
        @endif
    </div>
</div>
@endsection

