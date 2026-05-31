<x-layouts.admin :title="isset($item->id) ? 'Edit Navigation Item' : 'New Navigation Item'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Navigation Item' : 'New Navigation Item' }}</h1>
        <a href="{{ route('admin.navigation.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
            @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
        </div>
    @endif
    <div class="card-panel p-6 max-w-2xl">
        <form method="POST"
              action="{{ isset($item->id) ? route('admin.navigation.update', $item) : route('admin.navigation.store') }}">
            @csrf
            @if(isset($item->id)) @method('PUT') @endif

            <div class="grid gap-4 md:grid-cols-2">
                {{-- Location --}}
                <div class="md:col-span-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Menu Settings</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Menu Location *</label>
                    <select name="menu_location" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        <option value="header" {{ old('menu_location', $item->menu_location ?? '') === 'header' ? 'selected' : '' }}>Header</option>
                        <option value="footer" {{ old('menu_location', $item->menu_location ?? '') === 'footer' ? 'selected' : '' }}>Footer</option>
                        <option value="footer_secondary" {{ old('menu_location', $item->menu_location ?? '') === 'footer_secondary' ? 'selected' : '' }}>Footer Secondary</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">URL</label>
                    <input type="text" name="url" value="{{ old('url', $item->url ?? '') }}"
                        placeholder="/en/services"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white font-mono">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                {{-- Labels --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Labels</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Label (EN) *</label>
                    <input type="text" name="label_en" value="{{ old('label_en', $item->label_en ?? '') }}" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Label (DE)</label>
                    <input type="text" name="label_de" value="{{ old('label_de', $item->label_de ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Label (AR)</label>
                    <input type="text" name="label_ar" value="{{ old('label_ar', $item->label_ar ?? '') }}" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                {{-- Visibility --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Visibility</p>
                </div>
                <div class="flex gap-6">
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="visible_en" value="1"
                            {{ old('visible_en', $item->visible_en ?? true) ? 'checked' : '' }}>
                        Visible (EN)
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="visible_de" value="1"
                            {{ old('visible_de', $item->visible_de ?? true) ? 'checked' : '' }}>
                        Visible (DE)
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="visible_ar" value="1"
                            {{ old('visible_ar', $item->visible_ar ?? true) ? 'checked' : '' }}>
                        Visible (AR)
                    </label>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Item' : 'Save Item' }}</button>
                <a href="{{ route('admin.navigation.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
