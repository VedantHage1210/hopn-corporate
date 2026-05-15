<x-layouts.admin title="Edit Investor">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Investor</h1>
        <a href="{{ route('admin.investors.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.investors.update', $investor) }}">
            @csrf @method('PUT')
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $investor->name) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Type</label>
                    <select name="type" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        @foreach(['vc' => 'Venture Capital', 'angel' => 'Angel Investor', 'fund' => 'Fund', 'corporate' => 'Corporate VC'] as $val => $label)
                        <option value="{{ $val }}" {{ old('type', $investor->type) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Region</label>
                    <input type="text" name="region" value="{{ old('region', $investor->region) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Focus Areas</label>
                    <input type="text" name="focus" value="{{ old('focus', $investor->focus) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Website</label>
                    <input type="url" name="website" value="{{ old('website', $investor->website) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Contact Email</label>
                    <input type="email" name="email" value="{{ old('email', $investor->email) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description', $investor->description) }}</textarea>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Update Investor</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
