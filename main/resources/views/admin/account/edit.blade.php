@extends('admin.layouts.app')

@section('title', 'My Account')
@section('page_title', 'Account Settings')

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-header">
        <h3>Edit Profile & Password</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.account.update') }}">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Username</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
            </div>

            <hr style="border:0; border-top:1px solid var(--border); margin:24px 0;">

            <p style="font-size:13.5px; color:var(--text-muted); margin-bottom:16px;">Leave password fields empty to keep current password.</p>

            <div style="margin-bottom: 20px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">New Password</label>
                <input type="password" name="password" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display:block; font-weight:600; font-size:14px; margin-bottom:6px;">Confirm New Password</label>
                <input type="password" name="password_confirmation" style="width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:6px; font-size:15px; font-family:inherit;">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                <span>Update Account</span>
            </button>
        </form>
    </div>
</div>
@endsection

