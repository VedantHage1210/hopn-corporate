<x-layouts.admin title="SEO Manager">
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-white">SEO Manager</h1>
        <p class="mt-1 text-sm text-slate-400">Manage default SEO settings, robots.txt, sitemap, and URL redirects.</p>
    </div>

    @if(session('status'))
        <div class="mb-6 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid gap-6 lg:grid-cols-2">

        {{-- Default SEO Settings --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Default SEO Settings</h2>
            <form method="POST" action="{{ route('admin.seo.settings.update') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="mb-1 block text-xs font-medium text-slate-300">Default Meta Title</label>
                    <input type="text" name="seo_default_title" value="{{ old('seo_default_title', $seoSettings['seo_default_title']) }}" maxlength="70"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    <p class="mt-1 text-xs text-slate-500">Recommended: under 60 characters</p>
                </div>
                <div>
                    <label class="mb-1 block text-xs font-medium text-slate-300">Default Meta Description</label>
                    <textarea name="seo_default_description" rows="3" maxlength="160"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('seo_default_description', $seoSettings['seo_default_description']) }}</textarea>
                    <p class="mt-1 text-xs text-slate-500">Recommended: 120–160 characters</p>
                </div>
                <div>
                    <label class="mb-1 block text-xs font-medium text-slate-300">robots.txt Content</label>
                    <textarea name="robots_txt" rows="6" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">{{ old('robots_txt', $seoSettings['robots_txt']) }}</textarea>
                </div>
                <button type="submit" class="btn-primary text-sm">Save SEO Settings</button>
            </form>
        </div>

        {{-- Sitemap --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Sitemap</h2>
            <p class="mb-4 text-sm text-slate-400">Generate or refresh your sitemap.xml file. It will be written to <code class="text-indigo-300">/public/sitemap.xml</code>.</p>
            <div class="mb-4 rounded bg-slate-900 px-4 py-3 text-sm">
                <span class="text-slate-400">URL:</span>
                <a href="{{ url('/sitemap.xml') }}" target="_blank" class="ml-2 text-indigo-300 hover:text-indigo-200">{{ url('/sitemap.xml') }}</a>
            </div>
            <form method="POST" action="{{ route('admin.seo.sitemap.generate') }}">
                @csrf
                <button type="submit" class="btn-primary text-sm">Generate Sitemap Now</button>
            </form>
        </div>
    </div>

    {{-- Redirect Manager --}}
    <div class="mt-6 card-panel p-6">
        <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">URL Redirects</h2>

        <form method="POST" action="{{ route('admin.seo.redirects.store') }}" class="mb-6 flex flex-wrap items-end gap-3">
            @csrf
            <div>
                <label class="mb-1 block text-xs text-slate-400">From URL</label>
                <input type="text" name="from_url" placeholder="/old-page" required
                    class="rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white w-56">
            </div>
            <div>
                <label class="mb-1 block text-xs text-slate-400">To URL</label>
                <input type="text" name="to_url" placeholder="/new-page" required
                    class="rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white w-56">
            </div>
            <div>
                <label class="mb-1 block text-xs text-slate-400">Status Code</label>
                <select name="status_code" class="rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    <option value="301">301 — Permanent</option>
                    <option value="302">302 — Temporary</option>
                </select>
            </div>
            <button type="submit" class="btn-primary text-sm h-[38px]">Add Redirect</button>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-slate-300">
                <thead class="text-left text-xs uppercase text-slate-400">
                    <tr>
                        <th class="px-3 py-2">From</th>
                        <th class="px-3 py-2">To</th>
                        <th class="px-3 py-2">Code</th>
                        <th class="px-3 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($redirects as $redirect)
                        <tr class="border-t border-slate-800">
                            <td class="px-3 py-2 font-mono text-xs text-slate-300">{{ $redirect->from_url }}</td>
                            <td class="px-3 py-2 font-mono text-xs text-indigo-300">{{ $redirect->to_url }}</td>
                            <td class="px-3 py-2">
                                <span class="rounded px-2 py-0.5 text-xs {{ $redirect->status_code == 301 ? 'bg-green-900 text-green-200' : 'bg-yellow-900 text-yellow-200' }}">
                                    {{ $redirect->status_code }}
                                </span>
                            </td>
                            <td class="px-3 py-2">
                                <form method="POST" action="{{ route('admin.seo.redirects.destroy', $redirect) }}" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete this redirect?')" class="text-rose-300 hover:text-rose-200 text-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-3 py-6 text-center text-slate-500">No redirects configured.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">{{ $redirects->links() }}</div>
        </div>
    </div>
</x-layouts.admin>
