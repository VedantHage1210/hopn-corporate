<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ($title ?? 'Admin') . ' | HOPn Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100">
    <div class="flex min-h-screen">
        <aside class="hidden w-64 border-r border-slate-800 bg-slate-900/80 p-5 md:block">
            <p class="text-lg font-bold">HOPn Admin</p>
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
        <div class="flex-1">
            <header class="border-b border-slate-800 bg-slate-900/70 p-4">
                <div class="container-shell flex items-center justify-between">
                    <p class="font-semibold">{{ $title ?? 'Dashboard' }}</p>
                    <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="text-sm text-slate-300 hover:text-white">View Site</a>
                </div>
            </header>
            <section class="container-shell py-8">
                {{ $slot }}
            </section>
        </div>
    </div>
</body>
</html>
