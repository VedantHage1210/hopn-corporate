<div class="grid gap-4 md:grid-cols-2">

    {{-- Basic Info --}}
    <div class="md:col-span-2">
        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Basic Info</p>
    </div>

    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Title (EN) *</label>
        <input type="text" name="title" value="{{ old('title', $page->title ?? '') }}"
               class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" required>
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Title (DE)</label>
        <input type="text" name="title_de" value="{{ old('title_de', $page->title_de ?? '') }}"
               class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Title (AR)</label>
        <input type="text" name="title_ar" value="{{ old('title_ar', $page->title_ar ?? '') }}"
               class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Slug *</label>
        <input type="text" name="slug" value="{{ old('slug', $page->slug ?? '') }}"
               class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" required>
    </div>

    {{-- Published --}}
    <div class="md:col-span-2 flex items-center gap-4 mt-2">
        <label class="flex items-center gap-2 text-sm text-slate-300">
            <input type="checkbox" name="is_published" {{ ($page->is_published ?? false) ? 'checked' : '' }}>
            Published
        </label>
        <label class="flex items-center gap-2 text-sm text-slate-300">
            <input type="checkbox" name="is_visible" {{ ($page->is_visible ?? false) ? 'checked' : '' }}>
            Visible
        </label>
    </div>

    {{-- Excerpt --}}
    <div class="md:col-span-2 mt-2">
        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Excerpt / Description</p>
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-slate-400 mb-1">Excerpt (EN)</label>
        <textarea name="excerpt" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('excerpt', $page->excerpt ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Excerpt (DE)</label>
        <textarea name="excerpt_de" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('excerpt_de', $page->excerpt_de ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Excerpt (AR)</label>
        <textarea name="excerpt_ar" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('excerpt_ar', $page->excerpt_ar ?? '') }}</textarea>
    </div>
</div>
