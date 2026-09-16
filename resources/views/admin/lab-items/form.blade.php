<x-layouts.admin :title="isset($item->id) ? 'Edit Lab Item' : 'New Lab Item'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit' : 'New' }} {{ $item->type==='program' ? 'Program' : 'Focus Area' }}</h1>
        <a href="{{ route('admin.lab-items.index', ['type'=>$item->type]) }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-200">
            <ul class="list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="POST" action="{{ isset($item->id) ? route('admin.lab-items.update', $item) : route('admin.lab-items.store') }}" class="space-y-6">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif
        <input type="hidden" name="type" value="{{ $item->type }}">

        <div class="card-panel p-6">
            <div class="grid gap-6 md:grid-cols-3">
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">en English</p>
                    <div><label class="mb-1 block text-sm text-slate-200">Title *</label><input type="text" name="title_en" value="{{ old('title_en', $item->title_en) }}" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                    <div><label class="mb-1 block text-sm text-slate-200">Description</label><textarea name="description_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_en', $item->description_en) }}</textarea></div>
                    <div><label class="mb-1 block text-sm text-slate-200">Tags — one per line</label><textarea name="tags_en_text" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('tags_en_text', implode("\n", $item->tags_en ?? [])) }}</textarea></div>
                    <div><label class="mb-1 block text-sm text-slate-200">CTA label</label><input type="text" name="cta_label_en" value="{{ old('cta_label_en', $item->cta_label_en ?? 'Explore') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-yellow-400">de Deutsch</p>
                    <div><label class="mb-1 block text-sm text-slate-200">Title</label><input type="text" name="title_de" value="{{ old('title_de', $item->title_de) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                    <div><label class="mb-1 block text-sm text-slate-200">Description</label><textarea name="description_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_de', $item->description_de) }}</textarea></div>
                    <div><label class="mb-1 block text-sm text-slate-200">Tags — one per line</label><textarea name="tags_de_text" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('tags_de_text', implode("\n", $item->tags_de ?? [])) }}</textarea></div>
                    <div><label class="mb-1 block text-sm text-slate-200">CTA label</label><input type="text" name="cta_label_de" value="{{ old('cta_label_de', $item->cta_label_de) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-green-400">ar العربية</p>
                    <div><label class="mb-1 block text-sm text-slate-200">Title</label><input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar) }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                    <div><label class="mb-1 block text-sm text-slate-200">Description</label><textarea name="description_ar" rows="3" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_ar', $item->description_ar) }}</textarea></div>
                    <div><label class="mb-1 block text-sm text-slate-200">Tags — one per line</label><textarea name="tags_ar_text" rows="3" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('tags_ar_text', implode("\n", $item->tags_ar ?? [])) }}</textarea></div>
                    <div><label class="mb-1 block text-sm text-slate-200">CTA label</label><input type="text" name="cta_label_ar" value="{{ old('cta_label_ar', $item->cta_label_ar) }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                </div>
            </div>
        </div>

        <div class="card-panel p-6">
            <div class="grid gap-4 md:grid-cols-4">
                <div><label class="mb-1 block text-sm text-slate-200">CTA URL (optional)</label><input type="text" name="cta_url" value="{{ old('cta_url', $item->cta_url) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Accent color</label><input type="text" name="accent_color" value="{{ old('accent_color', $item->accent_color ?? '#8B5CF6') }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Sort order</label><input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div class="flex items-end"><label class="inline-flex items-center gap-2 text-sm text-slate-200"><input type="checkbox" name="is_visible" value="1" @checked(old('is_visible', $item->is_visible ?? true))>Visible</label></div>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.lab-items.index', ['type'=>$item->type]) }}" class="rounded-md border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:bg-slate-800">Cancel</a>
            <button type="submit" class="btn-primary text-sm">{{ isset($item->id) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</x-layouts.admin>
