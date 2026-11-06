@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@push('styles')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: #fff;
        border-radius: 10px;
        padding: 24px;
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 18px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-2px);
    }

    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .stat-icon.orange {
        background: rgba(242, 101, 34, 0.12);
        color: var(--accent);
    }

    .stat-icon.blue {
        background: rgba(25, 47, 66, 0.12);
        color: var(--primary);
    }

    .stat-icon.green {
        background: rgba(34, 197, 94, 0.12);
        color: #16a34a;
    }

    .stat-icon.purple {
        background: rgba(147, 51, 234, 0.12);
        color: #9333ea;
    }

    .stat-info h3 {
        font-size: 28px;
        font-weight: 700;
        color: var(--primary);
        line-height: 1;
        margin-bottom: 6px;
    }

    .stat-info p {
        font-size: 13.5px;
        color: var(--text-muted);
        font-weight: 500;
        margin: 0;
    }

    /* Tables */
    .table-responsive {
        overflow-x: auto;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .admin-table th {
        background: #f8fafc;
        padding: 12px 16px;
        font-size: 12.5px;
        font-weight: 600;
        text-transform: uppercase;
        color: var(--text-muted);
        border-bottom: 1px solid var(--border);
    }

    .admin-table td {
        padding: 14px 16px;
        font-size: 14px;
        border-bottom: 1px solid var(--border);
        color: var(--text);
    }

    .admin-table tr:hover td {
        background: #f8fafc;
    }

    .status-badge {
        display: inline-block;
        font-size: 11.5px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 6px;
        text-transform: uppercase;
    }

    .status-new {
        background: #fef3c7;
        color: #92400e;
    }

    .status-read {
        background: #e0f2fe;
        color: #0369a1;
    }

    .status-replied {
        background: #dcfce7;
        color: #15803d;
    }

    .status-closed {
        background: #f1f5f9;
        color: #64748b;
    }
</style>
@endpush

@section('content')

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon orange"><i class="fas fa-cogs"></i></div>
            <div class="stat-info">
                <h3>{{ $services }}</h3>
                <p>Total Services</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon blue"><i class="fas fa-box"></i></div>
            <div class="stat-info">
                <h3>{{ $products->count() }}</h3>
                <p>Product Categories</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green"><i class="fas fa-industry"></i></div>
            <div class="stat-info">
                <h3>{{ $projects }}</h3>
                <p>Live Projects</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple"><i class="fas fa-envelope"></i></div>
            <div class="stat-info">
                <h3>{{ $newEnquiries }}</h3>
                <p>New Enquiries ({{ $recentEnquiriesTotal }} total)</p>
            </div>
        </div>
    </div>

    <!-- Recent Enquiries -->
    <div class="card">
        <div class="card-header">
            <h3>Recent Customer Enquiries</h3>
            <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary btn-sm">
                <span>View All Enquiries</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="card-body" style="padding: 0;">
            @if ($enquiries->count())
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Service Required</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enquiries as $enquiry)
                                <tr>
                                    <td><strong>{{ $enquiry->name }}</strong></td>
                                    <td>
                                        <div>{{ $enquiry->phone }}</div>
                                        <small style="color: #64748b;">{{ $enquiry->email }}</small>
                                    </td>
                                    <td>{{ $enquiry->service_required ?: 'General Enquiry' }}</td>
                                    <td>{{ $enquiry->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $enquiry->status }}">{{ ucfirst($enquiry->status) }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="btn btn-secondary btn-sm">
                                            <span>Details</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="padding: 30px; text-align: center; color: var(--text-muted); margin: 0;">No enquiries received yet.</p>
            @endif
        </div>
    </div>

@endsection
