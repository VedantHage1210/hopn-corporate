<x-layouts.admin :title="isset($author->id) ? 'Edit Author' : 'New Author'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($author->id) ? 'Edit Author' : 'New Author' }}</h1>
        <a href="{{ route('admin.authors.index') }}" class="text-sm text-slate-400 hover:text-white">← Back to Authors</a>
    </div>

    <div class="card-panel p-6 max-w-2xl">
        <form method="POST"
              action="{{ isset($author->id) ? route('admin.authors.update', $author) : route('admin.authors.store') }}"
              enctype="multipart/form-data"
              class="space-y-5">
            @csrf
            @if(isset($author->id)) @method('PUT') @endif

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Full Name <span class="text-rose-400">*</span></label>
                <input type="text" name="name" value="{{ old('name', $author->name ?? '') }}" required
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Bio (English)</label>
                    <textarea name="bio_en" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('bio_en', $author->bio_en ?? '') }}</textarea>
                    @error('bio_en')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Bio (Deutsch)</label>
                    <textarea name="bio_de" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('bio_de', $author->bio_de ?? '') }}</textarea>
                    @error('bio_de')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Avatar Photo</label>
                @if(!empty($author->avatar))
                    <div class="mb-2">
                        <img src="{{ Storage::url($author->avatar) }}" alt="Current avatar" class="h-16 w-16 rounded-full object-cover border border-slate-700">
                        <p class="mt-1 text-xs text-slate-400">Upload a new file to replace.</p>
                    </div>
                @endif
                <input type="file" name="avatar" accept="image/*"
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                <p class="mt-1 text-xs text-slate-500">JPG, PNG or WebP. Max 2 MB.</p>
                @error('avatar')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
            </div>

            <div class="grid gap-5 md:grid-cols-3">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $author->linkedin_url ?? '') }}"
                        placeholder="https://linkedin.com/in/..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    @error('linkedin_url')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Twitter / X URL</label>
                    <input type="url" name="twitter_url" value="{{ old('twitter_url', $author->twitter_url ?? '') }}"
                        placeholder="https://twitter.com/..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    @error('twitter_url')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Website URL</label>
                    <input type="url" name="website_url" value="{{ old('website_url', $author->website_url ?? '') }}"
                        placeholder="https://..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    @error('website_url')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="pt-2 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($author->id) ? 'Update Author' : 'Create Author' }}</button>
                <a href="{{ route('admin.authors.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
