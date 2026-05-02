<x-layouts.admin title="Site Settings">
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-white">Site Settings</h1>
        <p class="mt-1 text-sm text-slate-400">Global configuration for the HOPn website.</p>
    </div>

    @if(session('status'))
        <div class="mb-6 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Company Info --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Company Information</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Company Name (EN)</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'HOPn') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Company Name (DE)</label>
                    <input type="text" name="site_name_de" value="{{ old('site_name_de', $settings['site_name_de'] ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Tagline (EN)</label>
                    <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Tagline (DE)</label>
                    <input type="text" name="site_tagline_de" value="{{ old('site_tagline_de', $settings['site_tagline_de'] ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Contact Phone</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-200">Office Address (EN)</label>
                    <input type="text" name="office_address" value="{{ old('office_address', $settings['office_address'] ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        {{-- Social Links --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Social Media Links</h2>
            @php $social = is_string($settings['social_links'] ?? '') ? json_decode($settings['social_links'] ?? '{}', true) : ($settings['social_links'] ?? []); @endphp
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">LinkedIn</label>
                    <input type="url" name="social_links[linkedin]" value="{{ old('social_links.linkedin', $social['linkedin'] ?? '') }}"
                        placeholder="https://linkedin.com/company/hopn"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Twitter / X</label>
                    <input type="url" name="social_links[twitter]" value="{{ old('social_links.twitter', $social['twitter'] ?? '') }}"
                        placeholder="https://twitter.com/hopn"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">YouTube</label>
                    <input type="url" name="social_links[youtube]" value="{{ old('social_links.youtube', $social['youtube'] ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">GitHub</label>
                    <input type="url" name="social_links[github]" value="{{ old('social_links.github', $social['github'] ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        {{-- SEO Defaults --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Default SEO</h2>
            @php $seo = is_string($settings['seo_defaults'] ?? '') ? json_decode($settings['seo_defaults'] ?? '{}', true) : ($settings['seo_defaults'] ?? []); @endphp
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Default Meta Title</label>
                    <input type="text" name="seo_defaults[title]" value="{{ old('seo_defaults.title', $seo['title'] ?? 'HOPn — Digital Transformation & Innovation') }}" maxlength="70"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Default Meta Description</label>
                    <input type="text" name="seo_defaults[description]" value="{{ old('seo_defaults.description', $seo['description'] ?? '') }}" maxlength="160"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">Save Settings</button>
        </div>
    </form>
</x-layouts.admin>
