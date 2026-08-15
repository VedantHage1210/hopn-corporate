<x-layouts.admin title="New Startup">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">New Startup</h1>
        <a href="{{ route('admin.startups.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    @if($errors->any())
    <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">
        @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
    </div>
    @endif
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.startups.store') }}">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">

                {{-- Basic --}}
                <div class="md:col-span-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Basic Info</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name (EN) *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Logo URL</label>
                    <input type="url" name="logo" value="{{ old('logo') }}"
                           placeholder="https://example.com/logo.png"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                    <p class="text-xs text-slate-500 mt-1">Paste image URL (Cloudinary, ImgBB etc.)</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name (DE)</label>
                    <input type="text" name="name_de" value="{{ old('name_de') }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name (AR)</label>
                    <input type="text" name="name_ar" value="{{ old('name_ar') }}" dir="rtl"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                {{-- Industry --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Industry</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Industry (EN)</label>
                    <input type="text" name="industry" value="{{ old('industry') }}"
                           placeholder="AI, Healthcare, FinTech..."
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Industry (DE)</label>
                    <input type="text" name="industry_de" value="{{ old('industry_de') }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Industry (AR)</label>
                    <input type="text" name="industry_ar" value="{{ old('industry_ar') }}" dir="rtl"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                {{-- Stage & Website --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Details</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Stage</label>
                    <select name="stage" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        @foreach(['idea'=>'Idea','mvp'=>'MVP','seed'=>'Seed','series-a'=>'Series A','growth'=>'Growth'] as $val=>$label)
                        <option value="{{ $val }}" {{ old('stage') === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Website</label>
                    <input type="url" name="website" value="{{ old('website') }}"
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                {{-- Description --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Description</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (EN)</label>
                    <textarea name="description" rows="4"
                              class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (DE)</label>
                    <textarea name="description_de" rows="4"
                              class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_de') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (AR)</label>
                    <textarea name="description_ar" rows="4" dir="rtl"
                              class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_ar') }}</textarea>
                </div>

                {{-- Visibility --}}
                <div class="md:col-span-2 flex items-center gap-2 mt-2">
                    <input type="checkbox" name="is_visible" id="is_visible" value="1" checked>
                    <label for="is_visible" class="text-sm text-slate-300">Visible on website</label>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Save Startup</button>
            </div>
        </form>
    </div>
</x-layouts.admin>