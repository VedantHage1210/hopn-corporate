<x-layouts.admin :title="isset($item->id) ? 'Edit Job' : 'New Job'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Job' : 'New Job' }}</h1>
        <a href="{{ route('admin.jobs.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <form method="POST"
          action="{{ isset($item->id) ? route('admin.jobs.update', $item) : route('admin.jobs.store') }}"
          class="space-y-6">
        @csrf         @if($errors->any())             <div class="rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300 mb-4">                 <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>             </div>         @endif
        @if(isset($item->id)) @method('PUT') @endif

        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Job Details</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}" required
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Location</label>
                    <input type="text" name="location" value="{{ old('location', $item->location ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Type</label>
                    <select name="type" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                        @foreach(config('hopn.job_types') as $key => $label)
                            <option value="{{ $key }}" @selected(old('type', $item->type ?? '') === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Department</label>
                    <input type="text" name="department" value="{{ old('department', $item->department ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Seniority</label>
                    <input type="text" name="seniority" value="{{ old('seniority', $item->seniority ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
        </div>

        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Content EN / DE</h2>
            <div class="grid gap-6 md:grid-cols-2">
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">🇬🇧 English</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Description</label>
                        <textarea name="description" rows="5" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description', $item->description ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Requirements</label>
                        <textarea name="requirements" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('requirements', $item->requirements ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Benefits</label>
                        <textarea name="benefits" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('benefits', $item->benefits ?? '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-yellow-400">🇩🇪 Deutsch</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Description (DE)</label>
                        <textarea name="description_de" rows="5" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_de', $item->description_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Requirements (DE)</label>
                        <textarea name="requirements_de" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('requirements_de', $item->requirements_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Benefits (DE)</label>
                        <textarea name="benefits_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('benefits_de', $item->benefits_de ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Settings</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Publish Date</label>
                    <input type="date" name="published_at" value="{{ old('published_at', isset($item->published_at) ? \Carbon\Carbon::parse($item->published_at)->format('Y-m-d') : '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Close Date</label>
                    <input type="date" name="close_date" value="{{ old('close_date', isset($item->close_date) ? \Carbon\Carbon::parse($item->close_date)->format('Y-m-d') : '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
            <div class="mt-4 flex gap-6">
                <label class="flex items-center gap-2 text-sm text-slate-300">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $item->is_active ?? true))>
                    Active
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-300">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published ?? false))>
                    Published
                </label>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary" onclick="this.form.submit()">{{ isset($item->id) ? 'Update Job' : 'Create Job' }}</button>
            <a href="{{ route('admin.jobs.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
