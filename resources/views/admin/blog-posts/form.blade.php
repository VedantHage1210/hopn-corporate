<x-layouts.admin :title="isset($item->id) ? 'Edit Post' : 'New Post'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Post' : 'New Post' }}</h1>
        <a href="{{ route('admin.blog-posts.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>

    <form method="POST"
          action="{{ isset($item->id) ? route('admin.blog-posts.update', $item) : route('admin.blog-posts.store') }}"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        <div class="grid gap-6 lg:grid-cols-3">
            {{-- Main content --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="card-panel p-6">
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Content</h2>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="space-y-4">
                            <p class="text-xs font-bold uppercase text-indigo-300">🇬🇧 English</p>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-200">Title (EN) *</label>
                                <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}" required
                                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-200">Excerpt (EN)</label>
                                <textarea name="excerpt" rows="2" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('excerpt', $item->excerpt ?? '') }}</textarea>
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-200">Body (EN)</label>
                                <textarea name="body" rows="8" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('body', $item->body ?? '') }}</textarea>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <p class="text-xs font-bold uppercase text-yellow-400">🇩🇪 Deutsch</p>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-200">Title (DE)</label>
                                <input type="text" name="title_de" value="{{ old('title_de', $item->title_de ?? '') }}"
                                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-200">Excerpt (DE)</label>
                                <textarea name="excerpt_de" rows="2" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('excerpt_de', $item->excerpt_de ?? '') }}</textarea>
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-200">Body (DE)</label>
                                <textarea name="body_de" rows="8" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('body_de', $item->body_de ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-panel p-6">
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">SEO</h2>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-200">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title', $item->meta_title ?? '') }}"
                                class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-200">Meta Description</label>
                            <input type="text" name="meta_description" value="{{ old('meta_description', $item->meta_description ?? '') }}"
                                class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <div class="card-panel p-6">
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Publish</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
                                placeholder="auto-generated"
                                class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-200">Publish Date</label>
                            <input type="datetime-local" name="published_at"
                                value="{{ old('published_at', isset($item->published_at) ? \Carbon\Carbon::parse($item->published_at)->format('Y-m-d\TH:i') : '') }}"
                                class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                        </div>
                        <label class="flex items-center gap-2 text-sm text-slate-300">
                            <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published ?? false))>
                            Published
                        </label>
                        <button type="submit" class="btn-primary w-full">{{ isset($item->id) ? 'Update Post' : 'Create Post' }}</button>
                    </div>
                </div>

                <div class="card-panel p-6">
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Details</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-200">Author</label>
                            <select name="author_id" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                                <option value="">— Select —</option>
                                @foreach(\App\Models\Author::where('is_active', true)->get() as $author)
                                    <option value="{{ $author->id }}" @selected(old('author_id', $item->author_id ?? '') == $author->id)>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-200">Category</label>
                            <select name="blog_category_id" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                                <option value="">— Select —</option>
                                @foreach(\App\Models\BlogCategory::all() as $cat)
                                    <option value="{{ $cat->id }}" @selected(old('blog_category_id', $item->blog_category_id ?? '') == $cat->id)>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-200">Cover Image</label>
                            <input type="file" name="cover_image" accept="image/*"
                                class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                            @if(!empty($item->cover_image))
                                <img src="{{ Storage::url($item->cover_image) }}" class="mt-2 h-20 w-full rounded object-cover">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layouts.admin>
