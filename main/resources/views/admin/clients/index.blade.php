@extends('admin.layouts.app')

@section('title', 'Clients & Brands')
@section('page_title', 'All Clients & Brands')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Industrial Clients & Brand Logos</h3>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Client / Brand
        </a>
    </div>

    <div class="card-body" style="padding:0;">
        @if ($clients->count())
            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:1px solid var(--border);">
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Logo</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Company / Brand</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Website URL</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Order</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Status</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr style="border-bottom:1px solid var(--border);">
                            <td style="padding:12px 16px; width:120px;">
                                <div style="width:100px; height:50px; background:#f1f5f9; border-radius:6px; display:flex; align-items:center; justify-content:center; padding:6px; border:1px solid #e2e8f0;">
                                    <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}" style="max-width:100%; max-height:100%; object-fit:contain;">
                                </div>
                            </td>
                            <td style="padding:12px 16px;">
                                <strong>{{ $client->name }}</strong>
                            </td>
                            <td style="padding:12px 16px; font-size:13px; color:var(--text-muted);">
                                @if ($client->url)
                                    <a href="{{ $client->url }}" target="_blank" style="color:var(--primary); text-decoration:none;">
                                        {{ \Illuminate\Support\Str::limit($client->url, 40) }} <i class="fas fa-external-link-alt" style="font-size:11px;"></i>
                                    </a>
                                @else
                                    <span style="color:#94a3b8;">None</span>
                                @endif
                            </td>
                            <td style="padding:12px 16px;">{{ $client->sort_order }}</td>
                            <td style="padding:12px 16px;">
                                @if ($client->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Hidden</span>
                                @endif
                            </td>
                            <td style="padding:12px 16px;">
                                <div style="display:flex; gap:8px;">
                                    <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-secondary btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Delete this client?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
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
            <div style="padding:30px; text-align:center; color:var(--text-muted);">
                <i class="fas fa-building" style="font-size:36px; margin-bottom:12px; display:block; color:#cbd5e1;"></i>
                No clients found. Click "Add Client / Brand" to create one.
            </div>
        @endif
    </div>
</div>
@endsection

