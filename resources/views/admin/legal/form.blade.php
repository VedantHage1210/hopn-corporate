<x-layouts.admin :title="isset($item->id) ? 'Edit Legal Page' : 'New Legal Page'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Legal Page' : 'New Legal Page' }}</h1>
        <a href="{{ route('admin.legal.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
            @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
        </div>
    @endif
    <form method="POST"
          action="{{ isset($item->id) ? route('admin.legal.update', $item) : route('admin.legal.store') }}">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        {{-- Basic Info --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Basic Info</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (EN) *</label>
                    <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
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
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Slug *</label>
                    <select name="slug" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        <option value="impressum" {{ old('slug', $item->slug ?? '') === 'impressum' ? 'selected' : '' }}>impressum</option>
                        <option value="privacy-policy" {{ old('slug', $item->slug ?? '') === 'privacy-policy' ? 'selected' : '' }}>privacy-policy</option>
                        <option value="cookie-policy" {{ old('slug', $item->slug ?? '') === 'cookie-policy' ? 'selected' : '' }}>cookie-policy</option>
                    </select>
                </div>
                <div class="flex items-center gap-3 mt-2">
                    <input type="checkbox" name="is_published" id="is_published" value="1"
                        {{ old('is_published', $item->is_published ?? false) ? 'checked' : '' }}>
                    <label for="is_published" class="text-sm text-slate-300">Published</label>
                </div>
            </div>
        </div>

        {{-- Content EN --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">🇬🇧 Content (English)</h2>
            <textarea name="content_en" rows="12"
                placeholder="Enter legal content in English..."
                class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('content_en', $item->excerpt ?? '') }}</textarea>
        </div>

        {{-- Content DE --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">🇩🇪 Content (Deutsch)</h2>
            <textarea name="content_de" rows="12"
                placeholder="Rechtlichen Inhalt auf Deutsch eingeben..."
                class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('content_de', $item->excerpt_de ?? '') }}</textarea>
        </div>

        {{-- Content AR --}}
        <div class="card-panel p-6 mb-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">🇸🇦 Content (Arabic)</h2>
            <textarea name="content_ar" rows="12" dir="rtl"
                placeholder="أدخل المحتوى القانوني بالعربية..."
                class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('content_ar', $item->excerpt_ar ?? '') }}</textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Page' : 'Save Page' }}</button>
            <a href="{{ route('admin.legal.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
