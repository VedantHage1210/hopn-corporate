<x-layouts.admin :title="isset($item->id) ? 'Edit Package' : 'New Package'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Package' : 'New Package' }}</h1>
        <a href="{{ route('admin.consulting-packages.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-200">
            <ul class="list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="POST" action="{{ isset($item->id) ? route('admin.consulting-packages.update', $item) : route('admin.consulting-packages.store') }}" class="card-panel p-6 space-y-4">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif
        <div class="grid gap-4 md:grid-cols-3">
            <div><label class="mb-1 block text-sm text-slate-200">Name (EN) *</label><input type="text" name="name_en" value="{{ old('name_en', $item->name_en ?? '') }}" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Name (DE)</label><input type="text" name="name_de" value="{{ old('name_de', $item->name_de ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Name (AR)</label><input type="text" name="name_ar" value="{{ old('name_ar', $item->name_ar ?? '') }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Slug</label><input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div>
                <label class="mb-1 block text-sm text-slate-200">Category</label>
                <select name="consulting_category_id" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    <option value="">—</option>
                    @foreach($categories as $cat)<option value="{{ $cat->id }}" @selected(old('consulting_category_id', $item->consulting_category_id ?? '')==$cat->id)>{{ $cat->name_en }}</option>@endforeach
                </select>
            </div>
            <div><label class="mb-1 block text-sm text-slate-200">Duration (minutes) *</label><input type="number" name="duration_minutes" value="{{ old('duration_minutes', $item->duration_minutes ?? 60) }}" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Price</label><input type="number" step="0.01" name="price" value="{{ old('price', $item->price ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Currency</label><input type="text" name="currency" value="{{ old('currency', $item->currency ?? 'EUR') }}" maxlength="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="flex items-end"><label class="inline-flex items-center gap-2 text-sm text-slate-200"><input type="checkbox" name="price_on_request" value="1" @checked(old('price_on_request', $item->price_on_request ?? false))>Price on request</label></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Description (EN)</label><textarea name="description_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_en', $item->description_en ?? '') }}</textarea></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Description (DE)</label><textarea name="description_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_de', $item->description_de ?? '') }}</textarea></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Description (AR)</label><textarea name="description_ar" rows="3" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_ar', $item->description_ar ?? '') }}</textarea></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Inclusions (EN) — one per line</label><textarea name="inclusions_en_text" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('inclusions_en_text', isset($item->inclusions_en) ? implode("\n", $item->inclusions_en ?? []) : '') }}</textarea></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Inclusions (DE) — one per line</label><textarea name="inclusions_de_text" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('inclusions_de_text', isset($item->inclusions_de) ? implode("\n", $item->inclusions_de ?? []) : '') }}</textarea></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Inclusions (AR) — one per line</label><textarea name="inclusions_ar_text" rows="3" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('inclusions_ar_text', isset($item->inclusions_ar) ? implode("\n", $item->inclusions_ar ?? []) : '') }}</textarea></div>
            <div class="flex items-end gap-4">
                <label class="inline-flex items-center gap-2 text-sm text-slate-200"><input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $item->is_featured ?? false))>Featured</label>
                <label class="inline-flex items-center gap-2 text-sm text-slate-200"><input type="checkbox" name="is_visible" value="1" @checked(old('is_visible', $item->is_visible ?? true))>Visible</label>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.consulting-packages.index') }}" class="rounded-md border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:bg-slate-800">Cancel</a>
            <button type="submit" class="btn-primary text-sm">{{ isset($item->id) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</x-layouts.admin>
