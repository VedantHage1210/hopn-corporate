<x-layouts.admin :title="isset($item->id) ? 'Edit Service' : 'New Service'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Service' : 'New Service' }}</h1>
        <a href="{{ route('admin.services.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>

    <form method="POST"
          action="{{ isset($item->id) ? route('admin.services.update', $item) : route('admin.services.store') }}"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        {{-- EN / DE Tabs --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Content</h2>
            <div class="grid gap-6 md:grid-cols-2">
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">🇬🇧 English</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (EN) *</label>
                        <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                        @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (EN)</label>
                        <textarea name="summary" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary', $item->summary ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Body (EN)</label>
                        <textarea name="body" rows="6" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white tinymce">{{ old('body', $item->body ?? '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-yellow-400">🇩🇪 Deutsch</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (DE)</label>
                        <input type="text" name="name_de" value="{{ old('name_de', $item->name_de ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (DE)</label>
                        <textarea name="summary_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_de', $item->summary_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Body (DE)</label>
                        <textarea name="body_de" rows="6" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('body_de', $item->body_de ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Settings --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Settings</h2>
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
                        placeholder="auto-generated"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Category</label>
                    <select name="service_category_id" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                        <option value="">— None —</option>
                        @foreach(\App\Models\ServiceCategory::all() as $cat)
                            <option value="{{ $cat->id }}" @selected(old('service_category_id', $item->service_category_id ?? '') == $cat->id)>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Hero Image</label>
                    <input type="file" name="hero_image" accept="image/*"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    @if(!empty($item->hero_image))
                        <img src="{{ Storage::url($item->hero_image) }}" class="mt-2 h-16 rounded object-cover">
                    @endif
                </div>
            </div>
            <div class="mt-4 flex gap-6">
                <label class="flex items-center gap-2 text-sm text-slate-300">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published ?? false))>
                    Published
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-300">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $item->is_active ?? true))>
                    Active
                </label>
            </div>
        </div>

        {{-- SEO --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">SEO</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $item->meta_title ?? '') }}" maxlength="70"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Meta Description</label>
                    <input type="text" name="meta_description" value="{{ old('meta_description', $item->meta_description ?? '') }}" maxlength="160"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Service' : 'Create Service' }}</button>
            <a href="{{ route('admin.services.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
