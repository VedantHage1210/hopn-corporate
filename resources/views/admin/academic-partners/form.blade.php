<x-layouts.admin title="{{ isset($item->id) ? 'Edit Academic Partner' : 'New Academic Partner' }}">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Academic Partner' : 'New Academic Partner' }}</h1>
        <a href="{{ route('admin.academic-partners.index') }}" class="text-sm text-indigo-300 hover:text-indigo-200">← Back</a>
    </div>

    <form action="{{ isset($item->id) ? route('admin.academic-partners.update', $item) : route('admin.academic-partners.store') }}" method="POST">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        <div class="card-panel p-6">
            <div class="grid gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-200">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Logo URL</label>
                    <input type="url" name="logo_url" value="{{ old('logo_url', $item->logo_url ?? '') }}"
                        placeholder="https://example.com/logo.png"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    <p class="mt-1 text-xs text-slate-500">Paste image URL from Cloudinary, ImgBB, etc.</p>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Website URL</label>
                    <input type="url" name="website_url" value="{{ old('website_url', $item->website_url ?? '') }}"
                        placeholder="https://..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
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
            <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Partner' : 'Create Partner' }}</button>
            <a href="{{ route('admin.academic-partners.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
