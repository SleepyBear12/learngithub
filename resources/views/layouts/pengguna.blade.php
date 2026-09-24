<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>{{ $title ?? 'EVChargeHub' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --navy: #152642;
            --navy-dark: #0f1d33;
            --navy-light: #edf2f8;
            --white: #ffffff;
            --bg: #f7f9fc;
            --text: #1f2d42;
            --muted: #7b8798;
            --border: #e4e9f0;
            --success: #16a673;
            --danger: #dc3545;
            --warning: #f0a000;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background: var(--bg);
            color: var(--text);
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            padding-bottom: 78px;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           TOPBAR
        ========================== */

        .mobile-topbar {
            height: 68px;
            background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 18px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .brand-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--navy);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .brand-name {
            font-size: 16px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.1;
        }

        .brand-subtitle {
            color: var(--muted);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .8px;
            margin-top: 3px;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .notification-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1px solid var(--border);
            background: white;
            color: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: 3px;
            right: 3px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--danger);
            border: 2px solid white;
        }

        .profile-avatar {
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

        /* =========================
           MAIN CONTENT
        ========================== */

        .mobile-content {
            padding: 20px 16px 20px;
            max-width: 700px;
            width: 100%;
            margin: 0 auto;
        }

        .welcome-text {
            margin-bottom: 20px;
        }

        .welcome-text small {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 4px;
        }

        .welcome-text h1 {
            margin: 0;
            color: var(--navy);
            font-size: 22px;
            font-weight: 700;
        }

        /* =========================
           SEARCH
        ========================== */

        .search-box {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            height: 48px;
            display: flex;
            align-items: center;
            padding: 0 14px;
            margin-bottom: 22px;
        }

        .search-box i {
            color: var(--muted);
            font-size: 17px;
        }

        .search-box input {
            width: 100%;
            border: 0;
            outline: none;
            background: transparent;
            padding-left: 10px;
            font-size: 13px;
            color: var(--text);
        }

        .search-box input::placeholder {
            color: #9ba6b5;
        }

        /* =========================
           CHARGING ACTIVE CARD
        ========================== */

        .charging-card {
            background: var(--navy);
            color: white;
            border-radius: 17px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 8px 20px rgba(21, 38, 66, .12);
        }

        .charging-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .charging-title {
            font-size: 14px;
            font-weight: 600;
        }

        .charging-status {
            background: rgba(255, 255, 255, .13);
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 10px;
        }

        .charging-status i {
            color: #58d6a2;
            margin-right: 4px;
        }

        .charging-progress {
            margin-bottom: 18px;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .progress-label span {
            font-size: 11px;
            opacity: .75;
        }

        .progress-label strong {
            font-size: 22px;
        }

        .progress {
            height: 7px;
            background: rgba(255, 255, 255, .16);
            border-radius: 10px;
        }

        .progress-bar {
            background: white;
            border-radius: 10px;
        }

        .charging-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-bottom: 18px;
        }

        .charging-info-item {
            background: rgba(255, 255, 255, .08);
            border-radius: 10px;
            padding: 10px;
        }

        .charging-info-item small {
            display: block;
            font-size: 9px;
            opacity: .65;
            margin-bottom: 3px;
        }

        .charging-info-item strong {
            font-size: 12px;
        }

        .btn-stop {
            width: 100%;
            border: 0;
            background: white;
            color: var(--navy);
            border-radius: 10px;
            padding: 11px;
            font-size: 12px;
            font-weight: 700;
        }

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            padding: 24px 16px;
            margin-bottom: 24px;
            color: var(--muted);
            border: 1px dashed var(--border);
            border-radius: 14px;
            background: white;
            text-align: center;
            font-size: 11px;
        }

        .empty-state i {
            margin-bottom: 3px;
            color: var(--navy);
            font-size: 24px;
        }

        .empty-state strong {
            color: var(--navy);
            font-size: 13px;
        }

        /* =========================
           SECTION
        ========================== */

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .section-header h2 {
            margin: 0;
            color: var(--navy);
            font-size: 15px;
            font-weight: 700;
        }

        .section-header a {
            color: var(--navy);
            font-size: 11px;
            font-weight: 600;
        }

        /* =========================
           QUICK MENU
        ========================== */

        .quick-menu {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 24px;
        }

        .quick-item {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 13px 5px;
            text-align: center;
            color: var(--text);
        }

        .quick-icon {
            width: 36px;
            height: 36px;
            margin: 0 auto 7px;
            background: var(--navy-light);
            color: var(--navy);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .quick-item span {
            display: block;
            font-size: 9px;
            font-weight: 600;
        }

        /* =========================
           STATION CARD
        ========================== */

        .station-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .station-top {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .station-info {
            display: flex;
            gap: 11px;
        }

        .station-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: var(--navy-light);
            color: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .station-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 4px;
        }

        .station-location {
            color: var(--muted);
            font-size: 10px;
            line-height: 1.4;
        }

        .station-distance {
            color: var(--navy);
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .station-bottom {
            border-top: 1px solid #edf0f4;
            margin-top: 12px;
            padding-top: 11px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .station-status {
            font-size: 10px;
            color: var(--success);
            font-weight: 600;
        }

        .station-status i {
            font-size: 7px;
            vertical-align: middle;
        }

        .station-price {
            font-size: 10px;
            color: var(--muted);
        }

        .station-price strong {
            color: var(--navy);
        }

        .btn-detail {
            border: 1px solid var(--navy);
            color: var(--navy);
            background: white;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 9px;
            font-weight: 600;
        }

        .btn-detail:hover {
            background: var(--navy);
            color: white;
        }

        /* =========================
           BOTTOM NAVIGATION
        ========================== */

        .bottom-nav {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            height: 72px;
            background: white;
            border-top: 1px solid var(--border);
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            z-index: 1100;
            padding-bottom: env(safe-area-inset-bottom);
        }

        .bottom-nav a {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            color: #8490a1;
            font-size: 9px;
            font-weight: 600;
        }

        .bottom-nav a i {
            font-size: 19px;
        }

        .bottom-nav a.active {
            color: var(--navy);
        }

        .bottom-nav a.active i {
            font-size: 20px;
        }

        /* =========================
           RESPONSIVE DESKTOP
        ========================== */

        @media (min-width: 768px) {

            body {
                padding-bottom: 0;
            }

            .mobile-content {
                padding: 30px;
                max-width: 900px;
            }

            .bottom-nav {
                max-width: 700px;
                left: 50%;
                right: auto;
                transform: translateX(-50%);
                bottom: 15px;
                border: 1px solid var(--border);
                border-radius: 15px;
                box-shadow: 0 5px 25px rgba(21, 38, 66, .08);
                padding-bottom: 0;
            }
        }

        @media (max-width: 360px) {

            .mobile-content {
                padding-left: 12px;
                padding-right: 12px;
            }

            .quick-menu {
                gap: 6px;
            }

            .charging-info {
                gap: 5px;
            }

            .charging-info-item {
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            .mobile-topbar {
                padding-left: 14px;
                padding-right: 14px;
            }

            .brand-name {
                font-size: 14px;
            }

            .brand-subtitle {
                font-size: 8px;
            }

            .mobile-content {
                padding: 18px 14px 22px;
            }

            .welcome-text h1 {
                font-size: 20px;
                overflow-wrap: anywhere;
            }

            .charging-card {
                padding: 16px;
            }

            .charging-header {
                align-items: flex-start;
                flex-wrap: wrap;
                gap: 9px;
            }

            .charging-info {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .charging-info-item {
                min-width: 0;
            }

            .charging-info-item strong {
                display: block;
                font-size: 11px;
                overflow-wrap: anywhere;
            }

            .quick-menu {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 8px;
            }

            .station-top,
            .station-bottom {
                align-items: flex-start;
                gap: 10px;
            }

            .station-info {
                min-width: 0;
            }

            .station-name,
            .station-location {
                overflow-wrap: anywhere;
            }

            .station-bottom {
                flex-wrap: wrap;
            }

            .btn-detail {
                margin-left: auto;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<header class="mobile-topbar">

    <a href="{{ url('/pengguna/dashboard') }}" class="brand-wrapper">

        <div class="brand-logo">
            <i class="bi bi-lightning-charge-fill"></i>
        </div>

        <div>
            <div class="brand-name">EVChargeHub</div>
            <div class="brand-subtitle">EV CHARGING</div>
        </div>

    </a>

    <div class="topbar-actions">

        <a href="{{ url('/pengguna/notifikasi') }}"
           class="notification-btn">

            <i class="bi bi-bell"></i>

            <span class="notification-badge"></span>

        </a>

        <a href="{{ url('/pengguna/profil') }}"
           class="profile-avatar">

            {{ strtoupper(substr(auth()->user()->nama ?? 'US', 0, 2)) }}

        </a>

    </div>

</header>


<main class="mobile-content">

    @yield('content')

</main>


<nav class="bottom-nav">

    <a href="{{ url('/pengguna/dashboard') }}"
       class="{{ request()->is('pengguna/dashboard') ? 'active' : '' }}">

        <i class="bi bi-house-fill"></i>
        <span>Home</span>

    </a>

    <a href="{{ url('/pengguna/station') }}"
       class="{{ request()->is('pengguna/station*') ? 'active' : '' }}">

        <i class="bi bi-geo-alt-fill"></i>
        <span>Cari</span>

    </a>

    <a href="{{ url('/pengguna/charging') }}"
       class="{{ request()->is('pengguna/charging*') ? 'active' : '' }}">

        <i class="bi bi-lightning-charge-fill"></i>
        <span>Charge</span>

    </a>

    <a href="{{ url('/pengguna/riwayat') }}"
       class="{{ request()->is('pengguna/riwayat*') ? 'active' : '' }}">

        <i class="bi bi-clock-history"></i>
        <span>Riwayat</span>

    </a>

    <a href="{{ url('/pengguna/profil') }}"
       class="{{ request()->is('pengguna/profil*') ? 'active' : '' }}">

        <i class="bi bi-person-fill"></i>
        <span>Profil</span>

    </a>

</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>