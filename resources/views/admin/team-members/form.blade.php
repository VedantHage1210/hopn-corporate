<x-layouts.admin :title="isset($item->id) ? 'Edit Member' : 'New Member'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Team Member' : 'New Team Member' }}</h1>
        <a href="{{ route('admin.team-members.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6 max-w-2xl">
        <form method="POST"
              action="{{ isset($item->id) ? route('admin.team-members.update', $item) : route('admin.team-members.store') }}"
              enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if(isset($item->id)) @method('PUT') @endif

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Full Name *</label>
                <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
            </div>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Role (EN)</label>
                    <input type="text" name="role_en" value="{{ old('role', $item->role_en ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Role (DE)</label>
                    <input type="text" name="role_de" value="{{ old('role_de', $item->role_de ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Bio (EN)</label>
                    <textarea name="bio" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('bio', $item->bio ?? '') }}</textarea>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Bio (DE)</label>
                    <textarea name="bio_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('bio_de', $item->bio_de ?? '') }}</textarea>
                </div>
            </div>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Photo</label>
                    @if(!empty($item->photo))
                        <img src="{{ Storage::url($item->photo) }}" class="mb-2 h-16 w-16 rounded-full object-cover">
                    @endif
                    <input type="file" name="photo" accept="image/*"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">LinkedIn URL</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin_url', $item->linkedin ?? '') }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    <label class="mb-1 mt-3 block text-sm font-medium text-slate-200">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-300">
                <input type="checkbox" name="visible" value="1" @checked(old('is_visible', $item->visible ?? true))>
                Visible on website
            </label>
            <div class="pt-2 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update' : 'Create' }}</button>
                <a href="{{ route('admin.team-members.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
