<x-layouts.admin title="New Post">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">New Post</h1>
        <a href="{{ route('admin.blog-posts.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            <div class="card-panel p-6">
                <form method="POST" action="{{ route('admin.blog-posts.store') }}" enctype="multipart/form-data" id="post-form">
                    @csrf
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Content</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        @foreach(['en' => 'EN', 'de' => 'DE', 'ar' => 'AR'] as $lang => $label)
                        <div>
                            <p class="text-xs font-semibold text-indigo-400 mb-2">{{ $label }}</p>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-xs text-slate-400 mb-1">Title {{ $lang === 'en' ? '*' : '' }}</label>
                                    <input type="text" name="title_{{ $lang }}"
                                           value="{{ old('title_'.$lang) }}"
                                           class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white"
                                           {{ $lang === 'en' ? 'required' : '' }}>
                                </div>
                                <div>
                                    <label class="block text-xs text-slate-400 mb-1">Excerpt</label>
                                    <textarea name="excerpt_{{ $lang }}" rows="3"
                                              class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white resize-none">{{ old('excerpt_'.$lang) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-xs text-slate-400 mb-1">Body</label>
                                    <textarea name="body_{{ $lang }}" rows="8"
                                              class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white resize-y">{{ old('body_'.$lang) }}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
        <div class="space-y-4">
            <div class="card-panel p-5">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Publish</p>
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" form="post-form"
                               class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Publish Date</label>
                        <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" form="post-form"
                               class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                    </div>
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="is_published" form="post-form"> Published
                    </label>
                    <button type="submit" form="post-form" class="btn-primary w-full">Save Post</button>
                </div>
            </div>
            <div class="card-panel p-5">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Details</p>
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Author</label>
                        <select name="author_id" form="post-form" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                            <option value="">Select Author</option>
                            @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Category</label>
                        <select name="category_id" form="post-form" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name_en ?? $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  <div>
    <label class="block text-xs text-slate-400 mb-1">Cover Image URL</label>
    <input type="url" name="cover_image_url" value="{{ old('cover_image_url') }}"
           form="post-form"
           placeholder="https://example.com/image.jpg"
           class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
    <p class="text-xs text-slate-500 mt-1">Paste image URL from Cloudinary, ImgBB, etc.</p>
</div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>