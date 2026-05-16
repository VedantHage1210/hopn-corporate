<x-layouts.admin title="Edit Logo">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Logo</h1>
        <a href="{{ route('admin.logos.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.logos.update', $logo) }}">
            @csrf @method('PUT')
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $logo->name) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Category</label>
                    <select name="category" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        @foreach(['customer' => 'Customer', 'partner' => 'Partner', 'investor' => 'Investor', 'startup' => 'Startup', 'university' => 'University', 'research' => 'Research Partner'] as $val => $label)
                        <option value="{{ $val }}" {{ old('category', $logo->category) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Logo URL</label>
                    <input type="url" name="logo_url" value="{{ old('logo_url', $logo->logo_url) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    @if($logo->logo_url)
                    <div style="margin-top:8px; padding:12px; background:rgba(255,255,255,0.03); border-radius:8px; display:inline-block;">
                        <img src="{{ $logo->logo_url }}" alt="{{ $logo->name }}" style="height:40px; width:auto; object-fit:contain;">
                    </div>
                    @endif
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Website</label>
                    <input type="url" name="website" value="{{ old('website', $logo->website) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $logo->sort_order) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description</label>
                    <input type="text" name="description" value="{{ old('description', $logo->description) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="visible" id="visible" {{ $logo->visible ? 'checked' : '' }}>
                    <label for="visible" class="text-sm text-slate-300">Visible on website</label>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Update Logo</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
