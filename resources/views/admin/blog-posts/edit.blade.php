<x-layouts.admin title="Edit Post">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Post</h1>
        <a href="{{ route('admin.blog-posts.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="grid gap-6 lg:grid-cols-3">

        {{-- Main Content --}}
        <div class="lg:col-span-2">
            <div class="card-panel p-6">
                <form method="POST" action="{{ route('admin.blog-posts.update', $post) }}" enctype="multipart/form-data" id="post-form">
                    @csrf @method('PUT')

                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Content</p>

                    <div class="grid grid-cols-3 gap-4 mb-4">
                        @foreach(['en' => '🇬🇧 English', 'de' => '🇩🇪 Deutsch', 'ar' => '🇸🇦 Arabic'] as $lang => $label)
                        <div>
                            <p class="text-xs font-semibold text-indigo-400 mb-2">{{ str_replace(['🇬🇧 ', '🇩🇪 ', '🇸🇦 '], ['EN ', 'DE ', 'AR '], $label) }}</p>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-xs text-slate-400 mb-1">Title {{ $lang === 'en' ? '*' : '' }}</label>
                                    <input type="text" name="title_{{ $lang }}"
                                           value="{{ old('title_'.$lang, $post->{'title_'.$lang} ?? ($lang === 'en' ? $post->title : '')) }}"
                                           class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white"
                                           {{ $lang === 'en' ? 'required' : '' }}>
                                </div>
                                <div>
                                    <label class="block text-xs text-slate-400 mb-1">Excerpt</label>
                                    <textarea name="excerpt_{{ $lang }}" rows="3"
                                              class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white resize-none">{{ old('excerpt_'.$lang, $post->{'excerpt_'.$lang} ?? ($lang === 'en' ? $post->excerpt : '')) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-xs text-slate-400 mb-1">Body</label>
                                    <textarea name="body_{{ $lang }}" rows="8"
                                              class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white resize-y">{{ old('body_'.$lang, $post->{'body_'.$lang} ?? ($lang === 'en' ? $post->body : '')) }}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- SEO --}}
                    <div class="mt-6 pt-6 border-t border-slate-800">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">SEO</p>
                        <div class="grid gap-3 md:grid-cols-2">
                            <div>
                                <label class="block text-xs text-slate-400 mb-1">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}"
                                       class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                            </div>
                            <div>
                                <label class="block text-xs text-slate-400 mb-1">Meta Description</label>
                                <input type="text" name="meta_description" value="{{ old('meta_description', $post->meta_description ?? '') }}"
                                       class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-4">

            {{-- Publish --}}
            <div class="card-panel p-5">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Publish</p>
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}"
                               form="post-form"
                               class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Publish Date</label>
                        <input type="datetime-local" name="published_at"
                               value="{{ old('published_at', $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}"
                               form="post-form"
                               class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                    </div>
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="is_published" form="post-form" {{ $post->is_published ? 'checked' : '' }}>
                        Published
                    </label>
                    <button type="submit" form="post-form" class="btn-primary w-full">Update Post</button>
                </div>
            </div>

            {{-- Details --}}
            <div class="card-panel p-5">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Details</p>
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Author</label>
                        <select name="author_id" form="post-form" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                            <option value="">Select Author</option>
                            @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ $post->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Category</label>
                        <select name="category_id" form="post-form" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-3 py-2 text-sm text-white">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name_en ?? $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Cover Image</label>
                        @if($post->cover_image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($post->cover_image) }}" alt="Cover"
                                 style="width:100%; height:120px; object-fit:cover; border-radius:8px; border:1px solid rgba(255,255,255,0.1);">
                        </div>
                        @endif
                        <input type="file" name="cover_image" form="post-form" accept="image/*"
                               class="w-full text-sm text-slate-400 file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-900 file:text-indigo-300 hover:file:bg-indigo-800">
                        <p class="text-xs text-slate-500 mt-1">Leave empty to keep current image</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.admin>
