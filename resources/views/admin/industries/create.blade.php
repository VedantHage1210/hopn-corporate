<x-layouts.admin title="New Industry">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">New Industry</h1>
        <a href="{{ route('admin.industries.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.industries.store') }}">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">

                {{-- Basic Info --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name (EN) *</label>
                    <input type="text" name="name" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name (DE)</label>
                    <input type="text" name="name_de" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name (AR)</label>
                    <input type="text" name="name_ar" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Icon (Emoji)</label>
                    <input type="text" name="icon" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" placeholder="🚗">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="0" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-2 mt-4">
                    <input type="checkbox" name="is_published" id="is_published" checked>
                    <label for="is_published" class="text-sm text-slate-300">Published</label>
                </div>

                {{-- Description --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Description</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (EN)</label>
                    <textarea name="description" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (DE)</label>
                    <textarea name="description_de" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (AR)</label>
                    <textarea name="description_ar" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>

                {{-- Challenges --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Challenges</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Challenges (EN)</label>
                    <textarea name="challenges" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Challenges (DE)</label>
                    <textarea name="challenges_de" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Challenges (AR)</label>
                    <textarea name="challenges_ar" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>

                {{-- Solutions --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Solutions</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Solutions (EN)</label>
                    <textarea name="solutions" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Solutions (DE)</label>
                    <textarea name="solutions_de" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Solutions (AR)</label>
                    <textarea name="solutions_ar" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>

                {{-- Use Cases --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Use Cases</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Use Cases (EN)</label>
                    <textarea name="use_cases" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" placeholder="One use case per line"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Use Cases (DE)</label>
                    <textarea name="use_cases_de" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Use Cases (AR)</label>
                    <textarea name="use_cases_ar" rows="3" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>

            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Save Industry</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
