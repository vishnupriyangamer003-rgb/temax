@extends('admin.layouts.app')

@section('title', 'Testimonials')
@section('page_title', 'All Testimonials')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Customer Testimonials</h3>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Testimonial
        </a>
    </div>

    <div class="card-body" style="padding:0;">
        @if ($testimonials->count())
            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:1px solid var(--border);">
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Avatar</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Name & Title</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Company / Role</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Rating</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Order</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Status</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $item)
                        <tr style="border-bottom:1px solid var(--border);">
                            <td style="padding:12px 16px; width:70px;">
                                @if ($item->avatar)
                                    <img src="{{ asset($item->avatar) }}" alt="{{ $item->name }}" style="width:48px; height:48px; border-radius:50%; object-fit:cover; border:2px solid #e2e8f0;">
                                @else
                                    <div style="width:48px; height:48px; background:#e2e8f0; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#94a3b8;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </td>
                            <td style="padding:12px 16px;">
                                <strong>{{ $item->name }}</strong>
                                @if ($item->title)
                                    <div style="font-size:13px; color:var(--text-muted); margin-top:2px;">"{{ $item->title }}"</div>
                                @endif
                            </td>
                            <td style="padding:12px 16px; font-size:13.5px;">
                                <div>{{ $item->designation }}</div>
                                <div style="font-weight:600; color:#334155;">{{ $item->company }}</div>
                            </td>
                            <td style="padding:12px 16px; color:#f59e0b; font-size:13px;">
                                @for ($s = 1; $s <= 5; $s++)
                                    <i class="fas fa-star{{ $s <= $item->rating ? '' : '-o' }}" style="color:{{ $s <= $item->rating ? '#f59e0b' : '#cbd5e1' }};"></i>
                                @endfor
                            </td>
                            <td style="padding:12px 16px;">{{ $item->sort_order }}</td>
                            <td style="padding:12px 16px;">
                                @if ($item->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Hidden</span>
                                @endif
                            </td>
                            <td style="padding:12px 16px;">
                                <div style="display:flex; gap:8px;">
                                    <a href="{{ route('admin.testimonials.edit', $item->id) }}" class="btn btn-secondary btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');">
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
                <i class="fas fa-comments" style="font-size:36px; margin-bottom:12px; display:block; color:#cbd5e1;"></i>
                No testimonials found. Click "Add Testimonial" to create one.
            </div>
        @endif
    </div>
</div>
@endsection
