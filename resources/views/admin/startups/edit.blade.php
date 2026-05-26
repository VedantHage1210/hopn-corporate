<x-layouts.admin title="Edit Startup">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Startup</h1>
        <a href="{{ route('admin.startups.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.startups.update', $startup) }}">
            @csrf @method('PUT')
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $startup->name) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Industry (EN)</label>
                    <input type="text" name="industry" value="{{ old('industry', $startup->industry) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"
                           placeholder="AI, Healthcare, FinTech...">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Industry (DE)</label>
                    <input type="text" name="industry_de" value="{{ old('industry_de', $startup->industry_de ?? '') }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Industry (AR)</label>
                    <input type="text" name="industry_ar" value="{{ old('industry_ar', $startup->industry_ar ?? '') }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Stage</label>
                    <select name="stage" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        @foreach(['idea' => 'Idea', 'mvp' => 'MVP', 'seed' => 'Seed', 'series-a' => 'Series A', 'growth' => 'Growth'] as $val => $label)
                        <option value="{{ $val }}" {{ old('stage', $startup->stage) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Website</label>
                    <input type="url" name="website" value="{{ old('website', $startup->website) }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description', $startup->description) }}</textarea>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Update Startup</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
