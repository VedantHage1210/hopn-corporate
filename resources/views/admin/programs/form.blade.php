<x-layouts.admin :title="isset($item->id) ? 'Edit Program' : 'New Program'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Program' : 'New Program' }}</h1>
        <a href="{{ route('admin.programs.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>

    <form method="POST"
          action="{{ isset($item->id) ? route('admin.programs.update', $item) : route('admin.programs.store') }}"
          class="space-y-6">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        {{-- Content --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Content</h2>
            <div class="grid gap-6 md:grid-cols-3">
                {{-- English --}}
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">🇬🇧 English</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (EN) *</label>
                        <input type="text" name="title_en" value="{{ old('title_en', $item->title_en ?? '') }}" required
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (EN)</label>
                        <textarea name="summary_en" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_en', $item->summary_en ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Audience (EN)</label>
                        <textarea name="audience_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('audience_en', $item->audience_en ?? '') }}</textarea>
                    </div>
                </div>
                {{-- German --}}
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-yellow-400">🇩🇪 Deutsch</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (DE)</label>
                        <input type="text" name="title_de" value="{{ old('title_de', $item->title_de ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (DE)</label>
                        <textarea name="summary_de" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_de', $item->summary_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Audience (DE)</label>
                        <textarea name="audience_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('audience_de', $item->audience_de ?? '') }}</textarea>
                    </div>
                </div>
                {{-- Arabic --}}
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-green-400">🇸🇦 العربية</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (AR)</label>
                        <input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (AR)</label>
                        <textarea name="summary_ar" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('summary_ar', $item->summary_ar ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Audience (AR)</label>
                        <textarea name="audience_ar" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('audience_ar', $item->audience_ar ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Settings --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Settings</h2>
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
                        placeholder="auto-generated"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Duration</label>
                    <input type="text" name="duration" value="{{ old('duration', $item->duration ?? '') }}"
                        placeholder="e.g. 6 weeks"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Duration Weeks</label>
                    <input type="number" name="duration_weeks" value="{{ old('duration_weeks', $item->duration_weeks ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
            <div class="mt-4 flex gap-6">
                <label class="flex items-center gap-2 text-sm text-slate-300">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published ?? false))>
                    Published
                </label>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Program' : 'Create Program' }}</button>
            <a href="{{ route('admin.programs.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
