<x-layouts.admin :title="isset($item->id) ? 'Edit Media' : 'Upload Media'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Media' : 'Upload Media' }}</h1>
        <a href="{{ route('admin.media-assets.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
            @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
        </div>
    @endif
    <div class="card-panel p-6 max-w-2xl">
        <form method="POST"
              action="{{ isset($item->id) ? route('admin.media-assets.update', $item) : route('admin.media-assets.store') }}"
              enctype="multipart/form-data">
            @csrf
            @if(isset($item->id)) @method('PUT') @endif

            <div class="grid gap-4">
                @if(!isset($item->id))
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">File * (Max 10MB)</label>
                    <input type="file" name="file" accept="image/*,application/pdf,video/*" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    <p class="text-xs text-slate-500 mt-1">Allowed: jpg, jpeg, png, gif, webp, pdf, mp4</p>
                </div>
                @else
                {{-- Show existing file --}}
                <div>
                    <p class="text-xs font-semibold text-slate-400 mb-2">Current File</p>
                    @if(str_starts_with($item->mime_type ?? '', 'image/'))
                        <img src="{{ Storage::url($item->path) }}" alt="{{ $item->alt_text }}"
                             class="h-24 object-contain rounded mb-2">
                    @endif
                    <p class="text-xs text-slate-500 font-mono">{{ $item->file_name }}</p>
                </div>
                @endif

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Title (EN)</label>
                        <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Title (DE)</label>
                        <input type="text" name="title_de" value="{{ old('title_de', $item->title_de ?? '') }}"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Alt Text (EN)</label>
                        <input type="text" name="alt_text" value="{{ old('alt_text', $item->alt_text ?? '') }}"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        <p class="text-xs text-slate-500 mt-1">For SEO and accessibility</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Alt Text (DE)</label>
                        <input type="text" name="alt_text_de" value="{{ old('alt_text_de', $item->alt_text_de ?? '') }}"
                            class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    </div>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update' : 'Upload' }}</button>
                <a href="{{ route('admin.media-assets.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
