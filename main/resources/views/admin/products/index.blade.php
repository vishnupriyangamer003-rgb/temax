@extends('admin.layouts.app')

@section('title', 'Products')
@section('page_title', 'Product Categories')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>All Product Categories</h3>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Category
        </a>
    </div>

    <div class="card-body" style="padding:0;">
        @if ($categories->count())
            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:1px solid var(--border);">
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Image</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Category Title</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Products Count</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Order</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Status</th>
                        <th style="padding:12px 16px; font-size:12.5px; color:var(--text-muted); text-transform:uppercase;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr style="border-bottom:1px solid var(--border);">
                            <td style="padding:12px 16px; width:70px;">
                                @if ($category->image)
                                    <img src="{{ asset($category->image) }}" alt="" style="width:50px; height:50px; object-fit:cover; border-radius:6px;">
                                @else
                                    <div style="width:50px; height:50px; background:#e2e8f0; border-radius:6px; display:flex; align-items:center; justify-content:center; color:#94a3b8;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td style="padding:12px 16px;">
                                <strong>{{ $category->title }}</strong>
                                <small style="display:block; color:var(--text-muted); max-width:400px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $category->description }}</small>
                            </td>
                            <td style="padding:12px 16px;">{{ $category->items_count }} products</td>
                            <td style="padding:12px 16px;">{{ $category->sort_order }}</td>
                            <td style="padding:12px 16px;">
                                <span style="font-size:12px; font-weight:600; padding:3px 8px; border-radius:6px; background:{{ $category->is_active ? '#dcfce7; color:#15803d;' : '#fee2e2; color:#b91c1c;' }}">
                                    {{ $category->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td style="padding:12px 16px;">
                                <div style="display:flex; gap:8px;">
                                    <a href="{{ route('admin.products.edit', $category->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $category->id) }}" onsubmit="return confirm('Delete this product category?');">
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
            <p style="padding:30px; text-align:center; color:var(--text-muted); margin:0;">No product categories added yet.</p>
        @endif
    </div>
</div>
@endsection
