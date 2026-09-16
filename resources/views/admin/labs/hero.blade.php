<x-layouts.admin title="HOPn Labs — Hero">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">HOPn Labs — Page Hero</h1>
        <div class="flex gap-3 text-sm">
            <a href="{{ route('admin.lab-items.index', ['type'=>'focus_area']) }}" class="text-slate-400 hover:text-white">Focus Areas →</a>
            <a href="{{ route('admin.lab-items.index', ['type'=>'program']) }}" class="text-slate-400 hover:text-white">Programs →</a>
            <a href="{{ route('admin.lab-steps.index') }}" class="text-slate-400 hover:text-white">Process Steps →</a>
        </div>
    </div>
    @if(session('status'))<div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>@endif
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-200">
            <ul class="list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.labs.hero.update') }}" class="card-panel p-6 space-y-6">
        @csrf @method('PUT')
        <div class="grid gap-6 md:grid-cols-3">
            <div class="space-y-4">
                <p class="text-xs font-bold uppercase text-indigo-300">en English</p>
                <div><label class="mb-1 block text-sm text-slate-200">Eyebrow</label><input type="text" name="hero_eyebrow_en" value="{{ old('hero_eyebrow_en', $item->hero_eyebrow_en) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Title *</label><input type="text" name="hero_title_en" value="{{ old('hero_title_en', $item->hero_title_en) }}" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Subtitle</label><textarea name="hero_subtitle_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('hero_subtitle_en', $item->hero_subtitle_en) }}</textarea></div>
                <div><label class="mb-1 block text-sm text-slate-200">Tags — one per line</label><textarea name="hero_tags_en_text" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('hero_tags_en_text', implode("\n", $item->hero_tags_en ?? [])) }}</textarea></div>
            </div>
            <div class="space-y-4">
                <p class="text-xs font-bold uppercase text-yellow-400">de Deutsch</p>
                <div><label class="mb-1 block text-sm text-slate-200">Eyebrow</label><input type="text" name="hero_eyebrow_de" value="{{ old('hero_eyebrow_de', $item->hero_eyebrow_de) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Title</label><input type="text" name="hero_title_de" value="{{ old('hero_title_de', $item->hero_title_de) }}" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Subtitle</label><textarea name="hero_subtitle_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('hero_subtitle_de', $item->hero_subtitle_de) }}</textarea></div>
                <div><label class="mb-1 block text-sm text-slate-200">Tags — one per line</label><textarea name="hero_tags_de_text" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('hero_tags_de_text', implode("\n", $item->hero_tags_de ?? [])) }}</textarea></div>
            </div>
            <div class="space-y-4">
                <p class="text-xs font-bold uppercase text-green-400">ar العربية</p>
                <div><label class="mb-1 block text-sm text-slate-200">Eyebrow</label><input type="text" name="hero_eyebrow_ar" value="{{ old('hero_eyebrow_ar', $item->hero_eyebrow_ar) }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Title</label><input type="text" name="hero_title_ar" value="{{ old('hero_title_ar', $item->hero_title_ar) }}" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
                <div><label class="mb-1 block text-sm text-slate-200">Subtitle</label><textarea name="hero_subtitle_ar" rows="3" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('hero_subtitle_ar', $item->hero_subtitle_ar) }}</textarea></div>
                <div><label class="mb-1 block text-sm text-slate-200">Tags — one per line</label><textarea name="hero_tags_ar_text" rows="3" dir="rtl" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('hero_tags_ar_text', implode("\n", $item->hero_tags_ar ?? [])) }}</textarea></div>
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn-primary text-sm">Save Hero Content</button>
        </div>
    </form>
</x-layouts.admin>
