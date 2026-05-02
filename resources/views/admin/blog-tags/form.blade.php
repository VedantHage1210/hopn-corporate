<x-layouts.admin :title="isset($tag->id) ? 'Edit Tag' : 'New Tag'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($tag->id) ? 'Edit Tag' : 'New Tag' }}</h1>
        <a href="{{ route('admin.blog-tags.index') }}" class="text-sm text-slate-400 hover:text-white">← Back to Tags</a>
    </div>

    <div class="card-panel p-6 max-w-md">
        <form method="POST"
              action="{{ isset($tag->id) ? route('admin.blog-tags.update', $tag) : route('admin.blog-tags.store') }}"
              class="space-y-5">
            @csrf
            @if(isset($tag->id)) @method('PUT') @endif

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Tag Name <span class="text-rose-400">*</span></label>
                <input type="text" name="name" value="{{ old('name', $tag->name ?? '') }}" required maxlength="80"
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $tag->slug ?? '') }}"
                    placeholder="auto-generated from name"
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">
                @error('slug')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
            </div>

            <div class="pt-2 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($tag->id) ? 'Update Tag' : 'Create Tag' }}</button>
                <a href="{{ route('admin.blog-tags.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
