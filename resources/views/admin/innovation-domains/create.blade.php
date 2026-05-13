<x-layouts.admin title="New Innovation Domain">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">New Innovation Domain</h1>
        <a href="{{ route('admin.innovation-domains.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.innovation-domains.store') }}">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">
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
                    <input type="text" name="icon" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" placeholder="🤖">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="0" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-2 mt-4">
                    <input type="checkbox" name="is_published" id="is_published" checked>
                    <label for="is_published" class="text-sm text-slate-300">Published</label>
                </div>

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

                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Use Cases (one per line)</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Use Cases (EN)</label>
                    <textarea name="use_cases" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" placeholder="AI-powered diagnostics&#10;Predictive analytics&#10;Natural language processing"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Use Cases (DE)</label>
                    <textarea name="use_cases_de" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Use Cases (AR)</label>
                    <textarea name="use_cases_ar" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>

                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Related Services (one per line)</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Related Services</label>
                    <textarea name="related_services" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" placeholder="AI Solutions&#10;Data Analytics&#10;Consulting"></textarea>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Save Domain</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
