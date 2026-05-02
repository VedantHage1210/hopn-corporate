<x-layouts.admin :title="isset($item->id) ? 'Edit Partner' : 'New Partner'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Partner' : 'New Partner' }}</h1>
        <a href="{{ route('admin.partners.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6 max-w-2xl">
        <form method="POST"
              action="{{ isset($item->id) ? route('admin.partners.update', $item) : route('admin.partners.store') }}"
              enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if(isset($item->id)) @method('PUT') @endif

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Type</label>
                    <select name="type" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                        @foreach(config('hopn.partner_types') as $key => $label)
                            <option value="{{ $key }}" @selected(old('type', $item->type ?? '') === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Website URL</label>
                    <input type="url" name="url" value="{{ old('url', $item->url ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Logo</label>
                @if(!empty($item->logo))
                    <img src="{{ Storage::url($item->logo) }}" class="mb-2 h-12 object-contain">
                @endif
                <input type="file" name="logo" accept="image/*"
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
            </div>

            <div class="flex gap-4">
                <label class="flex items-center gap-2 text-sm text-slate-300">
                    <input type="checkbox" name="visible" value="1" @checked(old('visible', $item->visible ?? true))>
                    Visible on website
                </label>
            </div>

            <div class="pt-2 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update' : 'Create' }}</button>
                <a href="{{ route('admin.partners.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
