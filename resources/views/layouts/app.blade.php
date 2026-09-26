<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRADO - Creative Workspace</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --prado-dark: #2d1b4e;       /* Malalim at eleganteng purple-dark para sa sidebar */
            --prado-purple: #8b5cf6;     /* Main vibrant purple */
            --prado-light-purple: #f5f3ff; /* Malambot na lavender background accent */
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #faf8fc;
            color: #3b2a4a;
        }
        .sidebar {
            width: 260px;
            background: var(--prado-dark);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            transition: all 0.3s ease;
        }
        .main-content {
            margin-left: 260px;
            padding: 2.5rem;
        }
        .nav-link-custom {
            color: #d8b4fe;
            border-radius: 0.85rem;
            padding: 0.75rem 1rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
        }
        .nav-link-custom:hover {
            color: #ffffff;
            background-color: rgba(139, 92, 246, 0.2);
        }
        .nav-link-custom.active {
            color: #ffffff;
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
        }
        .glass-card {
            background: #ffffff;
            border: 1px solid #f3e8ff;
            border-radius: 1.25rem;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.04);
        }
        @media (max-width: 991.98px) {
            .sidebar { margin-left: -260px; }
            .main-content { margin-left: 0; padding: 1rem; }
        }
    </style>
</head>
<body>

    <!-- Fixed Sidebar Navigation -->
    <aside class="sidebar d-flex flex-column p-4">
        <!-- Logo Brand -->
        <div class="d-flex align-items-center gap-3 mb-5 px-2">
            <div class="rounded-4 p-2 d-flex align-items-center justify-content-center shadow-sm" style="background: linear-gradient(135deg, #a78bfa 0%, #7c3aed 100%); width: 42px; height: 42px;">
                <i class="bi bi-stars text-white fs-5"></i>
            </div>
            <div>
                <h4 class="fw-bold text-white mb-0 tracking-wide" style="letter-spacing: 1px;">PRADO</h4>
                <span class="text-purple-200" style="font-size: 11px; color: #d8b4fe;">Creative Workspace</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="d-flex flex-column gap-2 mb-auto">
            <span class="text-uppercase fw-bold px-2 mb-2" style="font-size: 10px; color: #c4b5fd; letter-spacing: 0.08em;">Main Menu</span>
            <a href="{{ url('/tasks') }}" class="nav-link-custom active">
                <i class="bi bi-grid-fill"></i> Tasks Dashboard
            </a>
            <a href="{{ url('/tasks/create') }}" class="nav-link-custom">
                <i class="bi bi-plus-circle-fill"></i> Add New Task
            </a>
        </div>

        <!-- Sidebar Footer Profile Mini -->
        <div class="mt-auto pt-4 border-top border-light border-opacity-10">
            <div class="d-flex align-items-center gap-3 px-2">
                <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 38px; height: 38px; font-size: 14px; background: linear-gradient(135deg, #a78bfa 0%, #7c3aed 100%);">
                    J
                </div>
                <div class="overflow-hidden">
                    <h6 class="text-white mb-0 text-truncate" style="font-size: 13px; font-weight: 600;">Josselmarie Prado</h6>
                    <span class="text-truncate d-block" style="font-size: 11px; color: #c4b5fd;">Workspace Owner</span>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="main-content">
        
        <!-- Top Utility Bar -->
        <header class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-light">
            <div>
                <h3 class="fw-bold text-dark mb-1" style="color: #2d1b4e !important;">Task Management Center</h3>
                <p class="text-muted small mb-0">Organize, track, and complete your projects with style.</p>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="bg-white border border-purple-subtle px-3.5 py-2 rounded-pill shadow-sm d-flex align-items-center gap-2 text-secondary fw-semibold small" style="border-color: #e9d5ff !important;">
                    <i class="bi bi-calendar-heart text-purple" style="color: #7c3aed;"></i>
                    <span>{{ date('F d, Y • h:i A') }}</span>
                </div>
            </div>
        </header>

        <!-- Dynamic Content Body -->
        <main>
            @if(session('success'))
                <div class="alert border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-3" role="alert" style="background: #f5f3ff; color: #6d28d9; border-left: 4px solid #8b5cf6 !important;">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div class="fw-medium">{{ session('success') }}</div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>