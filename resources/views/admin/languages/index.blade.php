<x-layouts.admin title="Languages">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Languages</h1>
        <a href="{{ route('admin.languages.create') }}" class="btn-primary text-sm">+ New Language</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-4 rounded-lg bg-rose-900/40 border border-rose-700 px-4 py-3 text-sm text-rose-300">{{ session('error') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Native Name</th>
                    <th class="px-3 py-2">Code</th>
                    <th class="px-3 py-2">Locale</th>
                    <th class="px-3 py-2">Default</th>
                    <th class="px-3 py-2">Active</th>
                    <th class="px-3 py-2">Order</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $language)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $language->id }}</td>
                    <td class="px-3 py-3 font-medium text-white">{{ $language->name }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $language->native_name }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-bold bg-indigo-900 text-indigo-200 uppercase">
                            {{ $language->code }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-slate-400 font-mono text-xs">{{ $language->locale }}</td>
                    <td class="px-3 py-3">
                        @if($language->is_default)
                            <span class="rounded-full px-2 py-0.5 text-xs bg-yellow-900 text-yellow-200">Default</span>
                        @else
                            <span class="text-slate-500 text-xs">—</span>
                        @endif
                    </td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs {{ $language->is_active ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $language->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-slate-400">{{ $language->sort_order ?? 0 }}</td>
                    <td class="px-3 py-3 flex gap-3 items-center">
                        <a href="{{ route('admin.languages.edit', $language) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                        @if(!$language->is_default)
                        <form method="POST" action="{{ route('admin.languages.destroy', $language) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this language?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="9" class="px-3 py-6 text-center text-slate-500">No languages found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
