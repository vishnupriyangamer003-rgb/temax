<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ setting('site_name', 'TEMAX') }}</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('assets/fonts-figtree.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary: #192f42;
            --primary-dark: #0f1d29;
            --accent: #f26522;
            --accent-hover: #e05310;
            --bg: #0f172a;
            --card-bg: #1e293b;
            --border: #334155;
            --text: #f8fafc;
            --text-muted: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #0b1320 0%, #192f42 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--text);
        }

        .login-card {
            background: rgba(30, 41, 59, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
            text-align: center;
        }

        .login-logo {
            margin-bottom: 25px;
        }

        .login-logo img {
            max-width: 180px;
            height: auto;
            background: #fff;
            padding: 8px 16px;
            border-radius: 6px;
        }

        .login-card h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #fff;
        }

        .login-card p.subtitle {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
            color: #cbd5e1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            background: #0f172a;
            border: 1px solid var(--border);
            border-radius: 6px;
            color: #fff;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(242, 101, 34, 0.2);
        }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            font-size: 14px;
            color: var(--text-muted);
        }

        .remember-row label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            user-select: none;
        }

        .remember-row input[type="checkbox"] {
            accent-color: var(--accent);
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 13px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background: var(--accent-hover);
            transform: translateY(-1px);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.4);
            color: #fca5a5;
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 22px;
            text-align: left;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.4);
            color: #86efac;
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 22px;
            text-align: left;
        }

        .back-link {
            display: inline-block;
            margin-top: 24px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="login-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/temax/logo.png') }}" alt="{{ setting('site_name', 'TEMAX') }}">
            </a>
        </div>

        <h2>Control Panel</h2>
        <p class="subtitle">Sign in to manage TEMAX products & content</p>

        @if (isset($errors) && $errors->any())
            <div class="alert-error">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.attempt') }}">
            @csrf

            <div class="form-group">
                <label for="login">Username or Email</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="login" name="login" value="{{ old('login') }}" placeholder="admin or email" required autofocus autocomplete="username">
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="••••••••" required autocomplete="current-password">
                </div>
            </div>

            <div class="remember-row">
                <label>
                    <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit" class="btn-submit">
                <span>Sign In</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>

        <a href="{{ route('home') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Website
        </a>
    </div>
</body>

</html>
