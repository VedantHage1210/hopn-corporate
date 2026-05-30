<x-layouts.admin :title="isset($item->id) ? 'Edit Member' : 'New Member'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Team Member' : 'New Team Member' }}</h1>
        <a href="{{ route('admin.team-members.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        @if($errors->any())
            <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
                @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
            </div>
        @endif
        <form method="POST"
              action="{{ isset($item->id) ? route('admin.team-members.update', $item) : route('admin.team-members.store') }}">
            @csrf
            @if(isset($item->id)) @method('PUT') @endif

            <div class="grid gap-4 md:grid-cols-2">
                {{-- Basic --}}
                <div class="md:col-span-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Basic Info</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                {{-- Photo URL --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Photo URL</label>
                    <input type="url" name="photo_url" value="{{ old('photo_url', $item->photo ?? '') }}"
                        placeholder="https://example.com/photo.jpg"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    @if(!empty($item->photo))
                        <div class="mt-2">
                            <img src="{{ $item->photo }}" alt="{{ $item->name }}"
                                 class="h-16 w-16 rounded-full object-cover">
                        </div>
                    @endif
                    <p class="text-xs text-slate-500 mt-1">Paste image URL (Cloudinary, ImgBB, etc.)</p>
                </div>

                {{-- Role --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Role</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Role (EN)</label>
                    <input type="text" name="role_en" value="{{ old('role_en', $item->role_en ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Role (DE)</label>
                    <input type="text" name="role_de" value="{{ old('role_de', $item->role_de ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Role (AR)</label>
                    <input type="text" name="role_ar" value="{{ old('role_ar', $item->role_ar ?? '') }}" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                {{-- Bio --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Bio</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Bio (EN)</label>
                    <textarea name="bio_en" rows="3"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('bio_en', $item->bio_en ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Bio (DE)</label>
                    <textarea name="bio_de" rows="3"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('bio_de', $item->bio_de ?? '') }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Bio (AR)</label>
                    <textarea name="bio_ar" rows="3" dir="rtl"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('bio_ar', $item->bio_ar ?? '') }}</textarea>
                </div>

                {{-- Settings --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Settings</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">LinkedIn URL</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', $item->linkedin ?? '') }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="visible" id="visible"
                        {{ old('visible', $item->visible ?? true) ? 'checked' : '' }}>
                    <label for="visible" class="text-sm text-slate-300">Visible on website</label>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Member' : 'Save Member' }}</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
