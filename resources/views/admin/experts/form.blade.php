<x-layouts.admin :title="isset($item->id) ? 'Edit Expert' : 'New Expert'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Expert' : 'New Consulting Expert' }}</h1>
        <a href="{{ route('admin.experts.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>

    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
            @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
        </div>
    @endif

    <form method="POST"
          action="{{ isset($item->id) ? route('admin.experts.update', $item) : route('admin.experts.store') }}">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        {{-- Basic Info --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Basic Info</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Initials (e.g. DR)</label>
                    <input type="text" name="initials" value="{{ old('initials', $item->initials ?? '') }}" maxlength="3"
                        placeholder="Auto-generated if empty"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
               <div>
    <label class="block text-xs font-semibold text-slate-400 mb-1">Photo URL</label>
    <input type="url" name="photo_url" 
           value="{{ old('photo_url', $item->photo_url ?? '') }}"
           placeholder="https://example.com/photo.jpg"
           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
    <p class="text-xs text-slate-500 mt-1">Paste a direct image URL (not file upload)</p>
    @if(!empty($item->photo_url) && !str_starts_with($item->photo_url, 'data:'))
        <img src="{{ $item->photo_url }}" class="mt-2 h-12 w-12 rounded-full object-cover">
    @endif
</div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $item->linkedin_url ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Hourly Rate (e.g. €450/hr)</label>
                    <input type="text" name="hourly_rate" value="{{ old('hourly_rate', $item->hourly_rate ?? '') }}"
                        placeholder="€450/hr"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Accent Color</label>
                    <div class="flex gap-2 items-center">
                        <input type="color" name="accent_color" value="{{ old('accent_color', $item->accent_color ?? '#4F6EF7') }}"
                            class="h-9 w-16 rounded cursor-pointer bg-slate-800 border border-slate-700">
                        <span class="text-xs text-slate-500">Used for card highlight and tags</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Specialization --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Specialization</h2>
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">🇬🇧 Specialization (EN)</label>
                    <input type="text" name="specialization_en" value="{{ old('specialization_en', $item->specialization_en ?? '') }}"
                        placeholder="AI Strategy & Governance"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">🇩🇪 Specialization (DE)</label>
                    <input type="text" name="specialization_de" value="{{ old('specialization_de', $item->specialization_de ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">🇸🇦 Specialization (AR)</label>
                    <input type="text" name="specialization_ar" value="{{ old('specialization_ar', $item->specialization_ar ?? '') }}" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        {{-- Tags --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Tags / Skills</h2>
            <div>
                <label class="block text-xs font-semibold text-slate-400 mb-1">Tags (comma separated)</label>
                <input type="text" name="tags_raw"
                    value="{{ old('tags_raw', isset($item->tags) ? implode(', ', $item->tags) : '') }}"
                    placeholder="AI Governance, MLOps, EU AI Act"
                    class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                <p class="text-xs text-slate-500 mt-1">Separate with commas. These show as badge pills on the card.</p>
            </div>
        </div>

        {{-- Bio --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Bio</h2>
            <div class="grid gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">🇬🇧 Bio (EN)</label>
                    <textarea name="bio_en" rows="3"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('bio_en', $item->bio_en ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">🇩🇪 Bio (DE)</label>
                    <textarea name="bio_de" rows="3"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('bio_de', $item->bio_de ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">🇸🇦 Bio (AR)</label>
                    <textarea name="bio_ar" rows="3" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('bio_ar', $item->bio_ar ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Settings --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Settings</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-2 mt-6">
                    <input type="checkbox" name="is_visible" id="is_visible" value="1"
                        {{ old('is_visible', $item->is_visible ?? true) ? 'checked' : '' }}>
                    <label for="is_visible" class="text-sm text-slate-300">Visible on website</label>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Expert' : 'Save Expert' }}</button>
            <a href="{{ route('admin.experts.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
