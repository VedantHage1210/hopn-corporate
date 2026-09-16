<x-layouts.admin :title="isset($item->id) ? 'Edit Step' : 'New Step'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Step' : 'New Step' }}</h1>
        <a href="{{ route('admin.lab-steps.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-200">
            <ul class="list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="POST" action="{{ isset($item->id) ? route('admin.lab-steps.update', $item) : route('admin.lab-steps.store') }}" class="card-panel p-6 space-y-6">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif
        <div class="grid gap-4 md:grid-cols-2">
            <div><label class="mb-1 block text-sm text-slate-200">Step number *</label><input type="number" name="step_number" value="{{ old('step_number', $item->step_number ?? 1) }}" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            <div><label class="mb-1 block text-sm text-slate-200">Sort order</label><input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
        </div>
        <div class="grid gap-6 md:grid-cols-3">
            <div class="space-y-4">
                <p class="text-xs font-bold uppercase text-indigo-300">en English</p>
                <div><label class="mb-1 block text-sm text-slate-200">Title *</label><input type="text" name="title_en" value="{{ old('title_en', $item->title_en) }}" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Description</label><textarea name="description_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_en', $item->description_en) }}</textarea></div>
            </div>
            <div class="space-y-4">
                <p class="text-xs font-bold uppercase text-yellow-400">de Deutsch</p>
                <div><label class="mb-1 block text-sm text-slate-200">Title</label><input type="text" name="title_de" value="{{ old('title_de', $item->title_de) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Description</label><textarea name="description_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_de', $item->description_de) }}</textarea></div>
            </div>
            <div class="space-y-4">
                <p class="text-xs font-bold uppercase text-green-400">ar العربية</p>
                <div><label class="mb-1 block text-sm text-slate-200">Title</label><input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar) }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Description</label><textarea name="description_ar" rows="3" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_ar', $item->description_ar) }}</textarea></div>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <label class="inline-flex items-center gap-2 text-sm text-slate-200"><input type="checkbox" name="is_visible" value="1" @checked(old('is_visible', $item->is_visible ?? true))>Visible</label>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.lab-steps.index') }}" class="rounded-md border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:bg-slate-800">Cancel</a>
            <button type="submit" class="btn-primary text-sm">{{ isset($item->id) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</x-layouts.admin>
