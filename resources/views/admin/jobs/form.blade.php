<x-layouts.admin :title="isset($item->id) ? 'Edit Job' : 'New Job'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Job' : 'New Job' }}</h1>
        <a href="{{ route('admin.jobs.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
            @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
        </div>
    @endif
    <form method="POST"
          action="{{ isset($item->id) ? route('admin.jobs.update', $item) : route('admin.jobs.store') }}">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        {{-- Job Details --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">Job Details</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (EN) *</label>
                    <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white font-mono">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (DE)</label>
                    <input type="text" name="title_de" value="{{ old('title_de', $item->title_de ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (AR)</label>
                    <input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar ?? '') }}" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Location</label>
                    <input type="text" name="location" value="{{ old('location', $item->location ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Type</label>
                    <select name="type" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        @foreach(config('hopn.job_types', ['full_time' => 'Full-Time', 'part_time' => 'Part-Time', 'contract' => 'Contract', 'internship' => 'Internship', 'remote' => 'Remote']) as $key => $label)
                            <option value="{{ $key }}" {{ old('type', $item->type ?? '') === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Department</label>
                    <input type="text" name="department" value="{{ old('department', $item->department ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Seniority</label>
                    <input type="text" name="seniority" value="{{ old('seniority', $item->seniority ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        {{-- Summary --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">Summary (short listing text)</h2>
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Summary (EN)</label>
                    <textarea name="summary" rows="3"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('summary', $item->summary ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Summary (DE)</label>
                    <textarea name="summary_de" rows="3"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('summary_de', $item->summary_de ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Summary (AR)</label>
                    <textarea name="summary_ar" rows="3" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('summary_ar', $item->summary_ar ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Content EN --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">🇬🇧 Content (English)</h2>
            <div class="grid gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (EN)</label>
                    <textarea name="description" rows="5"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description', $item->description ?? '') }}</textarea>
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Requirements (EN)</label>
                        <textarea name="requirements" rows="5"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('requirements', $item->requirements ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Benefits (EN)</label>
                        <textarea name="benefits" rows="5"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('benefits', $item->benefits ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content DE --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">🇩🇪 Content (Deutsch)</h2>
            <div class="grid gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (DE)</label>
                    <textarea name="description_de" rows="5"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_de', $item->description_de ?? '') }}</textarea>
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Requirements (DE)</label>
                        <textarea name="requirements_de" rows="5"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('requirements_de', $item->requirements_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Benefits (DE)</label>
                        <textarea name="benefits_de" rows="5"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('benefits_de', $item->benefits_de ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content AR --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">🇸🇦 Content (Arabic)</h2>
            <div class="grid gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (AR)</label>
                    <textarea name="description_ar" rows="5" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_ar', $item->description_ar ?? '') }}</textarea>
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Requirements (AR)</label>
                        <textarea name="requirements_ar" rows="5" dir="rtl"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('requirements_ar', $item->requirements_ar ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Benefits (AR)</label>
                        <textarea name="benefits_ar" rows="5" dir="rtl"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('benefits_ar', $item->benefits_ar ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Settings --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-500">Settings</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Publish Date</label>
                    <input type="date" name="published_at"
                        value="{{ old('published_at', isset($item->published_at) ? \Carbon\Carbon::parse($item->published_at)->format('Y-m-d') : '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Close Date</label>
                    <input type="date" name="close_date"
                        value="{{ old('close_date', isset($item->close_date) ? \Carbon\Carbon::parse($item->close_date)->format('Y-m-d') : '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
            </div>
            <div class="mt-4 flex gap-6">
                <label class="flex items-center gap-2 text-sm text-slate-300">
                    <input type="checkbox" name="is_active" value="1"
                        {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                    Active
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-300">
                    <input type="checkbox" name="is_published" value="1"
                        {{ old('is_published', $item->is_published ?? false) ? 'checked' : '' }}>
                    Published
                </label>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Job' : 'Create Job' }}</button>
            <a href="{{ route('admin.jobs.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
