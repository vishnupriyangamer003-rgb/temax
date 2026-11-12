@extends('admin.layouts.app')

@section('title', 'Projects')
@section('page_title', 'All Projects')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Industrial Projects & Installations</h3>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Project
        </a>
    </div>

    <div class="card-body" style="padding:0;">
        @if ($projects->count())
            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:1px solid var(--border);">
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Cover</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Project Title</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Industry / Type</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Photos</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Order</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Status</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr style="border-bottom:1px solid var(--border);">
                            <td style="padding:12px 16px; width:70px;">
                                @php $cover = $project->images->first()->path ?? null; @endphp
                                @if ($cover)
                                    <img src="{{ asset($cover) }}" alt="" style="width:50px; height:50px; object-fit:cover; border-radius:6px;">
                                @else
                                    <div style="width:50px; height:50px; background:#e2e8f0; border-radius:6px; display:flex; align-items:center; justify-content:center; color:#94a3b8;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td style="padding:12px 16px;">
                                <strong>{{ $project->title }}</strong>@if ($project->is_featured) <span style="font-size:11px; font-weight:700; padding:2px 7px; border-radius:6px; background:#fef3c7; color:#92400e;">Featured</span>@endif
                                <small style="display:block; color:var(--text-muted);">{{ $project->client ? $project->client . ' · ' : '' }}{{ $project->place }}</small>
                            </td>
                            <td style="padding:12px 16px;">
                                <span style="font-size:12px; font-weight:600; padding:3px 8px; border-radius:6px; background:#f1f5f9; color:#475569;">
                                    {{ $project->type ?: 'General' }}
                                </span>
                            </td>
                            <td style="padding:12px 16px;">{{ $project->images_count }} photos</td>
                            <td style="padding:12px 16px;">{{ $project->sort_order }}</td>
                            <td style="padding:12px 16px;">
                                <span style="font-size:12px; font-weight:600; padding:3px 8px; border-radius:6px; background:{{ $project->is_active ? '#dcfce7; color:#15803d;' : '#fee2e2; color:#b91c1c;' }}">
                                    {{ $project->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td style="padding:12px 16px;">
                                <div style="display:flex; gap:8px;">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" onsubmit="return confirm('Delete this project?');">
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
            <p style="padding:30px; text-align:center; color:var(--text-muted); margin:0;">No projects added yet.</p>
        @endif
    </div>
</div>
@endsection

