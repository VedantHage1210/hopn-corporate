<x-layouts.admin :title="isset($item->id) ? 'Edit Workshop' : 'New Workshop'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Workshop' : 'New Workshop' }}</h1>
        <a href="{{ route('admin.workshops.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>

    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-200">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ isset($item->id) ? route('admin.workshops.update', $item) : route('admin.workshops.store') }}"
          class="space-y-6">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        {{-- Title & Tagline --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Title &amp; Tagline</h2>
            <div class="grid gap-6 md:grid-cols-3">
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">en English</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (EN) *</label>
                        <input type="text" name="title_en" value="{{ old('title_en', $item->title_en ?? '') }}" required
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Tagline (EN)</label>
                        <input type="text" name="tagline_en" value="{{ old('tagline_en', $item->tagline_en ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (EN)</label>
                        <textarea name="summary_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_en', $item->summary_en ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Learning outcomes (EN) — one per line</label>
                        <textarea name="outcomes_en_text" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('outcomes_en_text', isset($item->outcomes_en) ? implode("\n", $item->outcomes_en ?? []) : '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-yellow-400">de Deutsch</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (DE)</label>
                        <input type="text" name="title_de" value="{{ old('title_de', $item->title_de ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Tagline (DE)</label>
                        <input type="text" name="tagline_de" value="{{ old('tagline_de', $item->tagline_de ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (DE)</label>
                        <textarea name="summary_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_de', $item->summary_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Learning outcomes (DE) — one per line</label>
                        <textarea name="outcomes_de_text" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('outcomes_de_text', isset($item->outcomes_de) ? implode("\n", $item->outcomes_de ?? []) : '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-green-400">ar العربية</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (AR)</label>
                        <input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Tagline (AR)</label>
                        <input type="text" name="tagline_ar" value="{{ old('tagline_ar', $item->tagline_ar ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (AR)</label>
                        <textarea name="summary_ar" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('summary_ar', $item->summary_ar ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Learning outcomes (AR) — one per line</label>
                        <textarea name="outcomes_ar_text" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('outcomes_ar_text', isset($item->outcomes_ar) ? implode("\n", $item->outcomes_ar ?? []) : '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Logistics --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Format, Category &amp; Pricing</h2>
            <div class="grid gap-6 md:grid-cols-4">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}" placeholder="auto from title"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Format *</label>
                    <select name="format" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                        @foreach(['on_site' => 'On-site', 'remote' => 'Remote', 'hybrid' => 'Hybrid', 'bootcamp' => 'Bootcamp', 'executive' => 'Executive'] as $val => $label)
                            <option value="{{ $val }}" @selected(old('format', $item->format ?? 'on_site') === $val)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Category</label>
                    <input type="text" name="category" value="{{ old('category', $item->category ?? '') }}" placeholder="AI Training, Data Analytics..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Duration label</label>
                    <input type="text" name="duration_label_en" value="{{ old('duration_label_en', $item->duration_label_en ?? '') }}" placeholder="2 days, Half-day..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Duration (hours)</label>
                    <input type="number" name="duration_hours" value="{{ old('duration_hours', $item->duration_hours ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $item->price ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Currency</label>
                    <input type="text" name="currency" value="{{ old('currency', $item->currency ?? 'EUR') }}" maxlength="3"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-end gap-2">
                    <label class="inline-flex items-center gap-2 text-sm text-slate-200">
                        <input type="checkbox" name="price_on_request" value="1" @checked(old('price_on_request', $item->price_on_request ?? false))>
                        Price on request
                    </label>
                </div>
            </div>
        </div>

        {{-- Instructor & Hero --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Instructor &amp; Media</h2>
            <div class="grid gap-6 md:grid-cols-3">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Instructor name</label>
                    <input type="text" name="instructor_name" value="{{ old('instructor_name', $item->instructor_name ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-200">Instructor bio</label>
                    <input type="text" name="instructor_bio" value="{{ old('instructor_bio', $item->instructor_bio ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-3">
                    <label class="mb-1 block text-sm font-medium text-slate-200">Hero image URL</label>
                    <input type="text" name="hero_image_url" value="{{ old('hero_image_url', $item->hero_image_url ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        {{-- SEO & Publish --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">SEO &amp; Publishing</h2>
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">SEO title</label>
                    <input type="text" name="seo_title" value="{{ old('seo_title', $item->seo_title ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">SEO description</label>
                    <input type="text" name="seo_description" value="{{ old('seo_description', $item->seo_description ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="inline-flex items-center gap-2 text-sm text-slate-200">
                        <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published ?? false))>
                        Published
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.workshops.index') }}" class="rounded-md border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:bg-slate-800">Cancel</a>
            <button type="submit" class="btn-primary text-sm">{{ isset($item->id) ? 'Update Workshop' : 'Create Workshop' }}</button>
        </div>
    </form>
</x-layouts.admin>
