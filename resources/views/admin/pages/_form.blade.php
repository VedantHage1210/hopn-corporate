@csrf
<div class="space-y-6">
    <div>
        <label class="block text-sm text-slate-400 mb-2">Page Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $page->slug ?? '') }}" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white" required>
    </div>

    <div x-data="{ tab: 'en' }">
        <div class="flex gap-4 border-b border-slate-800 mb-4">
            @foreach(['en' => 'English', 'de' => 'German', 'ar' => 'Arabic'] as $key => $label)
                <button type="button" @click="tab = '{{ $key }}'" :class="tab === '{{ $key }}' ? 'text-white border-b-2 border-indigo-500' : 'text-slate-500'" class="pb-2">{{ $label }}</button>
            @endforeach
        </div>

        @foreach(['en', 'de', 'ar'] as $lang)
        <div x-show="tab === '{{ $lang }}'" class="space-y-4">
            <input type="text" name="title[{{ $lang }}]" value="{{ old('title.'.$lang, $page->getTranslation('title', $lang, false) ?? '') }}" placeholder="Title ({{ strtoupper($lang) }})" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white">
            <textarea name="content[{{ $lang }}]" placeholder="Content ({{ strtoupper($lang) }})" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white h-40">{{ old('content.'.$lang, $page->getTranslation('content', $lang, false) ?? '') }}</textarea>
        </div>
        @endforeach
    </div>

    <label class="flex items-center text-slate-300">
        <input type="checkbox" name="is_published" {{ ($page->is_published ?? false) ? 'checked' : '' }} class="mr-2"> Published
    </label>
</div>
