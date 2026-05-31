<x-layouts.admin :title="isset($item->id) ? 'Edit Language' : 'New Language'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Language' : 'New Language' }}</h1>
        <a href="{{ route('admin.languages.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
            @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
        </div>
    @endif
    <div class="card-panel p-6 max-w-xl">
        <form method="POST"
              action="{{ isset($item->id) ? route('admin.languages.update', $item) : route('admin.languages.store') }}">
            @csrf
            @if(isset($item->id)) @method('PUT') @endif

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name * (English)</label>
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required
                        placeholder="e.g. English"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Native Name *</label>
                    <input type="text" name="native_name" value="{{ old('native_name', $item->native_name ?? '') }}" required
                        placeholder="e.g. English / Deutsch / العربية"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Code *</label>
                    <input type="text" name="code" value="{{ old('code', $item->code ?? '') }}" required
                        placeholder="e.g. en, de, ar"
                        maxlength="5"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white font-mono uppercase">
                    <p class="text-xs text-slate-500 mt-1">2-letter code (en, de, ar)</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Locale *</label>
                    <input type="text" name="locale" value="{{ old('locale', $item->locale ?? '') }}" required
                        placeholder="e.g. en_US, de_DE, ar_SA"
                        maxlength="10"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white font-mono">
                    <p class="text-xs text-slate-500 mt-1">Full locale code</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex flex-col gap-3 mt-4">
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                        Active
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="is_default" value="1"
                            {{ old('is_default', $item->is_default ?? false) ? 'checked' : '' }}>
                        Set as Default Language
                    </label>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Language' : 'Save Language' }}</button>
                <a href="{{ route('admin.languages.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
