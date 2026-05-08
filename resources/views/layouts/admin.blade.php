<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ($title ?? 'Admin') . ' | HOPn Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar-open aside {
            display: block !important;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            z-index: 50;
            overflow-y-auto;
        }
        .sidebar-open .sidebar-overlay {
            display: block !important;
        }
        @media (min-width: 768px) {
            .sidebar-open aside, aside {
                position: static !important;
                height: auto !important;
            }
            .sidebar-overlay {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100">
    <div class="flex min-h-screen" id="app-container">
        <div class="sidebar-overlay fixed inset-0 bg-black/50 z-40 hidden md:hidden" id="sidebar-overlay"></div>
        <aside class="hidden w-64 border-r border-slate-800 bg-slate-900/80 p-5 md:block">
            <div class="flex items-center justify-between mb-6 md:hidden">
                <p class="text-lg font-bold">HOPn Admin</p>
                <button id="close-sidebar" class="text-slate-300 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <p class="text-lg font-bold hidden md:block">HOPn Admin</p>
            <nav class="mt-6 space-y-3 text-sm text-slate-300">
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">Content</div>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.services.index') }}">Services</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.programs.index') }}">Programs</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.products.index') }}">Products</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.case-studies.index') }}">Case Studies</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.pages.index') }}">Pages</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">Blog</div>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.blog-posts.index') }}">Posts</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.blog-categories.index') }}">Categories</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.blog-tags.index') }}">Tags</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.authors.index') }}">Authors</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">People</div>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.partners.index') }}">Partners</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.testimonials.index') }}">Testimonials</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.team-members.index') }}">Team</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">Careers</div>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.jobs.index') }}">Jobs</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.applicants.index') }}">Applicants</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">CRM</div>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.leads.index') }}">Leads</a>
                <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">System</div>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.users.index') }}">Users</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.roles.index') }}">Roles</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.settings.index') }}">Settings</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.navigation.index') }}">Navigation</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.media-assets.index') }}">Media</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.seo.index') }}">SEO</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.languages.index') }}">Languages</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.legal.index') }}">Legal</a>
                <a class="block hover:text-white transition-colors duration-200" href="{{ route('admin.audit-logs.index') }}">Audit Logs</a>
            </nav>
        </aside>
        <div class="flex-1 flex flex-col w-full">
            <header class="border-b border-slate-800 bg-slate-900/70 p-4">
                <div class="container-shell flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button id="toggle-sidebar" class="md:hidden text-slate-300 hover:text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <p class="font-semibold">{{ $title ?? 'Dashboard' }}</p>
                    </div>
                    <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="text-sm text-slate-300 hover:text-white">View Site</a>
                </div>
            </header>
            <section class="container-shell py-8 flex-1">
                {{ $slot }}
            </section>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const appContainer = document.getElementById('app-container');
            const toggleBtn = document.getElementById('toggle-sidebar');
            const closeBtn = document.getElementById('close-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            toggleBtn?.addEventListener('click', function() {
                appContainer.classList.add('sidebar-open');
            });
            closeBtn?.addEventListener('click', function() {
                appContainer.classList.remove('sidebar-open');
            });
            overlay?.addEventListener('click', function() {
                appContainer.classList.remove('sidebar-open');
            });
            if (window.innerWidth < 768) {
                document.querySelectorAll('aside a').forEach(link => {
                    link.addEventListener('click', function() {
                        appContainer.classList.remove('sidebar-open');
                    });
                });
            }
        });
    </script>
</body>
</html>
