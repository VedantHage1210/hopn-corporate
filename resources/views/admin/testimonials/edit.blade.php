<x-layouts.admin title="Edit Testimonial">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Testimonial</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        @if(session('status'))
            <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
        @endif
        @if($errors->any())
            <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
                @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('admin.testimonials.update', $item) }}">
            @csrf @method('PUT')
            <div class="grid gap-4 md:grid-cols-2">

                {{-- Quote --}}
                <div class="md:col-span-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Quote / Review</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Quote (EN) *</label>
                    <textarea name="quote_en" rows="4" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('quote_en', $item->quote_en) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Quote (DE)</label>
                    <textarea name="quote_de" rows="4"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('quote_de', $item->quote_de) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Quote (AR)</label>
                    <textarea name="quote_ar" rows="4" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('quote_ar', $item->quote_ar) }}</textarea>
                </div>

                {{-- Author --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Author Info</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Author Name *</label>
                    <input type="text" name="author_name" value="{{ old('author_name', $item->author_name) }}" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Role</label>
                    <input type="text" name="author_role" value="{{ old('author_role', $item->author_role) }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Company</label>
                    <input type="text" name="company" value="{{ old('company', $item->company) }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Avatar URL</label>
                    <input type="url" name="avatar_url" value="{{ old('avatar_url', $item->avatar) }}"
                        placeholder="https://example.com/avatar.jpg"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    @if($item->avatar)
                        <div class="mt-2">
                            <img src="{{ $item->avatar }}" alt="{{ $item->author_name }}"
                                 class="h-12 w-12 rounded-full object-cover">
                        </div>
                    @endif
                    <p class="text-xs text-slate-500 mt-1">Paste image URL (Cloudinary, ImgBB, etc.)</p>
                </div>

                {{-- Settings --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Settings</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-2 mt-6">
                    <input type="checkbox" name="visible" id="visible" {{ $item->visible ? 'checked' : '' }}>
                    <label for="visible" class="text-sm text-slate-300">Visible on website</label>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Update Testimonial</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
