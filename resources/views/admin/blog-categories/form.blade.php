<x-layouts.admin :title="isset($category->id) ? 'Edit Category' : 'New Category'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($category->id) ? 'Edit Category' : 'New Category' }}</h1>
        <a href="{{ route('admin.blog-categories.index') }}" class="text-sm text-slate-400 hover:text-white">← Back to Categories</a>
    </div>
    <div class="card-panel p-6 max-w-2xl">
        <form method="POST"
              action="{{ isset($category->id) ? route('admin.blog-categories.update', $category) : route('admin.blog-categories.store') }}"
              class="space-y-5">
            @csrf
            @if(isset($category->id)) @method('PUT') @endif
            <div class="grid gap-5 md:grid-cols-3">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">🇬🇧 Name (English) <span class="text-rose-400">*</span></label>
                    <input type="text" name="name_en" value="{{ old('name_en', $category->name_en ?? '') }}" required
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    @error('name_en')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">🇩🇪 Name (Deutsch)</label>
                    <input type="text" name="name_de" value="{{ old('name_de', $category->name_de ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    @error('name_de')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">🇸🇦 Name (العربية)</label>
                    <input type="text" name="name_ar" value="{{ old('name_ar', $category->name_ar ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">
                    @error('name_ar')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}"
                    placeholder="auto-generated from name if empty"
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">
                @error('slug')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Description</label>
                <textarea name="description" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description', $category->description ?? '') }}</textarea>
                @error('description')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
            </div>
            <div class="pt-2 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($category->id) ? 'Update Category' : 'Create Category' }}</button>
                <a href="{{ route('admin.blog-categories.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
