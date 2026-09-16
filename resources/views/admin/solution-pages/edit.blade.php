@php
    $textFields = [
        'nav_label' => 'Nav menu label',
        'hero_eyebrow' => 'Hero — eyebrow tag',
        'hero_title' => 'Hero — title',
        'cta1_label' => 'Hero — button 1 label',
        'cta2_label' => 'Hero — button 2 label',
        'capabilities_eyebrow' => 'Capabilities — eyebrow',
        'capabilities_title' => 'Capabilities — title',
        'usecases_eyebrow' => 'Use Cases — eyebrow',
        'usecases_title' => 'Use Cases — title',
        'industries_eyebrow' => 'Industries — eyebrow',
        'industries_title' => 'Industries — title',
        'deliverables_title' => 'Deliverables — title',
        'final_eyebrow' => 'Final CTA — eyebrow',
        'final_title' => 'Final CTA — title',
        'final_cta1_label' => 'Final CTA — button 1 label',
        'final_cta2_label' => 'Final CTA — button 2 label',
    ];
    $textareaFields = [
        'hero_subtitle' => 'Hero — subtitle',
        'hero_note' => 'Hero — small note (below subtitle)',
        'capabilities_subtitle' => 'Capabilities — subtitle',
        'industries_subtitle' => 'Industries — subtitle',
        'final_subtitle' => 'Final CTA — subtitle',
    ];
@endphp
<x-layouts.admin :title="'Edit — '.($item->nav_label_en ?: $item->hero_title_en)">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit — {{ ($item->nav_label_en ?: $item->hero_title_en) }}</h1>
        <a href="{{ route('admin.solution-pages.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if(session('status'))<div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>@endif

    <form method="POST" action="{{ route('admin.solution-pages.update', $item->id) }}" class="space-y-6">
        @csrf @method('PUT')

        @foreach($textFields as $field => $label)
        <div class="card-panel p-6">
            <p class="text-xs font-bold uppercase text-slate-500 mb-3">{{ $label }}</p>
            <div class="grid gap-4 md:grid-cols-3">
                <div><label class="mb-1 block text-xs text-indigo-300">EN</label><input type="text" name="{{ $field }}_en" value="{{ old($field.'_en', $item->{$field.'_en'}) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-xs text-yellow-400">DE</label><input type="text" name="{{ $field }}_de" value="{{ old($field.'_de', $item->{$field.'_de'}) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-xs text-green-400">AR</label><input type="text" name="{{ $field }}_ar" value="{{ old($field.'_ar', $item->{$field.'_ar'}) }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
            </div>
        </div>
        @endforeach

        @foreach($textareaFields as $field => $label)
        <div class="card-panel p-6">
            <p class="text-xs font-bold uppercase text-slate-500 mb-3">{{ $label }}</p>
            <div class="grid gap-4 md:grid-cols-3">
                <div><label class="mb-1 block text-xs text-indigo-300">EN</label><textarea name="{{ $field }}_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old($field.'_en', $item->{$field.'_en'}) }}</textarea></div>
                <div><label class="mb-1 block text-xs text-yellow-400">DE</label><textarea name="{{ $field }}_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old($field.'_de', $item->{$field.'_de'}) }}</textarea></div>
                <div><label class="mb-1 block text-xs text-green-400">AR</label><textarea name="{{ $field }}_ar" rows="3" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old($field.'_ar', $item->{$field.'_ar'}) }}</textarea></div>
            </div>
        </div>
        @endforeach

        <div class="card-panel p-6">
            <p class="text-xs font-bold uppercase text-slate-500 mb-3">Button URLs &amp; Publish</p>
            <div class="grid gap-4 md:grid-cols-4">
                <div><label class="mb-1 block text-xs text-slate-400">CTA 1 URL</label><input type="text" name="cta1_url" value="{{ old('cta1_url', $item->cta1_url) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-xs text-slate-400">CTA 2 URL</label><input type="text" name="cta2_url" value="{{ old('cta2_url', $item->cta2_url) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-xs text-slate-400">Final CTA 1 URL</label><input type="text" name="final_cta1_url" value="{{ old('final_cta1_url', $item->final_cta1_url) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-xs text-slate-400">Final CTA 2 URL</label><input type="text" name="final_cta2_url" value="{{ old('final_cta2_url', $item->final_cta2_url) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div class="flex items-end"><label class="inline-flex items-center gap-2 text-sm text-slate-200"><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published))>Published</label></div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn-primary">Save Changes</button>
        </div>
    </form>

    <div class="mt-8 flex flex-wrap gap-4 text-sm">
        <a href="{{ route('admin.solution-blocks.index', ['page'=>$item->id, 'type'=>'capability']) }}" class="text-indigo-300 hover:text-indigo-200">Manage Capabilities →</a>
        <a href="{{ route('admin.solution-blocks.index', ['page'=>$item->id, 'type'=>'usecase']) }}" class="text-indigo-300 hover:text-indigo-200">Manage Use Cases →</a>
        <a href="{{ route('admin.solution-blocks.index', ['page'=>$item->id, 'type'=>'industry']) }}" class="text-indigo-300 hover:text-indigo-200">Manage Industries →</a>
        <a href="{{ route('admin.solution-blocks.index', ['page'=>$item->id, 'type'=>'deliverable']) }}" class="text-indigo-300 hover:text-indigo-200">Manage Deliverables →</a>
    </div>
</x-layouts.admin>
