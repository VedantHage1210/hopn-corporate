<x-layouts.admin title="New Logo">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">New Logo</h1>
        <a href="{{ route('admin.logos.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.logos.store') }}">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name *</label>
                    <input type="text" name="name" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Category</label>
                    <select name="category" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        <option value="customer">Customer</option>
                        <option value="partner">Partner</option>
                        <option value="investor">Investor</option>
                        <option value="startup">Startup</option>
                        <option value="university">University</option>
                        <option value="research">Research Partner</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Logo URL</label>
                    <input type="url" name="logo_url" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" placeholder="https://...">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Website</label>
                    <input type="url" name="website" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="0" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description</label>
                    <input type="text" name="description" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="visible" id="visible" checked>
                    <label for="visible" class="text-sm text-slate-300">Visible on website</label>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Save Logo</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
