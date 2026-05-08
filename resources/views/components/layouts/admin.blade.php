<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ($title ?? 'Admin') . ' | HOPn Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        #toggle-sidebar {
            display: block;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            color: #cbd5e1;
            transition: color 0.2s;
        }
        
        #toggle-sidebar:hover {
            color: #ffffff;
        }
        
        #toggle-sidebar svg {
            width: 24px;
            height: 24px;
        }
        
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: none;
        }
        
        .sidebar-open .sidebar-overlay {
            display: block !important;
        }
        
        .sidebar-open aside {
            display: block !important;
            position: fixed !important;
            left: 0 !important;
            top: 0 !important;
            height: 100vh !important;
            z-index: 50 !important;
            width: 256px !important;
            overflow-y: auto !important;
        }
        
        .close-sidebar-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            color: #cbd5e1;
            font-size: 24px;
            display: none;
        }
        
        .sidebar-open .close-sidebar-btn {
            display: block;
        }
        
        .sidebar-open .close-sidebar-btn:hover {
            color: #ffffff;
        }
        
        .sidebar-open .close-sidebar-btn svg {
            width: 24px;
            height: 24px;
        }
        
        .mobile-logo {
            display: none;
        }
        
        .desktop-logo {
            display: block;
        }
        
        @media (min-width: 768px) {
            aside {
                display: block !important;
                position: static !important;
                height: auto !important;
                width: auto !important;
            }
            
            .sidebar-overlay {
                display: none !important;
            }
            
            #toggle-sidebar {
                display: none !important;
            }
            
            .close-sidebar-btn {
                display: none !important;
            }
            
            .desktop-logo {
                display: block;
            }
            
            .mobile-logo {
                display: none;
            }
        }
        
        @media (max-width: 767px) {
            .desktop-logo {
                display: none;
            }
            
            .mobile-logo {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 24px;
            }
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100">
    <div class="flex min-h-screen" id="app-container">
        <!-- Sidebar Overlay -->
        <div class="sidebar-overlay" id="sidebar-overlay"></div>

        <!-- Sidebar -->
        <aside class="hidden w-64 border-r border-slate-800 bg-slate-900/80 p-5 md:block">
            <!-- Mobile Close Button -->
            <div class="mobile-logo">
                <p class="text-lg font-bold">HOPn Admin</p>
                <button class="close-sidebar-btn" id="close-sidebar">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Logo -->
            <p class="text-lg font-bold desktop-logo">HOPn Admin</p>

            <!-- Navigation -->
            <nav class="mt-6 space-y-3 text-sm text-slate-300">
                <a class="block hover:text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">Content</div>
                <a class="block hover:text-white" href="{{ route('admin.services.index') }}">Services</a>
                <a class="block hover:text-white" href="{{ route('admin.programs.index') }}">Programs</a>
                <a class="block hover:text-white" href="{{ route('admin.products.index') }}">Products</a>
                <a class="block hover:text-white" href="{{ route('admin.case-studies.index') }}">Case Studies</a>
                <a class="block hover:text-white" href="{{ route('admin.pages.index') }}">Pages</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">Blog</div>
                <a class="block hover:text-white" href="{{ route('admin.blog-posts.index') }}">Posts</a>
                <a class="block hover:text-white" href="{{ route('admin.blog-categories.index') }}">Categories</a>
                <a class="block hover:text-white" href="{{ route('admin.blog-tags.index') }}">Tags</a>
                <a class="block hover:text-white" href="{{ route('admin.authors.index') }}">Authors</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">People</div>
                <a class="block hover:text-white" href="{{ route('admin.partners.index') }}">Partners</a>
                <a class="block hover:text-white" href="{{ route('admin.testimonials.index') }}">Testimonials</a>
                <a class="block hover:text-white" href="{{ route('admin.team-members.index') }}">Team</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">Careers</div>
                <a class="block hover:text-white" href="{{ route('admin.jobs.index') }}">Jobs</a>
                <a class="block hover:text-white" href="{{ route('admin.applicants.index') }}">Applicants</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">CRM</div>
                <a class="block hover:text-white" href="{{ route('admin.leads.index') }}">Leads</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">System</div>
                <a class="block hover:text-white" href="{{ route('admin.users.index') }}">Users</a>
                <a class="block hover:text-white" href="{{ route('admin.roles.index') }}">Roles</a>
                <a class="block hover:text-white" href="{{ route('admin.settings.index') }}">Settings</a>
                <a class="block hover:text-white" href="{{ route('admin.navigation.index') }}">Navigation</a>
                <a class="block hover:text-white" href="{{ route('admin.media-assets.index') }}">Media</a>
                <a class="block hover:text-white" href="{{ route('admin.seo.index') }}">SEO</a>
                <a class="block hover:text-white" href="{{ route('admin.languages.index') }}">Languages</a>
                <a class="block hover:text-white" href="{{ route('admin.legal.index') }}">Legal</a>
                <a class="block hover:text-white" href="{{ route('admin.audit-logs.index') }}">Audit Logs</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            <header class="border-b border-slate-800 bg-slate-900/70 p-4">
                <div class="container-shell flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <!-- Hamburger Menu -->
                        <button id="toggle-sidebar" class="text-slate-300 hover:text-white">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <p class="font-semibold">{{ $title ?? 'Dashboard' }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="text-sm text-slate-300 hover:text-white">View Site</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-slate-300 hover:text-white transition-colors duration-200">Logout</button>
                        </form>
                    </div>
                </div>
            </header>
            <section class="container-shell py-8">
                {{ $slot }}
            </section>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const appContainer = document.getElementById('app-container');
            const toggleBtn = document.getElementById('toggle-sidebar');
            const closeBtn = document.getElementById('close-sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    appContainer.classList.add('sidebar-open');
                });
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    appContainer.classList.remove('sidebar-open');
                });
            }

            if (overlay) {
                overlay.addEventListener('click', function() {
                    appContainer.classList.remove('sidebar-open');
                });
            }

            // Close sidebar on link click (mobile)
            document.querySelectorAll('aside a').forEach(link => {
                link.addEventListener('click', function() {
                    appContainer.classList.remove('sidebar-open');
                });
            });
        });
    </script>
</body>
</html>
