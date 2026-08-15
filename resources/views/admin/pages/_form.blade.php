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
        <input type="text" name="title_ar" value="{{ old('title_ar', $page->title_ar ?? '') }}" dir="rtl"
               class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Slug *</label>
        <input type="text" name="slug" value="{{ old('slug', $page->slug ?? '') }}"
               class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white font-mono" required>
    </div>

    {{-- Featured Image --}}
    <div class="md:col-span-2 mt-2">
        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Featured Image</p>
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-slate-400 mb-1">Featured Image URL</label>
        <input type="url" name="featured_image" value="{{ old('featured_image', $page->featured_image ?? '') }}"
               placeholder="https://example.com/image.jpg"
               class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
        @if(!empty($page->featured_image))
        <div class="mt-2">
            <img src="{{ $page->featured_image }}" alt="Featured"
                 style="height:80px; border-radius:8px; object-fit:cover;">
        </div>
        @endif
        <p class="text-xs text-slate-500 mt-1">Paste image URL (Cloudinary, ImgBB, Unsplash etc.)</p>
    </div>

    {{-- Published --}}
    <div class="md:col-span-2 flex items-center gap-4 mt-2">
        <label class="flex items-center gap-2 text-sm text-slate-300">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $page->is_published ?? false) ? 'checked' : '' }}>
            Published
        </label>
        <label class="flex items-center gap-2 text-sm text-slate-300">
            <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $page->is_visible ?? true) ? 'checked' : '' }}>
            Visible
        </label>
        <label class="flex items-center gap-2 text-sm text-slate-300">
            <input type="checkbox" name="is_landing_page" value="1" {{ old('is_landing_page', $page->is_landing_page ?? false) ? 'checked' : '' }}>
            Landing page <span class="text-xs text-slate-500">(standalone page, not shown in site navigation)</span>
        </label>
    </div>

    {{-- Excerpt --}}
    <div class="md:col-span-2 mt-2">
        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Excerpt / Description</p>
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-slate-400 mb-1">Excerpt (EN)</label>
        <textarea name="excerpt" rows="3"
            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('excerpt', $page->excerpt ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Excerpt (DE)</label>
        <textarea name="excerpt_de" rows="3"
            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('excerpt_de', $page->excerpt_de ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Excerpt (AR)</label>
        <textarea name="excerpt_ar" rows="3" dir="rtl"
            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('excerpt_ar', $page->excerpt_ar ?? '') }}</textarea>
    </div>

    {{-- Full Content --}}
    <div class="md:col-span-2 mt-2">
        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Full Content</p>
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-slate-400 mb-1">Content (EN)</label>
        <textarea name="content_en" rows="8"
            placeholder="Full page content in English..."
            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('content_en', $page->content_en ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Content (DE)</label>
        <textarea name="content_de" rows="8"
            placeholder="Vollständiger Seiteninhalt auf Deutsch..."
            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('content_de', $page->content_de ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">Content (AR)</label>
        <textarea name="content_ar" rows="8" dir="rtl"
            placeholder="المحتوى الكامل للصفحة بالعربية..."
            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('content_ar', $page->content_ar ?? '') }}</textarea>
    </div>

    {{-- SEO --}}
    <div class="md:col-span-2 mt-2">
        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">SEO Settings</p>
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">SEO Title</label>
        <input type="text" name="seo_title"
               value="{{ old('seo_title', isset($page->seo_meta['title']) ? $page->seo_meta['title'] : '') }}"
               placeholder="Leave blank to use page title"
               class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
    </div>
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-1">SEO Description</label>
        <input type="text" name="seo_description"
               value="{{ old('seo_description', isset($page->seo_meta['description']) ? $page->seo_meta['description'] : '') }}"
               placeholder="Leave blank to use excerpt"
               class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
    </div>

</div>
