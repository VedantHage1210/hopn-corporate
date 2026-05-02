<x-layouts.admin :title="isset($item->id) ? 'Edit Testimonial' : 'New Testimonial'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Testimonial' : 'New Testimonial' }}</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6 max-w-2xl">
        <form method="POST"
              action="{{ isset($item->id) ? route('admin.testimonials.update', $item) : route('admin.testimonials.store') }}"
              enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if(isset($item->id)) @method('PUT') @endif

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Quote (EN) *</label>
                    <textarea name="quote_en" rows="4" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('quote', $item->quote_en ?? '') }}</textarea>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Quote (DE)</label>
                    <textarea name="quote_de" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('quote_de', $item->quote_de ?? '') }}</textarea>
                </div>
            </div>
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Author Name *</label>
                    <input type="text" name="author_name" value="{{ old('author_name', $item->author_name ?? '') }}" required
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Role</label>
                    <input type="text" name="author_role" value="{{ old('author_role', $item->author_role ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Company</label>
                    <input type="text" name="company" value="{{ old('company', $item->company ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Avatar Photo</label>
                    @if(!empty($item->avatar))
                        <img src="{{ Storage::url($item->avatar) }}" class="mb-2 h-10 w-10 rounded-full object-cover">
                    @endif
                    <input type="file" name="avatar" accept="image/*"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-300">
                <input type="checkbox" name="visible" value="1" @checked(old('visible', $item->visible ?? true))>
                Visible on website
            </label>
            <div class="pt-2 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update' : 'Create' }}</button>
                <a href="{{ route('admin.testimonials.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
