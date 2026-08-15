<x-layouts.admin title="Edit Investor">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Investor</h1>
        <a href="{{ route('admin.investors.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if(session('status'))
    <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    @if($errors->any())
    <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
        @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
    </div>
    @endif
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.investors.update', $investor) }}">
            @csrf @method('PUT')
            <div class="grid gap-4 md:grid-cols-2">

                <div class="md:col-span-2"><p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Basic Info</p></div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $investor->name) }}" required
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                <div>
    <label class="block text-xs font-semibold text-slate-400 mb-1">Name (DE)</label>
    <input type="text" name="name_de" value="{{ old('name_de', $investor->name_de ?? '') }}"
           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
</div>
<div>
    <label class="block text-xs font-semibold text-slate-400 mb-1">Name (AR)</label>
    <input type="text" name="name_ar" value="{{ old('name_ar', $investor->name_ar ?? '') }}" dir="rtl"
           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
</div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Logo URL</label>
                    <input type="url" name="logo" value="{{ old('logo', $investor->logo ?? '') }}"
                           placeholder="https://example.com/logo.png"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    @if(!empty($investor->logo))
                    <div class="mt-2">
                        <img src="{{ $investor->logo }}" alt="{{ $investor->name }}"
                             class="h-10 w-10 rounded object-contain bg-slate-700 p-1">
                    </div>
                    @endif
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Type</label>
                    <select name="type" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        <option value="">— Select —</option>
                        @foreach(['vc'=>'VC Fund','angel'=>'Angel Investor','corporate'=>'Corporate VC','family_office'=>'Family Office','accelerator'=>'Accelerator','fund'=>'Investment Fund'] as $val=>$label)
                        <option value="{{ $val }}" {{ old('type',$investor->type)===$val?'selected':'' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Region</label>
                    <input type="text" name="region" value="{{ old('region', $investor->region) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Website</label>
                    <input type="url" name="website" value="{{ old('website', $investor->website) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $investor->email) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $investor->sort_order ?? 0) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-2 mt-4">
                    <input type="checkbox" name="is_visible" id="is_visible" value="1"
                           {{ old('is_visible', $investor->is_visible ?? true) ? 'checked' : '' }}>
                    <label for="is_visible" class="text-sm text-slate-300">Visible on website</label>
                </div>

                <div class="md:col-span-2 mt-2"><p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Focus Area</p></div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Focus (EN)</label>
                    <input type="text" name="focus" value="{{ old('focus', $investor->focus) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Focus (DE)</label>
                    <input type="text" name="focus_de" value="{{ old('focus_de', $investor->focus_de ?? '') }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Focus (AR)</label>
                    <input type="text" name="focus_ar" value="{{ old('focus_ar', $investor->focus_ar ?? '') }}" dir="rtl"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                <div class="md:col-span-2 mt-2"><p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Description</p></div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (EN)</label>
                    <textarea name="description" rows="4"
                              class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description', $investor->description) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (DE)</label>
                    <textarea name="description_de" rows="4"
                              class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_de', $investor->description_de ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (AR)</label>
                    <textarea name="description_ar" rows="4" dir="rtl"
                              class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_ar', $investor->description_ar ?? '') }}</textarea>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Update Investor</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
