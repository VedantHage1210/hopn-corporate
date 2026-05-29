<x-layouts.admin title="Edit Partner">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Partner</h1>
        <a href="{{ route('admin.partners.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.partners.update', $item) }}">
            @csrf @method('PUT')
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item->name) }}" required
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Type / Category</label>
                    <select name="type" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        @foreach(['customer' => 'Customer', 'partner' => 'Technology Partner', 'investor' => 'Investor', 'startup' => 'Startup', 'university' => 'University', 'research' => 'Research Partner'] as $val => $label)
                        <option value="{{ $val }}" {{ old('type', $item->type) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Logo URL</label>
                    <input type="url" name="logo_url" value="{{ old('logo_url', $item->logo) }}"
                           placeholder="https://example.com/logo.png"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    @if($item->logo)
                    <div class="mt-2">
                        <img src="{{ $item->logo }}" alt="{{ $item->name }}"
                             style="height:40px; width:auto; object-fit:contain; border-radius:6px;">
                    </div>
                    @endif
                    <p class="text-xs text-slate-500 mt-1">Paste image URL from Cloudinary, ImgBB, etc.</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Website URL</label>
                    <input type="url" name="url" value="{{ old('url', $item->url) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Description</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (EN)</label>
                    <textarea name="description_en" rows="2" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_en', $item->description_en ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (DE)</label>
                    <textarea name="description_de" rows="2" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_de', $item->description_de ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (AR)</label>
                    <textarea name="description_ar" rows="2" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_ar', $item->description_ar ?? '') }}</textarea>
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="visible" id="visible" {{ $item->visible ? 'checked' : '' }}>
                    <label for="visible" class="text-sm text-slate-300">Visible on website</label>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Update Partner</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
