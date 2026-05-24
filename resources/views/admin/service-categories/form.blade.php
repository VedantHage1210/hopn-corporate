<x-layouts.admin :title="isset($item->id) ? 'Edit Category' : 'New Category'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Category' : 'New Category' }}</h1>
        <a href="{{ route('admin.service-categories.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6 max-w-xl">
        <form method="POST"
              action="{{ isset($item->id) ? route('admin.service-categories.update', $item) : route('admin.service-categories.store') }}"
              class="space-y-4">
            @csrf
            @if(isset($item->id)) @method('PUT') @endif
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">🇬🇧 Name (English) *</label>
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">🇩🇪 Name (Deutsch)</label>
                    <input type="text" name="name_de" value="{{ old('name_de', $item->name_de ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
                    placeholder="auto-generated"
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Description</label>
                <textarea name="description" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description', $item->description ?? '') }}</textarea>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" @checked(old('is_active', $item->is_active ?? true))>
                <label for="is_active" class="text-sm text-slate-300">Active</label>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Category' : 'Create Category' }}</button>
                <a href="{{ route('admin.service-categories.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
