<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - IP Software Technologies</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed: 70px;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --sidebar-bg: #1e1b4b;
            --sidebar-hover: #312e81;
            --sidebar-active: #4338ca;
            --topbar-height: 60px;
            --body-bg: #f1f5f9;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--body-bg);
            overflow-x: hidden;
        }

        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            color: #fff;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #4338ca transparent;
        }

        .admin-sidebar::-webkit-scrollbar { width: 4px; }
        .admin-sidebar::-webkit-scrollbar-thumb { background: #4338ca; border-radius: 4px; }

        .sidebar-logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-logo h4 {
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            margin: 0;
        }

        .sidebar-logo h4 span { color: #a78bfa; }

        .sidebar-nav { padding: 15px 0; }

        .sidebar-section {
            padding: 8px 20px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.4);
            font-weight: 600;
            margin-top: 10px;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-nav a:hover {
            background: var(--sidebar-hover);
            color: #fff;
            border-left-color: rgba(255,255,255,0.3);
        }

        .sidebar-nav a.active {
            background: var(--sidebar-active);
            color: #fff;
            border-left-color: #a78bfa;
        }

        .sidebar-nav a i {
            width: 20px;
            margin-right: 12px;
            font-size: 15px;
            text-align: center;
        }

        /* Topbar */
        .admin-topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            z-index: 999;
            transition: left 0.3s ease;
        }

        .topbar-left { display: flex; align-items: center; gap: 15px; }

        .sidebar-toggle {
            background: none;
            border: none;
            font-size: 20px;
            color: #475569;
            cursor: pointer;
            padding: 5px;
        }

        .topbar-right { display: flex; align-items: center; gap: 20px; }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #334155;
            font-size: 14px;
        }

        .topbar-user .avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }

        .btn-logout {
            background: #ef4444;
            color: #fff;
            border: none;
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-logout:hover { background: #dc2626; }

        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            padding-top: var(--topbar-height);
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .admin-content { padding: 24px; }

        /* Stats Cards */
        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .stat-card .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .stat-card h3 { font-size: 24px; font-weight: 700; margin: 10px 0 2px; }
        .stat-card p { color: #64748b; font-size: 13px; margin: 0; }

        /* Flash Messages */
        .flash-message {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .flash-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
        .flash-error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

        /* Tables */
        .admin-table {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .admin-table table { margin: 0; }
        .admin-table th { background: #f8fafc; font-weight: 600; font-size: 13px; color: #475569; }
        .admin-table td { font-size: 14px; vertical-align: middle; }

        /* Page Headers */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .page-header h2 { font-size: 22px; font-weight: 700; color: #1e293b; }

        /* Quick Actions */
        .quick-action {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            color: #334155;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .quick-action:hover {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }

        .quick-action i { font-size: 18px; }
    </style>

    @stack('styles')
</head>
<body>

    <aside class="admin-sidebar">
        <div class="sidebar-logo">
            <h4>IP Software <span>Admin</span></h4>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>

            <div class="sidebar-section">Content Management</div>
            <a href="{{ route('admin.hero-sections.index') }}" class="{{ request()->routeIs('admin.hero-sections.*') ? 'active' : '' }}">
                <i class="fas fa-image"></i> Hero Section
            </a>
            <a href="{{ route('admin.about-sections.index') }}" class="{{ request()->routeIs('admin.about-sections.*') ? 'active' : '' }}">
                <i class="fas fa-info-circle"></i> About
            </a>
            <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fas fa-cogs"></i> Services
            </a>
            <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <i class="fas fa-folder-open"></i> Projects
            </a>
            <a href="{{ route('admin.project-categories.index') }}" class="{{ request()->routeIs('admin.project-categories.*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> Categories
            </a>
            <a href="{{ route('admin.technologies.index') }}" class="{{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}">
                <i class="fas fa-microchip"></i> Technologies
            </a>
            <a href="{{ route('admin.industries.index') }}" class="{{ request()->routeIs('admin.industries.*') ? 'active' : '' }}">
                <i class="fas fa-industry"></i> Industries
            </a>

            <div class="sidebar-section">Other Sections</div>
            <a href="{{ route('admin.why-choose-us.index') }}" class="{{ request()->routeIs('admin.why-choose-us.*') ? 'active' : '' }}">
                <i class="fas fa-award"></i> Why Choose Us
            </a>
            <a href="{{ route('admin.processes.index') }}" class="{{ request()->routeIs('admin.processes.*') ? 'active' : '' }}">
                <i class="fas fa-project-diagram"></i> Processes
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <i class="fas fa-quote-left"></i> Testimonials
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                <i class="fas fa-question-circle"></i> FAQs
            </a>
            <a href="{{ route('admin.team-members.index') }}" class="{{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Team
            </a>
            <a href="{{ route('admin.job-openings.index') }}" class="{{ request()->routeIs('admin.job-openings.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i> Jobs
            </a>

            <div class="sidebar-section">Messages</div>
            <a href="{{ route('admin.contact-messages.index') }}" class="{{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Contact Messages
            </a>

            <div class="sidebar-section">Settings</div>
            <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fas fa-globe"></i> Website Settings
            </a>
            <a href="{{ route('admin.seo-settings.index') }}" class="{{ request()->routeIs('admin.seo-settings.*') ? 'active' : '' }}">
                <i class="fas fa-search"></i> SEO Settings
            </a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-user-shield"></i> Users
            </a>
        </nav>
    </aside>

    <header class="admin-topbar">
        <div class="topbar-left">
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="topbar-right">
            <div class="topbar-user">
                <div class="avatar">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</div>
                <span>{{ Auth::user()->name ?? 'Admin' }}</span>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </header>

    <main class="admin-main">
        <div class="admin-content">

            @if(session('success'))
                <div class="flash-message flash-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="flash-message flash-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.admin-sidebar');
            const main = document.querySelector('.admin-main');
            const topbar = document.querySelector('.admin-topbar');

            if (sidebar.style.width === '70px') {
                sidebar.style.width = '260px';
                main.style.marginLeft = '260px';
                topbar.style.left = '260px';
            } else {
                sidebar.style.width = '70px';
                main.style.marginLeft = '70px';
                topbar.style.left = '70px';
            }
        });

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    </script>

    @stack('scripts')
</body>
</html>
