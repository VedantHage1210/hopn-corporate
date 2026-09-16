@php
    $typeLabels = ['capability'=>'Capability', 'usecase'=>'Use Case', 'industry'=>'Industry', 'deliverable'=>'Deliverable'];
    $hasDescription = in_array($item->block_type, ['capability', 'usecase']);
    $hasBullets = $item->block_type === 'capability';
    $hasNumber = $item->block_type === 'capability';
@endphp
<x-layouts.admin :title="(isset($item->id) ? 'Edit ' : 'New ').$typeLabels[$item->block_type]">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit' : 'New' }} {{ $typeLabels[$item->block_type] }}</h1>
        <a href="{{ route('admin.solution-blocks.index', ['page'=>$page->id, 'type'=>$item->block_type]) }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-200">
            <ul class="list-disc pl-5">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="POST" action="{{ isset($item->id) ? route('admin.solution-blocks.update', [$page->id, $item->id]) : route('admin.solution-blocks.store', $page->id) }}" class="space-y-6">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif
        <input type="hidden" name="block_type" value="{{ $item->block_type }}">

        @if($hasNumber)
        <div class="card-panel p-6">
            <label class="mb-1 block text-xs text-slate-400">Number (01, 02...)</label>
            <input type="number" name="number" value="{{ old('number', $item->number) }}" class="w-32 rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
        </div>
        @endif

        <div class="card-panel p-6">
            <div class="grid gap-4 md:grid-cols-3">
                <div><label class="mb-1 block text-xs text-indigo-300">Title (EN) *</label><input type="text" name="title_en" value="{{ old('title_en', $item->title_en) }}" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-xs text-yellow-400">Title (DE)</label><input type="text" name="title_de" value="{{ old('title_de', $item->title_de) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-xs text-green-400">Title (AR)</label><input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar) }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            </div>
        </div>

        @if($hasDescription)
        <div class="card-panel p-6">
            <p class="text-xs font-bold uppercase text-slate-500 mb-3">Description</p>
            <div class="grid gap-4 md:grid-cols-3">
                <div><textarea name="description_en" rows="3" placeholder="EN" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_en', $item->description_en) }}</textarea></div>
                <div><textarea name="description_de" rows="3" placeholder="DE" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_de', $item->description_de) }}</textarea></div>
                <div><textarea name="description_ar" rows="3" placeholder="AR" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('description_ar', $item->description_ar) }}</textarea></div>
            </div>
        </div>
        @endif

        @if($hasBullets)
        <div class="card-panel p-6">
            <p class="text-xs font-bold uppercase text-slate-500 mb-3">Bullet points — one per line</p>
            <div class="grid gap-4 md:grid-cols-3">
                <div><textarea name="bullets_en_text" rows="4" placeholder="EN" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('bullets_en_text', implode("\n", $item->bullets_en ?? [])) }}</textarea></div>
                <div><textarea name="bullets_de_text" rows="4" placeholder="DE" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('bullets_de_text', implode("\n", $item->bullets_de ?? [])) }}</textarea></div>
                <div><textarea name="bullets_ar_text" rows="4" placeholder="AR" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('bullets_ar_text', implode("\n", $item->bullets_ar ?? [])) }}</textarea></div>
            </div>
        </div>
        @endif

        <div class="card-panel p-6 flex items-center justify-between">
            <div>
                <label class="mb-1 block text-xs text-slate-400">Sort order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}" class="w-24 rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
            </div>
            <label class="inline-flex items-center gap-2 text-sm text-slate-200"><input type="checkbox" name="is_visible" value="1" @checked(old('is_visible', $item->is_visible ?? true))>Visible</label>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.solution-blocks.index', ['page'=>$page->id, 'type'=>$item->block_type]) }}" class="rounded-md border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:bg-slate-800">Cancel</a>
            <button type="submit" class="btn-primary text-sm">{{ isset($item->id) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</x-layouts.admin>
