<x-layouts.admin :title="isset($item->id) ? 'Edit App' : 'New App'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit App' : 'New App' }}</h1>
        <a href="{{ route('admin.platform-apps.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-200">
            <ul class="list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="POST" action="{{ isset($item->id) ? route('admin.platform-apps.update', $item) : route('admin.platform-apps.store') }}" class="card-panel p-6 space-y-4">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif
        <div class="grid gap-4 md:grid-cols-3">
            <div><label class="mb-1 block text-sm text-slate-200">Name (EN) *</label><input type="text" name="name_en" value="{{ old('name_en', $item->name_en ?? '') }}" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Name (DE)</label><input type="text" name="name_de" value="{{ old('name_de', $item->name_de ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Name (AR)</label><input type="text" name="name_ar" value="{{ old('name_ar', $item->name_ar ?? '') }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Slug</label><input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Logo URL</label><input type="text" name="logo_url" value="{{ old('logo_url', $item->logo_url ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">External URL (optional)</label><input type="text" name="external_url" value="{{ old('external_url', $item->external_url ?? '') }}" placeholder="leave empty to use internal app page" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Tagline (EN)</label><input type="text" name="tagline_en" value="{{ old('tagline_en', $item->tagline_en ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Tagline (DE)</label><input type="text" name="tagline_de" value="{{ old('tagline_de', $item->tagline_de ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Tagline (AR)</label><input type="text" name="tagline_ar" value="{{ old('tagline_ar', $item->tagline_ar ?? '') }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Description (EN)</label><textarea name="description_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_en', $item->description_en ?? '') }}</textarea></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Description (DE)</label><textarea name="description_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_de', $item->description_de ?? '') }}</textarea></div>
            <div class="md:col-span-3"><label class="mb-1 block text-sm text-slate-200">Description (AR)</label><textarea name="description_ar" rows="3" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_ar', $item->description_ar ?? '') }}</textarea></div>
            <div><label class="mb-1 block text-sm text-slate-200">CTA label (EN)</label><input type="text" name="cta_label_en" value="{{ old('cta_label_en', $item->cta_label_en ?? 'Open app') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">CTA label (DE)</label><input type="text" name="cta_label_de" value="{{ old('cta_label_de', $item->cta_label_de ?? '') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">CTA label (AR)</label><input type="text" name="cta_label_ar" value="{{ old('cta_label_ar', $item->cta_label_ar ?? '') }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Sort order</label><input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div class="flex items-end"><label class="inline-flex items-center gap-2 text-sm text-slate-200"><input type="checkbox" name="is_visible" value="1" @checked(old('is_visible', $item->is_visible ?? true))>Visible</label></div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.platform-apps.index') }}" class="rounded-md border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:bg-slate-800">Cancel</a>
            <button type="submit" class="btn-primary text-sm">{{ isset($item->id) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</x-layouts.admin>
