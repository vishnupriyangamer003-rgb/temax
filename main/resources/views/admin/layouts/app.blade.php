<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - {{ setting('site_name', 'TEMAX') }}</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('assets/fonts-figtree.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary: #192f42;
            --primary-dark: #0f1d29;
            --sidebar-bg: #0f172a;
            --accent: #f26522;
            --accent-hover: #e05310;
            --bg: #f1f5f9;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text: #1e293b;
            --text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            color: #fff;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            min-height: 100vh;
            position: sticky;
            top: 0;
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
        }

        .sidebar-brand img {
            max-width: 150px;
            height: auto;
            background: #fff;
            padding: 6px 14px;
            border-radius: 6px;
        }

        .sidebar-brand h4 {
            font-size: 13px;
            font-weight: 600;
            color: #94a3b8;
            margin-top: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 12px;
            flex-grow: 1;
        }

        .sidebar-menu li {
            margin-bottom: 4px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 16px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14.5px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-menu a i {
            width: 20px;
            font-size: 16px;
            color: #94a3b8;
            transition: color 0.2s;
        }

        .sidebar-menu a:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #fff;
        }

        .sidebar-menu a:hover i {
            color: var(--accent);
        }

        .sidebar-menu a.active {
            background: var(--accent);
            color: #fff;
        }

        .sidebar-menu a.active i {
            color: #fff;
        }

        .sidebar-menu .badge {
            margin-left: auto;
            background: rgba(239, 68, 68, 0.9);
            color: #fff;
            font-size: 11px;
            padding: 2px 7px;
            border-radius: 10px;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 13px;
            color: #64748b;
        }

        /* Main Content */
        .admin-main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* Header */
        .admin-header {
            background: #fff;
            border-bottom: 1px solid var(--border);
            padding: 16px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .admin-header h1 {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
        }

        .admin-header .user-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-header .site-link {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s;
        }

        .admin-header .site-link:hover {
            color: var(--accent);
        }

        .admin-header .btn-logout {
            background: none;
            border: 1px solid var(--border);
            color: #ef4444;
            padding: 7px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13.5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            font-family: inherit;
        }

        .admin-header .btn-logout:hover {
            background: #ef4444;
            color: #fff;
            border-color: #ef4444;
        }

        /* Body */
        .admin-body {
            padding: 30px;
            flex-grow: 1;
        }

        /* Alerts */
        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* Cards */
        .card {
            background: var(--card-bg);
            border-radius: 10px;
            border: 1px solid var(--border);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }

        .card-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header h2,
        .card-header h3 {
            font-size: 17px;
            font-weight: 600;
            color: var(--primary);
        }

        .card-body {
            padding: 24px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 18px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            font-family: inherit;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--accent-hover);
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            body {
                flex-direction: column;
            }

            .admin-sidebar {
                width: 100%;
                min-height: auto;
                position: relative;
            }

            .admin-header {
                padding: 14px 20px;
            }

            .admin-body {
                padding: 20px;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets/images/temax/logo.png') }}" alt="{{ setting('site_name', 'TEMAX') }}">
            </a>
            <h4>Control Panel</h4>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <i class="fas fa-cogs"></i>
                    <span>Services</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                    <i class="fas fa-box"></i>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                    <i class="fas fa-industry"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                    <i class="fas fa-comments"></i>
                    <span>Testimonials</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.clients.index') }}" class="{{ request()->routeIs('admin.clients*') ? 'active' : '' }}">
                    <i class="fas fa-building"></i>
                    <span>Clients & Brands</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.enquiries.index') }}" class="{{ request()->routeIs('admin.enquiries*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>Enquiries</span>
                    @php $unread = \App\Models\Enquiry::unread()->count(); @endphp
                    @if ($unread > 0)
                        <span class="badge">{{ $unread }}</span>
                    @endif
                </a>
            </li>
            <li>
                <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <i class="fas fa-sliders-h"></i>
                    <span>Site Settings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.account.edit') }}" class="{{ request()->routeIs('admin.account*') ? 'active' : '' }}">
                    <i class="fas fa-user-cog"></i>
                    <span>My Account</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            Logged in as <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="admin-main">
        <header class="admin-header">
            <h1>@yield('page_title', 'Dashboard')</h1>
            <div class="user-nav">
                <a href="{{ route('home') }}" class="site-link" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    <span>View Website</span>
                </a>
                <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Sign Out</span>
                    </button>
                </form>
            </div>
        </header>

        <main class="admin-body">
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if (isset($errors) && $errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>

