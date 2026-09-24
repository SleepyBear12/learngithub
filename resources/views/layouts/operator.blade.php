<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Operator Dashboard' }} - EVChargeHub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --navy: #152642;
            --navy-dark: #0f1d33;
            --navy-light: #eaf0f8;
            --white: #ffffff;
            --text: #26364d;
            --muted: #7b8798;
            --border: #e4e9f0;
            --bg: #f7f9fc;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 245px;
            height: 100vh;
            background: white;
            border-right: 1px solid var(--border);
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .brand {
            height: 72px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border);
        }

        .brand-logo {
            width: 36px;
            height: 36px;
            background: var(--navy);
            color: white;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .brand-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.1;
        }

        .brand-subtitle {
            font-size: 9px;
            color: var(--muted);
            font-weight: 700;
            letter-spacing: 1px;
            margin-top: 4px;
        }

        .sidebar-content {
            padding: 20px 12px;
            overflow-y: auto;
            flex: 1;
        }

        .menu-title {
            font-size: 10px;
            font-weight: 700;
            color: #9aa5b5;
            text-transform: uppercase;
            margin: 0 8px 10px;
            letter-spacing: .4px;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-menu li {
            margin-bottom: 4px;
        }

        .nav-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #617087;
            font-size: 13px;
            font-weight: 500;
            padding: 10px 12px;
            border-radius: 9px;
            transition: .2s ease;
        }

        .nav-menu a i {
            width: 19px;
            font-size: 15px;
            text-align: center;
        }

        .nav-menu a:hover {
            background: var(--navy-light);
            color: var(--navy);
        }

        .nav-menu a.active {
            background: var(--navy);
            color: white;
            font-weight: 600;
        }

        .account-section {
            border-top: 1px solid var(--border);
            padding: 15px 12px;
        }

        .profile-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            text-decoration: none;
            color: #617087;
            font-size: 13px;
            border-radius: 8px;
        }

        .profile-link:hover {
            background: var(--navy-light);
            color: var(--navy);
        }

        .logout-btn {
            width: 100%;
            border: 1px solid #e3e7ed;
            background: white;
            color: #dc3545;
            border-radius: 9px;
            padding: 8px;
            font-size: 12px;
            margin-top: 8px;
        }

        .logout-btn:hover {
            background: #fff5f5;
        }

        .main-wrapper {
            margin-left: 245px;
            min-height: 100vh;
        }

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
        }

        .page-heading small {
            display: block;
            color: #91a0b5;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .6px;
            margin-bottom: 3px;
        }

        .page-heading h1 {
            font-size: 22px;
            font-weight: 700;
            color: var(--navy);
            margin: 0;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .date-box {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 13px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            color: #52627a;
            font-size: 12px;
        }

        .date-box i {
            color: var(--navy);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--navy);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }

        .content {
            padding: 25px;
        }

        .dashboard-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(21, 38, 66, .03);
        }

        .mobile-toggle {
            display: none;
            border: 0;
            background: transparent;
            color: var(--navy);
            font-size: 22px;
        }

        @media (max-width: 991px) {

            .sidebar {
                transform: translateX(-100%);
                transition: .25s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .mobile-toggle {
                display: inline-block;
            }

            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 18px;
            }

            .date-box {
                display: none;
            }
        }

        @media (max-width: 576px) {

            .page-heading h1 {
                font-size: 18px;
            }

            .brand {
                height: 65px;
            }

            .topbar {
                height: 65px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<aside class="sidebar" id="sidebar">

    <div class="brand">

        <div class="brand-logo">
            <i class="bi bi-lightning-charge-fill"></i>
        </div>

        <div>
            <div class="brand-title">EVChargeHub</div>
            <div class="brand-subtitle">OPERATOR PANEL</div>
        </div>

    </div>

    <div class="sidebar-content">

        <div class="menu-title">Menu Utama</div>

        <ul class="nav-menu">

            <li>
                <a href="{{ url('/operator/dashboard') }}"
                   class="{{ request()->is('operator/dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/lokasi-pengisian') }}"
                   class="{{ request()->is('operator/lokasi-pengisian*') ? 'active' : '' }}">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Lokasi Saya</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/pengisi-daya') }}"
                   class="{{ request()->is('operator/pengisi-daya*') ? 'active' : '' }}">
                    <i class="bi bi-ev-front-fill"></i>
                    <span>Pengisi Daya</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/pemesanan') }}"
                   class="{{ request()->is('operator/pemesanan*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check-fill"></i>
                    <span>Reservasi</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/sesi-pengisian') }}"
                   class="{{ request()->is('operator/sesi-pengisian*') ? 'active' : '' }}">
                    <i class="bi bi-battery-charging"></i>
                    <span>Sesi Charging</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/tarif') }}"
                   class="{{ request()->is('operator/tarif*') ? 'active' : '' }}">
                    <i class="bi bi-tags-fill"></i>
                    <span>Tarif</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/promo') }}"
                   class="{{ request()->is('operator/promo*') ? 'active' : '' }}">
                    <i class="bi bi-ticket-perforated-fill"></i>
                    <span>Promo</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/pemeliharaan') }}"
                   class="{{ request()->is('operator/pemeliharaan*') ? 'active' : '' }}">
                    <i class="bi bi-tools"></i>
                    <span>Pemeliharaan</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/transaksi') }}"
                   class="{{ request()->is('operator/transaksi*') ? 'active' : '' }}">
                    <i class="bi bi-credit-card-fill"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/laporan') }}"
                   class="{{ request()->is('operator/laporan*') ? 'active' : '' }}">
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/operator/pengaduan') }}"
                   class="{{ request()->is('operator/pengaduan*') ? 'active' : '' }}">
                    <i class="bi bi-chat-left-text-fill"></i>
                    <span>Pengaduan</span>
                </a>
            </li>

        </ul>

    </div>

    <div class="account-section">

        <div class="menu-title">Akun</div>

        <a href="{{ url('/operator/profil') }}" class="profile-link">
            <i class="bi bi-person-circle"></i>
            <span>Profil Saya</span>
        </a>

        <form action="{{ url('/logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-right me-1"></i>
                Logout
            </button>
        </form>

    </div>

</aside>

<div class="main-wrapper">

    <header class="topbar">

        <div class="d-flex align-items-center gap-2">

            <button class="mobile-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>

            <div class="page-heading">

                <small>Selamat Datang, Operator</small>

                <h1>
                    {{ $pageTitle ?? 'Dashboard Operator' }}
                </h1>

            </div>

        </div>

        <div class="topbar-right">

            <div class="date-box">
                <i class="bi bi-calendar3"></i>

                <span>
                    {{ now()->translatedFormat('l, d M Y') }}
                </span>
            </div>

            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->nama ?? 'OP', 0, 2)) }}
            </div>

        </div>

    </header>

    <main class="content">

        @yield('content')

    </main>

</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }
</script>

@stack('scripts')

</body>
</html>