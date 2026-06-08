<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Admin') — Softura Solutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --admin-sidebar-bg: #0c1a2e;
            --admin-sidebar-border: #1a3352;
            --admin-blue: #1d6fdb;
            --admin-blue-light: #2d82f0;
            --admin-blue-glow: rgba(29, 111, 219, 0.15);
            --admin-text-muted: #8aa3be;
            --admin-surface: #f8fafc;
            --admin-card-bg: #ffffff;
        }

        * { box-sizing: border-box; }

        body {
            background: var(--admin-surface);
            font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif;
            margin: 0;
        }

        /* ── LAYOUT ── */
        .admin-shell {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* ── SIDEBAR ── */
        .admin-sidebar {
            width: 260px;
            min-width: 260px;
            background: var(--admin-sidebar-bg);
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--admin-sidebar-border);
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 24px 24px 20px;
            border-bottom: 1px solid var(--admin-sidebar-border);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar-brand-icon {
            width: 36px;
            height: 36px;
            background: var(--admin-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
            flex-shrink: 0;
        }
        .sidebar-brand-text .name {
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.01em;
            line-height: 1.2;
        }
        .sidebar-brand-text .tag {
            font-size: 10px;
            font-weight: 600;
            color: var(--admin-blue-light);
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        /* Nav sections */
        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
        }
        .nav-section-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #3d5a78;
            padding: 8px 12px 6px;
            margin-top: 8px;
        }
        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--admin-text-muted);
            text-decoration: none;
            transition: all 0.15s ease;
            cursor: pointer;
        }
        .nav-item:hover {
            background: rgba(29, 111, 219, 0.08);
            color: #c8dff5;
        }
        .nav-item.active {
            background: var(--admin-blue-glow);
            color: #ffffff;
            border-left: 2px solid var(--admin-blue);
            padding-left: 10px;
        }
        .nav-item i {
            width: 18px;
            text-align: center;
            font-size: 13px;
            opacity: 0.85;
        }
        .nav-item.active i { opacity: 1; color: var(--admin-blue-light); }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid var(--admin-sidebar-border);
        }
        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            margin-bottom: 6px;
        }
        .sidebar-avatar {
            width: 32px;
            height: 32px;
            background: var(--admin-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            color: white;
            flex-shrink: 0;
        }
        .sidebar-user-info .uname { font-size: 13px; font-weight: 600; color: #dbe8f5; line-height: 1.2; }
        .sidebar-user-info .urole { font-size: 11px; color: #3d5a78; }
        .sidebar-logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            color: #5a7a9a;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: all 0.15s;
            text-align: left;
        }
        .sidebar-logout-btn:hover { background: rgba(239,68,68,0.08); color: #f87171; }

        /* ── MAIN ── */
        .admin-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .admin-topbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 32px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }
        .topbar-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #94a3b8;
        }
        .topbar-breadcrumb .current {
            color: #1e293b;
            font-weight: 600;
        }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .topbar-date {
            font-size: 12px;
            color: #94a3b8;
        }
        .topbar-badge {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #eff6ff;
            color: var(--admin-blue);
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            border: 1px solid #bfdbfe;
        }

        .admin-content {
            flex: 1;
            overflow-y: auto;
            padding: 32px;
        }
    </style>
</head>
<body>

<div class="admin-shell">

    {{-- ══ SIDEBAR ══ --}}
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon"><i class="fas fa-layer-group"></i></div>
            <div class="sidebar-brand-text">
                <div class="name">Softura Solutions</div>
                <div class="tag">Panel Admin</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section-label">General</div>

            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>

            <div class="nav-section-label" style="margin-top:16px">Páginas del sitio</div>

            <a href="{{ route('admin.pages.inicio') }}" class="nav-item {{ request()->routeIs('admin.pages.inicio') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Página principal
            </a>
            <a href="{{ route('admin.pages.fabrica') }}" class="nav-item {{ request()->routeIs('admin.pages.fabrica') ? 'active' : '' }}">
                <i class="fas fa-code"></i> Fábrica de software
            </a>
            <a href="{{ route('admin.pages.nearshoring') }}" class="nav-item {{ request()->routeIs('admin.pages.nearshoring') ? 'active' : '' }}">
                <i class="fas fa-globe-americas"></i> Nearshoring & Outsourcing
            </a>
            <a href="{{ route('admin.pages.productos') }}" class="nav-item {{ request()->routeIs('admin.pages.productos') ? 'active' : '' }}">
                <i class="fas fa-box-open"></i> Productos
            </a>
            <a href="{{ route('admin.pages.blog') }}" class="nav-item {{ request()->routeIs('admin.pages.blog') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i> Blog
            </a>
            <a href="{{ route('admin.pages.conocenos') }}" class="nav-item {{ request()->routeIs('admin.pages.conocenos') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Conócenos
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                <div class="sidebar-user-info">
                    <div class="uname">{{ auth()->user()->name }}</div>
                    <div class="urole">Administrador</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </button>
            </form>
        </div>
    </aside>

    {{-- ══ MAIN AREA ══ --}}
    <div class="admin-main">
        <header class="admin-topbar">
            <div class="topbar-breadcrumb">
                <i class="fas fa-layer-group" style="color:#1d6fdb;font-size:12px"></i>
                <span>Admin</span>
                <span style="color:#cbd5e1">›</span>
                <span class="current">@yield('breadcrumb', 'Dashboard')</span>
            </div>
            <div class="topbar-right">
                <span class="topbar-date"><i class="far fa-calendar-alt" style="margin-right:4px"></i>{{ now()->locale('es')->isoFormat('D MMM YYYY') }}</span>
                <div class="topbar-badge"><span style="width:6px;height:6px;background:#22c55e;border-radius:50%;display:inline-block"></span> Activo</div>
            </div>
        </header>

        <main class="admin-content">
            @yield('content')
        </main>
    </div>

</div>

</body>
</html>
