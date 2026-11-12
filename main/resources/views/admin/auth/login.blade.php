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
            --primary-dark: #0b1320;
            --accent: #f26522;
            --accent-hover: #e05310;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { overflow-y: auto; }

        body {
            overflow-y: auto;
            font-family: 'Figtree', sans-serif;
            color: var(--text);
            background: #fff;
            min-height: 100vh;
        }

        .login-shell { display: grid; grid-template-columns: 1.15fr 1fr; min-height: 100vh; min-height: 100dvh; }

        /* ---- brand panel ---- */
        .brand-panel {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px 56px;
            position: sticky;
            top: 0;
            height: 100vh;
            height: 100dvh;
            overflow: hidden;
            color: #fff;
            background: radial-gradient(circle at 70% 45%, #1f3d57 0%, #192f42 45%, #0b1320 100%);
        }
        .brand-logo img { display: block; height: 46px; width: auto; background: #fff; padding: 8px 14px; border-radius: 8px; }
        .brand-copy { margin-top: 36px; }
        .brand-copy h2 { font-size: 40px; line-height: 1.15; font-weight: 700; margin-bottom: 16px; max-width: 460px; }
        .brand-copy h2 span { color: var(--accent); }
        .brand-copy p { font-size: 16px; line-height: 1.6; color: #cbd5e1; max-width: 440px; }
        .brand-art { flex: 1; display: flex; align-items: center; justify-content: center; min-height: 0; padding: 10px 0; }
        .brand-art svg { width: 100%; max-width: 480px; max-height: 100%; height: auto; }
        .ill-smoke { transform-box: fill-box; transform-origin: center; animation: ill-smoke 5s ease-in infinite; opacity: 0; }
        .ill-flame { transform-box: fill-box; transform-origin: 50% 100%; animation: ill-flame 1.2s ease-in-out infinite alternate; }
        .ill-gear { transform-box: fill-box; transform-origin: center; animation: ill-spin 14s linear infinite; }
        .ill-nod { transform-box: fill-box; transform-origin: 50% 100%; animation: ill-nod 3.4s ease-in-out infinite; }
        .ill-float { animation: ill-float 4s ease-in-out infinite; }
        @keyframes ill-smoke { 0% { transform: translate(0, 0) scale(.5); opacity: 0; } 15% { opacity: .55; } 100% { transform: translate(26px, -90px) scale(1.7); opacity: 0; } }
        @keyframes ill-flame { from { transform: scale(1, .86); } to { transform: scale(1.08, 1.06); } }
        @keyframes ill-spin { to { transform: rotate(360deg); } }
        @keyframes ill-nod { 0%, 100% { transform: rotate(0); } 50% { transform: rotate(3deg); } }
        @keyframes ill-float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-6px); } }
        @media (prefers-reduced-motion: reduce) { .ill-smoke, .ill-flame, .ill-gear, .ill-nod, .ill-float { animation: none; } .ill-smoke { opacity: .35; } }

        .brand-stats { display: flex; flex-wrap: wrap; gap: 12px; }
        .brand-stats div {
            padding: 12px 18px;
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 10px;
            background: rgba(255, 255, 255, .07);
            backdrop-filter: blur(6px);
            font-size: 13px;
            color: #cbd5e1;
        }
        .brand-stats strong { display: block; font-size: 20px; color: #fff; }

        /* ---- form panel ---- */
        .form-panel { display: flex; flex-direction: column; align-items: center; padding: 40px 24px; background: #fff; }
        .form-box { width: 100%; max-width: 400px; margin: auto 0; }
        .mobile-logo { display: none; margin-bottom: 28px; }
        .mobile-logo img { height: 40px; width: auto; }
        .eyebrow { display: inline-flex; align-items: center; gap: 8px; margin-bottom: 14px; padding: 5px 12px; border-radius: 999px; background: #fff3ec; color: var(--accent); font-size: 12px; font-weight: 700; letter-spacing: .6px; text-transform: uppercase; }
        .form-box h1 { font-size: 30px; font-weight: 700; margin-bottom: 8px; }
        .subtitle { font-size: 15px; color: var(--muted); margin-bottom: 28px; line-height: 1.5; }

        .alert { display: flex; align-items: flex-start; gap: 10px; padding: 12px 14px; border-radius: 8px; font-size: 14px; margin-bottom: 20px; line-height: 1.45; }
        .alert-error { background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; }
        .alert i { margin-top: 2px; }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 7px; font-size: 14px; font-weight: 600; color: #334155; }
        .input-group { position: relative; }
        .input-group > i.lead { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 15px; pointer-events: none; }
        .input-group input {
            width: 100%;
            height: 48px;
            padding: 0 44px 0 44px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text);
            font-size: 15px;
            font-family: inherit;
            transition: border-color .2s ease, box-shadow .2s ease;
        }
        .input-group input::placeholder { color: #94a3b8; }
        .input-group input:hover { border-color: #cbd5e1; }
        .input-group input:focus { outline: none; border-color: var(--accent); box-shadow: 0 0 0 4px rgba(242, 101, 34, .14); }
        .toggle-pass { position: absolute; right: 6px; top: 50%; transform: translateY(-50%); width: 36px; height: 36px; border: 0; border-radius: 6px; background: transparent; color: #94a3b8; cursor: pointer; }
        .toggle-pass:hover { color: var(--primary); background: #f1f5f9; }

        .remember-row { display: flex; align-items: center; margin-bottom: 24px; font-size: 14px; color: var(--muted); }
        .remember-row label { display: flex; align-items: center; gap: 9px; cursor: pointer; user-select: none; }
        .remember-row input { width: 17px; height: 17px; accent-color: var(--accent); cursor: pointer; }

        .btn-submit {
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 0;
            border-radius: 8px;
            background: var(--accent);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            box-shadow: 0 8px 18px -8px rgba(242, 101, 34, .65);
            transition: background .2s ease, transform .15s ease, box-shadow .2s ease;
        }
        .btn-submit:hover { background: var(--accent-hover); transform: translateY(-1px); }
        .btn-submit:disabled { opacity: .75; cursor: progress; transform: none; }

        @media (max-width: 899px) {
            .login-shell { grid-template-columns: 1fr; }
            .brand-panel { display: none; }
            .form-panel { padding-top: 56px; }
            .mobile-logo { display: block; }
        }
        @media (max-width: 400px) { .form-box h1 { font-size: 26px; } }
    </style>
</head>

<body>
    <div class="login-shell">
        <aside class="brand-panel">
            <a class="brand-logo" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/temax/logo.png') }}" alt="{{ setting('site_name', 'TEMAX') }}">
            </a>

            <div class="brand-copy">
                <h2>Furnace viewing, <span>managed.</span></h2>
                <p>Update products, projects, clients and the home page banner of the TEMAX website from one control panel.</p>
            </div>

            <div class="brand-art" aria-hidden="true">
                <svg viewBox="0 0 560 440" xmlns="http://www.w3.org/2000/svg" role="img" style="border-radius:22px; overflow:hidden;">
                    <defs>
                        <radialGradient id="sun" cx="50%" cy="50%" r="50%">
                            <stop offset="0" stop-color="#f26522" stop-opacity=".45"/>
                            <stop offset="1" stop-color="#f26522" stop-opacity="0"/>
                        </radialGradient>
                        <linearGradient id="steel" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0" stop-color="#4d7396"/>
                            <stop offset="1" stop-color="#27465f"/>
                        </linearGradient>
                        <linearGradient id="fire" x1="0" y1="1" x2="0" y2="0">
                            <stop offset="0" stop-color="#d92b0d"/>
                            <stop offset=".5" stop-color="#f26522"/>
                            <stop offset="1" stop-color="#ffd27a"/>
                        </linearGradient>
                        <linearGradient id="beam" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0" stop-color="#ffd27a" stop-opacity=".75"/>
                            <stop offset="1" stop-color="#ffd27a" stop-opacity="0"/>
                        </linearGradient>
                        <clipPath id="scr"><rect x="338" y="318" width="116" height="66" rx="6"/></clipPath>
                    </defs>

                    <!-- backdrop -->
                    <circle cx="300" cy="190" r="210" fill="url(#sun)"/>
                    <g fill="#fff" fill-opacity=".35">
                        <circle cx="60" cy="60" r="2"/><circle cx="130" cy="30" r="1.6"/><circle cx="250" cy="48" r="2"/>
                        <circle cx="395" cy="34" r="1.6"/><circle cx="500" cy="70" r="2"/><circle cx="525" cy="140" r="1.6"/>
                    </g>
                    <g class="ill-float">
                        <path d="M70 108c-10 0-14-14-4-18 2-12 20-12 23-1 11-2 16 12 8 19z" fill="#fff" fill-opacity=".1"/>
                    </g>
                    <g class="ill-gear" transform="translate(500 96)">
                        <g fill="none" stroke="#f26522" stroke-opacity=".7" stroke-width="3">
                            <circle r="14"/><circle r="5"/>
                            <path d="M0-22v8M0 14v8M-22 0h8M14 0h8M-15.5-15.5l5.6 5.6M9.9 9.9l5.6 5.6M-15.5 15.5l5.6-5.6M9.9-9.9l5.6-5.6" stroke-linecap="round"/>
                        </g>
                    </g>

                    <!-- ground -->
                    <path d="M0 300c70-26 130-18 200-6s150 10 220-8 100-10 140 4V440H0z" fill="#12263a"/>
                    <rect x="0" y="302" width="560" height="6" fill="#1b3752" opacity=".7"/>

                    <!-- preheater tower -->
                    <g>
                        <rect x="46" y="120" width="12" height="182" fill="#2a4964"/>
                        <rect x="104" y="120" width="12" height="182" fill="#2a4964"/>
                        <rect x="40" y="128" width="82" height="14" rx="3" fill="url(#steel)"/>
                        <path d="M52 142h58l-14 44H66z" fill="url(#steel)"/>
                        <rect x="40" y="190" width="82" height="14" rx="3" fill="url(#steel)"/>
                        <path d="M52 204h58l-14 44H66z" fill="url(#steel)"/>
                        <rect x="40" y="252" width="82" height="14" rx="3" fill="url(#steel)"/>
                        <rect x="76" y="266" width="10" height="36" fill="#27465f"/>
                        <path d="M122 135h26v95h-26" fill="none" stroke="#3a5f7f" stroke-width="8" stroke-linejoin="round"/>
                        <circle cx="81" cy="112" r="6" fill="#f26522"/>
                        <rect x="79" y="96" width="4" height="16" fill="#3a5f7f"/>
                    </g>

                    <!-- rotary kiln -->
                    <g transform="rotate(-3 285 225)">
                        <path d="M205 300l24-38h18l-8 38zM322 300l-6-38h22l24 38z" fill="#1d3a54"/>
                        <rect x="150" y="190" width="290" height="70" rx="35" fill="url(#steel)"/>
                        <rect x="150" y="190" width="290" height="22" rx="11" fill="#fff" fill-opacity=".12"/>
                        <g fill="#f26522">
                            <rect x="212" y="188" width="14" height="74" rx="3"/>
                            <rect x="338" y="188" width="14" height="74" rx="3"/>
                        </g>
                        <g fill="#0f2233" fill-opacity=".45">
                            <circle cx="178" cy="225" r="2.4"/><circle cx="262" cy="206" r="2.4"/><circle cx="300" cy="246" r="2.4"/><circle cx="392" cy="225" r="2.4"/>
                        </g>
                        <!-- firing hood -->
                        <path d="M432 196h26a8 8 0 0 1 8 8v52a8 8 0 0 1-8 8h-26z" fill="#2a4964"/>
                        <rect x="466" y="214" width="10" height="26" rx="3" fill="#f26522"/>
                    </g>

                    <!-- furnace camera + beam -->
                    <g>
                        <path d="M270 215h26l22 58h-70z" fill="url(#beam)"/>
                        <rect x="278" y="150" width="14" height="58" rx="4" fill="#f4f7fa"/>
                        <rect x="274" y="144" width="22" height="12" rx="4" fill="#f26522"/>
                        <rect x="281" y="204" width="8" height="10" rx="2" fill="#0b1320"/>
                        <circle cx="285" cy="209" r="2.2" fill="#ffd27a"/>
                        <path d="M285 144v-20h16" fill="none" stroke="#9fb4c7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <g class="ill-float" style="animation-delay:-1s">
                        <rect x="312" y="104" width="62" height="24" rx="12" fill="#f26522"/>
                        <circle cx="326" cy="116" r="4" fill="#fff"><animate attributeName="opacity" values="1;.25;1" dur="1.5s" repeatCount="indefinite"/></circle>
                        <text x="335" y="120" fill="#fff" font-family="Figtree, sans-serif" font-size="11" font-weight="700" letter-spacing="1">LIVE</text>
                    </g>

                    <!-- chimney + smoke -->
                    <path d="M500 302l6-168h22l6 168z" fill="url(#steel)"/>
                    <rect x="504" y="150" width="30" height="8" fill="#f26522"/>
                    <rect x="505" y="186" width="28" height="8" fill="#f26522"/>
                    <g fill="#cfd9e3">
                        <circle class="ill-smoke" cx="517" cy="126" r="14"/>
                        <circle class="ill-smoke" cx="517" cy="126" r="12" style="animation-delay:1.7s"/>
                        <circle class="ill-smoke" cx="517" cy="126" r="15" style="animation-delay:3.3s"/>
                    </g>

                    <!-- control room foreground -->
                    <rect x="0" y="392" width="560" height="48" fill="#0a1523"/>
                    <rect x="20" y="388" width="520" height="12" rx="6" fill="#27465f"/>

                    <!-- monitor -->
                    <rect x="330" y="310" width="132" height="82" rx="9" fill="#1b3350" stroke="#3a5f7f" stroke-width="3"/>
                    <rect x="338" y="318" width="116" height="66" rx="6" fill="#0b1320"/>
                    <g clip-path="url(#scr)">
                        <rect x="338" y="318" width="116" height="66" fill="#3a1408"/>
                        <g class="ill-flame">
                            <path d="M370 384c-4-18 6-26 8-40 8 8 10 14 8 24 6-6 10-16 8-28 14 10 20 30 10 44z" fill="url(#fire)"/>
                            <path d="M404 384c-4-12 3-18 5-26 6 6 7 10 6 17 4-4 7-10 6-18 9 7 11 20 5 27z" fill="#ffd27a" fill-opacity=".85"/>
                        </g>
                        <rect x="338" y="318" width="116" height="66" fill="#fff" fill-opacity=".04"/>
                    </g>
                    <circle cx="444" cy="327" r="3.4" fill="#ef4444"><animate attributeName="opacity" values="1;.2;1" dur="1.2s" repeatCount="indefinite"/></circle>
                    <rect x="387" y="392" width="18" height="10" fill="#3a5f7f"/>
                    <rect x="372" y="400" width="48" height="5" rx="2.5" fill="#3a5f7f"/>

                    <!-- operator -->
                    <g class="ill-nod">
                        <path d="M226 392c0-30 12-44 38-44s38 14 38 44z" fill="#f26522"/>
                        <path d="M244 350l-6 42M284 350l6 42" stroke="#e8edf2" stroke-width="5" stroke-opacity=".9"/>
                        <rect x="256" y="338" width="16" height="14" rx="5" fill="#e8b98f"/>
                        <circle cx="264" cy="322" r="17" fill="#f2c9a0"/>
                        <path d="M246 320a18 18 0 0 1 36 0z" fill="#ffc21a"/>
                        <rect x="242" y="318" width="44" height="6" rx="3" fill="#e5a800"/>
                        <circle cx="258" cy="327" r="1.8" fill="#0b1320"/><circle cx="271" cy="327" r="1.8" fill="#0b1320"/>
                        <path d="M259 334q5 4 10 0" fill="none" stroke="#0b1320" stroke-width="1.6" stroke-linecap="round"/>
                    </g>
                    <path d="M298 368l34-6" stroke="#f26522" stroke-width="9" stroke-linecap="round"/>
                    <circle cx="334" cy="362" r="5" fill="#f2c9a0"/>

                    <!-- desk props -->
                    <rect x="62" y="364" width="34" height="24" rx="4" fill="#e8edf2"/>
                    <path d="M62 372h34" stroke="#cbd5e1" stroke-width="2"/>
                    <path d="M72 364c-2-8 4-10 2-16 6 3 6 10 4 16" fill="none" stroke="#fff" stroke-opacity=".5" stroke-width="2" stroke-linecap="round"/>
                    <rect x="478" y="376" width="30" height="12" rx="3" fill="#3a5f7f"/>
                    <circle cx="486" cy="382" r="2.4" fill="#22c55e"/><circle cx="494" cy="382" r="2.4" fill="#f59e0b"/><circle cx="502" cy="382" r="2.4" fill="#ef4444"/>
                </svg>
            </div>

            <div class="brand-stats">
                <div><strong>1996</strong>Founded in Karur</div>
                <div><strong>90%</strong>Made in India</div>
                <div><strong>2000&nbsp;°C</strong>Operating rating</div>
            </div>
        </aside>

        <main class="form-panel">
            <div class="form-box">
                <a class="mobile-logo" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/temax/logo.png') }}" alt="{{ setting('site_name', 'TEMAX') }}">
                </a>

                <span class="eyebrow"><i class="fas fa-shield-alt"></i> Admin Portal</span>
                <h1>Welcome back</h1>
                <p class="subtitle">Sign in to manage TEMAX products &amp; content.</p>

                @if (isset($errors) && $errors->any())
                    <div class="alert alert-error" role="alert">
                        <i class="fas fa-exclamation-circle"></i> <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" role="status">
                        <i class="fas fa-check-circle"></i> <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.attempt') }}" id="login-form">
                    @csrf

                    <div class="form-group">
                        <label for="login">Username or email</label>
                        <div class="input-group">
                            <i class="fas fa-user lead"></i>
                            <input type="text" id="login" name="login" value="{{ old('login') }}" placeholder="Enter username or email" required autofocus autocomplete="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <i class="fas fa-lock lead"></i>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
                            <button type="button" class="toggle-pass" id="toggle-pass" aria-label="Show password"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>

                    <div class="remember-row">
                        <label>
                            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                            <span>Keep me signed in</span>
                        </label>
                    </div>

                    <button type="submit" class="btn-submit" id="btn-submit">
                        <span>Sign In</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

            </div>
        </main>
    </div>

    <script>
        (function () {
            var pass = document.getElementById('password');
            var toggle = document.getElementById('toggle-pass');
            toggle.addEventListener('click', function () {
                var show = pass.type === 'password';
                pass.type = show ? 'text' : 'password';
                toggle.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
                toggle.firstElementChild.className = show ? 'fas fa-eye-slash' : 'fas fa-eye';
            });
            document.getElementById('login-form').addEventListener('submit', function () {
                var btn = document.getElementById('btn-submit');
                btn.disabled = true;
                btn.firstElementChild.textContent = 'Signing in…';
            });
        })();
    </script>
</body>

</html>
