<x-layouts.admin title="{{ isset($item->id) ? 'Edit Publication' : 'New Publication' }}">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Publication' : 'New Publication' }}</h1>
        <a href="{{ route('admin.research-publications.index') }}" class="text-sm text-indigo-300 hover:text-indigo-200">← Back</a>
    </div>

    <form action="{{ isset($item->id) ? route('admin.research-publications.update', $item) : route('admin.research-publications.store') }}" method="POST">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Title</h2>
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Title (EN) *</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $item->title_en ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Title (DE)</label>
                    <input type="text" name="title_de" value="{{ old('title_de', $item->title_de ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Title (AR)</label>
                    <input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar ?? '') }}" dir="rtl"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        <div class="card-panel p-6 mt-4">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Summary</h2>
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Summary (EN)</label>
                    <textarea name="summary_en" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_en', $item->summary_en ?? '') }}</textarea>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Summary (DE)</label>
                    <textarea name="summary_de" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_de', $item->summary_de ?? '') }}</textarea>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Summary (AR)</label>
                    <textarea name="summary_ar" rows="4" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_ar', $item->summary_ar ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="card-panel p-6 mt-4">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Details</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-200">Cover Image URL</label>
                    <input type="url" name="image_url" value="{{ old('image_url', $item->image_url ?? '') }}"
                        placeholder="https://..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    <p class="mt-1 text-xs text-slate-500">Use a real or licensed cover image for the publication card.</p>
                    @if(!empty($item->image_url))
                        <img src="{{ $item->image_url }}" alt="Publication cover" class="mt-3 h-24 w-40 rounded object-cover">
                    @endif
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Project</label>
                    <input type="text" name="project" value="{{ old('project', $item->project ?? '') }}"
                        placeholder="e.g. SWARMind, SAFE-CARE, RefereeX AI"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Authors</label>
                    <input type="text" name="authors" value="{{ old('authors', $item->authors ?? '') }}"
                        placeholder="e.g. A. Ebada, et al."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Published Date</label>
                    <input type="date" name="published_on" value="{{ old('published_on', isset($item->published_on) ? $item->published_on->format('Y-m-d') : '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">PDF URL</label>
                    <input type="url" name="pdf_url" value="{{ old('pdf_url', $item->pdf_url ?? '') }}"
                        placeholder="https://..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">External Link (DOI, journal page, etc.)</label>
                    <input type="url" name="external_url" value="{{ old('external_url', $item->external_url ?? '') }}"
                        placeholder="https://..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <input type="checkbox" name="is_visible" id="is_visible"
                    {{ old('is_visible', $item->is_visible ?? false) ? 'checked' : '' }}>
                <label for="is_visible" class="text-sm text-slate-300">Visible on the Research page</label>
            </div>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Publication' : 'Create Publication' }}</button>
            <a href="{{ route('admin.research-publications.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
