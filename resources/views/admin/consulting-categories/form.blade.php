<x-layouts.admin :title="isset($item->id) ? 'Edit Category' : 'New Category'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Category' : 'New Category' }}</h1>
        <a href="{{ route('admin.consulting-categories.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-200">
            <ul class="list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="POST" action="{{ isset($item->id) ? route('admin.consulting-categories.update', $item) : route('admin.consulting-categories.store') }}" class="card-panel p-6 space-y-4">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif
        <div class="grid gap-4 md:grid-cols-3">
            <div><label class="mb-1 block text-sm text-slate-200">Name (EN) *</label><input type="text" name="name_en" value="{{ old('name_en', $item->name_en ?? '') }}" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Name (DE)</label><input type="text" name="name_de" value="{{ old('name_de', $item->name_de ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Name (AR)</label><input type="text" name="name_ar" value="{{ old('name_ar', $item->name_ar ?? '') }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Slug</label><input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Icon (optional)</label><input type="text" name="icon" value="{{ old('icon', $item->icon ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Accent color</label><input type="text" name="accent_color" value="{{ old('accent_color', $item->accent_color ?? '#10B981') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Description (EN)</label><input type="text" name="description_en" value="{{ old('description_en', $item->description_en ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Description (DE)</label><input type="text" name="description_de" value="{{ old('description_de', $item->description_de ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Description (AR)</label><input type="text" name="description_ar" value="{{ old('description_ar', $item->description_ar ?? '') }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Sort order</label><input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="flex items-end"><label class="inline-flex items-center gap-2 text-sm text-slate-200"><input type="checkbox" name="is_visible" value="1" @checked(old('is_visible', $item->is_visible ?? true))>Visible</label></div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.consulting-categories.index') }}" class="rounded-md border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:bg-slate-800">Cancel</a>
            <button type="submit" class="btn-primary text-sm">{{ isset($item->id) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</x-layouts.admin>
