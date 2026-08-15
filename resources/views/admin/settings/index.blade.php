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
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">Company Information</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Company Name (EN)</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'HOPn') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Company Name (DE)</label>
                    <input type="text" name="site_name_de" value="{{ old('site_name_de', $settings['site_name_de'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Company Name (AR)</label>
                    <input type="text" name="site_name_ar" value="{{ old('site_name_ar', $settings['site_name_ar'] ?? '') }}" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Tagline (EN)</label>
                    <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Tagline (DE)</label>
                    <input type="text" name="site_tagline_de" value="{{ old('site_tagline_de', $settings['site_tagline_de'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Tagline (AR)</label>
                    <input type="text" name="site_tagline_ar" value="{{ old('site_tagline_ar', $settings['site_tagline_ar'] ?? '') }}" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Contact Phone</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Office Address (EN)</label>
                    <input type="text" name="office_address" value="{{ old('office_address', $settings['office_address'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Office Address (DE)</label>
                    <input type="text" name="office_address_de" value="{{ old('office_address_de', $settings['office_address_de'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Office Address (AR)</label>
                    <input type="text" name="office_address_ar" value="{{ old('office_address_ar', $settings['office_address_ar'] ?? '') }}" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        {{-- Social Links --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">Social Media Links</h2>
            @php
                $social = is_array($settings['social_links'] ?? null)
                    ? $settings['social_links']
                    : json_decode($settings['social_links'] ?? '{}', true);
            @endphp
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">LinkedIn</label>
                    <input type="url" name="social_links[linkedin]" value="{{ old('social_links.linkedin', $social['linkedin'] ?? '') }}"
                        placeholder="https://linkedin.com/company/hopn"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Twitter / X</label>
                    <input type="url" name="social_links[twitter]" value="{{ old('social_links.twitter', $social['twitter'] ?? '') }}"
                        placeholder="https://twitter.com/hopn"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">YouTube</label>
                    <input type="url" name="social_links[youtube]" value="{{ old('social_links.youtube', $social['youtube'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">GitHub</label>
                    <input type="url" name="social_links[github]" value="{{ old('social_links.github', $social['github'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Instagram</label>
                    <input type="url" name="social_links[instagram]" value="{{ old('social_links.instagram', $social['instagram'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Facebook</label>
                    <input type="url" name="social_links[facebook]" value="{{ old('social_links.facebook', $social['facebook'] ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        {{-- SEO Defaults --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">Default SEO</h2>
            @php
                $seo = is_array($settings['seo_defaults'] ?? null)
                    ? $settings['seo_defaults']
                    : json_decode($settings['seo_defaults'] ?? '{}', true);
            @endphp
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Default Meta Title (EN)</label>
                    <input type="text" name="seo_defaults[title]" value="{{ old('seo_defaults.title', $seo['title'] ?? 'HOPn — Digital Transformation & Innovation') }}" maxlength="70"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    <p class="text-xs text-slate-500 mt-1">Max 70 characters</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Default Meta Description (EN)</label>
                    <input type="text" name="seo_defaults[description]" value="{{ old('seo_defaults.description', $seo['description'] ?? '') }}" maxlength="160"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    <p class="text-xs text-slate-500 mt-1">Max 160 characters</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Default Meta Title (DE)</label>
                    <input type="text" name="seo_defaults[title_de]" value="{{ old('seo_defaults.title_de', $seo['title_de'] ?? '') }}" maxlength="70"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Default Meta Description (DE)</label>
                    <input type="text" name="seo_defaults[description_de]" value="{{ old('seo_defaults.description_de', $seo['description_de'] ?? '') }}" maxlength="160"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        {{-- System Settings --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">System Settings</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Default Locale</label>
                    <select name="default_locale" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        <option value="en" {{ ($settings['default_locale'] ?? 'en') === 'en' ? 'selected' : '' }}>English (EN)</option>
                        <option value="de" {{ ($settings['default_locale'] ?? '') === 'de' ? 'selected' : '' }}>Deutsch (DE)</option>
                        <option value="ar" {{ ($settings['default_locale'] ?? '') === 'ar' ? 'selected' : '' }}>Arabic (AR)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Timezone</label>
                    <select name="timezone" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        <option value="UTC" {{ ($settings['timezone'] ?? 'UTC') === 'UTC' ? 'selected' : '' }}>UTC</option>
                        <option value="Europe/Berlin" {{ ($settings['timezone'] ?? '') === 'Europe/Berlin' ? 'selected' : '' }}>Europe/Berlin</option>
                        <option value="Europe/London" {{ ($settings['timezone'] ?? '') === 'Europe/London' ? 'selected' : '' }}>Europe/London</option>
                        <option value="Asia/Dubai" {{ ($settings['timezone'] ?? '') === 'Asia/Dubai' ? 'selected' : '' }}>Asia/Dubai</option>
                        <option value="Asia/Riyadh" {{ ($settings['timezone'] ?? '') === 'Asia/Riyadh' ? 'selected' : '' }}>Asia/Riyadh</option>
                    </select>
                </div>
                <div class="flex items-center gap-3 mt-2">
                    <input type="checkbox" name="maintenance_mode" id="maintenance_mode" value="1"
                        {{ ($settings['maintenance_mode'] ?? false) ? 'checked' : '' }}>
                    <label for="maintenance_mode" class="text-sm text-slate-300">
                        Maintenance Mode
                        <span class="text-xs text-slate-500 block">Website will show maintenance page</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">Save Settings</button>
        </div>
    </form>
</x-layouts.admin>
