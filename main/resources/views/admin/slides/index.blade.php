@extends('admin.layouts.app')

@section('title', 'Home Banner')
@section('page_title', 'Home Page Banner')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Home Page Banner Slides</h3>
        <a href="{{ route('admin.slides.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Slide
        </a>
    </div>

    <div class="card-body" style="padding:0;">
        @if ($slides->count())
            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:1px solid var(--border);">
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Image</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Heading</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Order</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Status</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $slide)
                        <tr style="border-bottom:1px solid var(--border);">
                            <td style="padding:12px 16px; width:140px;">
                                <img src="{{ asset($slide->image) }}" alt="" style="width:120px; height:64px; object-fit:cover; border-radius:6px; border:1px solid #e2e8f0;">
                            </td>
                            <td style="padding:12px 16px;">
                                <strong>{{ $slide->title }} {{ $slide->highlight }}</strong>
                                <small style="display:block; color:var(--text-muted);">{{ \Illuminate\Support\Str::limit($slide->text, 80) }}</small>
                            </td>
                            <td style="padding:12px 16px;">{{ $slide->sort_order }}</td>
                            <td style="padding:12px 16px;">
                                @if ($slide->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Hidden</span>
                                @endif
                            </td>
                            <td style="padding:12px 16px;">
                                <div style="display:flex; gap:8px;">
                                    <a href="{{ route('admin.slides.edit', $slide->id) }}" class="btn btn-secondary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST" onsubmit="return confirm('Delete this slide?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div style="padding:30px; text-align:center; color:var(--text-muted);">
                <i class="fas fa-images" style="font-size:36px; margin-bottom:12px; display:block; color:#cbd5e1;"></i>
                No slides yet. Click "Add Slide" to create one.
            </div>
        @endif
    </div>
</div>
@endsection
